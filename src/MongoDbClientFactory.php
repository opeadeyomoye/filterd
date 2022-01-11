<?php
declare(strict_types=1);

namespace App;

use MongoDB\Client as MongoClient;
use MongoDB\Database;

class MongoDbClientFactory
{
    protected static ?Database $_client = null;

    public static function get(): Database
    {
        if (!self::$_client) {
            self::$_client = (new MongoClient(env('MONGO_DB_URL')))
                ->selectDatabase(env('MONGO_DB_NAME'));
        }

        return self::$_client;
    }
}
