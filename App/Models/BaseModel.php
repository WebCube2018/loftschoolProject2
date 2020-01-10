<?php

namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class BaseModel
{
    protected static $eloquent;

    public function __construct()
    {
        if (self::$eloquent === null) {
            throw new \RuntimeException("No db");
        }
    }

    public static function init(array $config)
    {
        self::$eloquent = new Capsule;
        self::$eloquent->addConnection($config);
        self::$eloquent->setAsGlobal();
        self::$eloquent->bootEloquent();
    }
}
