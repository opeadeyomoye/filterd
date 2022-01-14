<?php
declare(strict_types=1);

namespace App;

use Google\Cloud\Vision\V1\Likelihood;
use Google\Cloud\Vision\V1\SafeSearchAnnotation;

class ImageAnnotationResult
{
    const SUGGESTION_ACCEPT = 'accept';
    const SUGGESTION_REJECT = 'reject';
    const SUGGESTION_REVIEW = 'review';

    protected SafeSearchAnnotation $annotation;
    protected ?string $prediction = null;
    protected ?string $suggestion = null;
    protected ?array $concerns = null;

    public function __construct(SafeSearchAnnotation $annotation)
    {
        $this->setAnnotation($annotation);
    }

    public function setAnnotation(SafeSearchAnnotation $annotation): ImageAnnotationResult
    {
        $this->annotation = $annotation;
        $this->suggestion = $this->evaluate($annotation);

        return $this;
    }

    public function getSuggestion(): ?string
    {
        return $this->suggestion;
    }

    public function getConcerns(): ?array
    {
        return $this->concerns;
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
            return self::SUGGESTION_ACCEPT;
        }
        $this->concerns = $concerns;

        // unsafe if there's likely adult content or violence present
        if (
            in_array($result->adult, $concerningLevels) ||
            in_array($result->violence, $concerningLevels)
        ) {
            return self::SUGGESTION_REJECT;
        }

        // otherwise, review
        return self::SUGGESTION_REVIEW;
    }
}
