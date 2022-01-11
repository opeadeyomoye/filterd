<?php

declare(strict_types=1);

namespace App\Identifier\Resolver;

use App\MongoDbClientFactory;
use Authentication\Identifier\Resolver\ResolverInterface;
use MongoDB\Database;

/**
 * Helps identify customers by their api keys.
 */
class ApiKeyResolver implements ResolverInterface
{
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

        return $this->db()
            ->selectCollection('customers')
            ->findOne(['_id' => $apiKey['customerId']]);
    }

    /**
     * @return Database
     */
    protected function db(): Database
    {
        return MongoDbClientFactory::get();
    }
}
