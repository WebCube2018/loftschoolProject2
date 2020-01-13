<?php

namespace App\Models;

class BaseModel
{
    public static $DB;

    public function __construct()
    {
        if (self::$DB === null) {
            throw new \RuntimeException("No db");
        }
    }
}
