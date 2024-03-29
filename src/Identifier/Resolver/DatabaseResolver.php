<?php

declare(strict_types=1);

namespace App\Identifier\Resolver;

use App\DatabaseAwareTrait;
use Authentication\Identifier\Resolver\ResolverInterface;

/**
 * Helps resolve identities stored in MongoDB.
 */
class DatabaseResolver implements ResolverInterface
{
    use DatabaseAwareTrait;

    /**
     * {@inheritDoc}
     */
    public function find(array $conditions, string $type = self::TYPE_AND)
    {
        $email = array_values($conditions)[0];

        return (array)$this->db()
            ->selectCollection('customers')
            ->findOne(compact('email'));
    }
}
