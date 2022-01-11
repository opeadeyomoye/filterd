<?php

declare(strict_types=1);

namespace App\Identifier\Resolver;

use App\MongoDbClientFactory;
use Authentication\Identifier\Resolver\ResolverInterface;
use MongoDB\Database;

/**
 * Helps resolve identities stored in MongoDB.
 */
class DatabaseResolver implements ResolverInterface
{
    /**
     * {@inheritDoc}
     */
    public function find(array $conditions, string $type = self::TYPE_AND)
    {
        $email = array_values($conditions)[0];

        return $this->db()
            ->selectCollection('customers')
            ->findOne(compact('email'));
    }

    /**
     * @return Database
     */
    protected function db(): Database
    {
        return MongoDbClientFactory::get();
    }
}
