<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\AnnotateImageForm;
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
    public function annotate(AnnotateImageForm $form): Response
    {
        if ($form->hasErrors()) {
            return $this->json(['errors' => $form->getErrors()], 400);
        }

        $client = new ImageAnnotatorClient();

        try {
            $annotation = $client->annotateImage(
                $form->getData('image')->getStream()->getContents(),
                [AnnotationType::SAFE_SEARCH_DETECTION]
            );
        } catch (Throwable $e) {
            return $this->json(['message' => 'Service unavailable'], 500);
        }

        $safeSearch = $annotation->getSafeSearchAnnotation();

        return $this->json([
            'annotation' => json_decode($safeSearch->serializeToJsonString()),
        ]);
    }
}
