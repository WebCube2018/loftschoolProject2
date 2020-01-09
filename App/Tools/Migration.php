<?php

namespace App\Tools;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class Migration
{
    public function run()
    {
        $capsule = new Capsule;
        $capsule->addConnection(
            [
                "driver"    => "mysql",
                "host"      => "localhost:3306",
                "database"  => "project2",
                "username"  => "root",
                "password"  => "root",
                "charset"   => "utf8",
                "collation" => "utf8_unicode_ci",
                "prefix"    => "",
            ]
        );
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        Capsule::schema()->dropIfExists("users");

        Capsule::schema()->create("users", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->integer("age");
            $table->string("description");
            $table->string("files");
        });

        Capsule::schema()->dropIfExists("files");

        Capsule::schema()->create("files", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
        });
    }
}
