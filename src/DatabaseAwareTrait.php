<?php
declare(strict_types=1);

namespace App;

use MongoDB\Database;

trait DatabaseAwareTrait
{
    public function db(): Database
    {
        return MongoDbClientFactory::get();
    }
}
