<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\AnnotateImageForm;
use App\ImageAnnotationResult;
use Cake\Http\Response;
use Google\Cloud\Vision\V1\Feature\Type as AnnotationType;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use MongoDB\BSON\UTCDateTime;
use MongoDB\Database;
use Throwable;

/**
 * Images Controller
 */
class ImagesController extends AppController
{
    /**
     * Annotates images and returns a safety verdict.
     *
     * @param AnnotateImageForm $form
     * @return Response
     */
    public function annotate(AnnotateImageForm $form, Database $db): Response
    {
        if ($form->hasErrors()) {
            return $this->json(['errors' => $form->getErrors()], 400);
        }

        $image = $form->getData('image')->getStream()->getContents();
        $client = new ImageAnnotatorClient();

        try {
            $annotation = $client->annotateImage($image,
                [AnnotationType::SAFE_SEARCH_DETECTION]
            );
        } catch (Throwable $e) {
            return $this->json(['message' => 'Service unavailable'], 500);
        }

        $safeSearch = $annotation->getSafeSearchAnnotation();
        $result = json_decode($safeSearch->serializeToJsonString());

        $annotationResult = new ImageAnnotationResult($safeSearch);
        $suggestion = $annotationResult->getSuggestion();
        $concerns = $annotationResult->getConcerns();

        $db->selectCollection('imageAnnotations')
            ->insertOne([
                'hash' => md5($image),
                'customerId' => $this->Authentication->getIdentityData('_id'),
                'apiKey' => $this->Authentication->getIdentityData('apiKey'),
                'result' => (array)$result,
                'suggestion' => $suggestion,
                'created' => new UTCDateTime(),
            ]);

        return $this->json(compact('suggestion', 'concerns'));
    }
}
