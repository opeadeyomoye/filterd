<?php

declare(strict_types=1);

namespace App\Identifier\Resolver;

use App\MongoDbClientAwareTrait;
use Authentication\Identifier\Resolver\ResolverInterface;

/**
 * Helps resolve identities stored in MongoDB.
 */
class DatabaseResolver implements ResolverInterface
{
    use MongoDbClientAwareTrait;

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
}
