<?php

declare(strict_types=1);

namespace App\Identifier\Resolver;

use App\MongoDbClientAwareTrait;
use Authentication\Identifier\Resolver\ResolverInterface;

/**
 * Helps identify customers by their api keys.
 */
class ApiKeyResolver implements ResolverInterface
{
    use MongoDbClientAwareTrait;

    /**
     * {@inheritDoc}
     */
    public function find(array $conditions, string $type = self::TYPE_AND)
    {
        $key = array_values($conditions)[0];

        $apiKey = $this->db()
            ->selectCollection('apiKeys')
            ->findOne(['_id' => $key]);

        if (!$apiKey) {
            return null;
        }

        $identity = $this->db()
            ->selectCollection('customers')
            ->findOne(['_id' => $apiKey['customerId']]);

        if (!$identity) {
            return null;
        }

        return ['apiKey' => $key] + (array)$identity;
    }
}
