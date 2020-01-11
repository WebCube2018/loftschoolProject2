<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class BaseModel
{
    public static $DB;

    public function __construct()
    {
        if (self::$DB === null) {
            throw new \RuntimeException("No db");
        }
    }

    public static function init(array $config)
    {
        self::$DB = new Capsule;
        self::$DB->addConnection($config);
        self::$DB->setAsGlobal();
        self::$DB->bootEloquent();
    }
}
