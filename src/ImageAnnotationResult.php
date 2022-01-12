<?php
declare(strict_types=1);

namespace App;

use Google\Cloud\Vision\V1\Likelihood;
use Google\Cloud\Vision\V1\SafeSearchAnnotation;

class ImageAnnotationResult
{
    const PREDICTION_UNSAFE = 'unsafe';
    const PREDICTION_REVIEW = 'review';
    const PREDICTION_SAFE = 'safe';

    protected SafeSearchAnnotation $annotation;
    protected ?string $prediction = null;

    public function __construct(SafeSearchAnnotation $annotation)
    {
        $this->setAnnotation($annotation);
    }

    public function setAnnotation(SafeSearchAnnotation $annotation): ImageAnnotationResult
    {
        $this->annotation = $annotation;
        $this->prediction = $this->evaluate($annotation);

        return $this;
    }

    public function getPrediction(): ?string
    {
        return $this->prediction;
    }

    protected function evaluate(SafeSearchAnnotation $annotation): string
    {
        /**
         * adult, spoof, medical, violence, and racy
         *
         *
         * spoof and racy
         *
         * !!! [adult, violence] in_array [LIKELY, VERY_LIKELY]  -- unsafe
         * !!! [medical] in_array [LIKELY, VERY_LIKELY]          -- review
         * !!! [racy] in [LIKELY, VERY_LIKELY]                   -- review
         *
         */
        $result = json_decode($annotation->serializeToJsonString());
        $concerningLevels = [Likelihood::LIKELY, Likelihood::VERY_LIKELY];

        $concerns = array_intersect((array)$result, $concerningLevels);

        // safe if it's unlikely that any of our concerns are present
        if (count($concerns) === 0) {
            return self::PREDICTION_SAFE;
        }

        // unsafe if there's likely adult content or violence present
        if (
            in_array($result->adult, $concerningLevels) ||
            in_array($result->violence, $concerningLevels)
        ) {
            return self::PREDICTION_UNSAFE;
        }

        // otherwise, review
        return self::PREDICTION_REVIEW;
    }
}
