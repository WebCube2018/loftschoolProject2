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
        $capsule = new Capsule;
        $capsule->addConnection($config);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
