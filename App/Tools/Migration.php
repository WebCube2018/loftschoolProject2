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
                "driver"    => DRIVER,
                "host"      => HOST,
                "database"  => DATABASE,
                "username"  => USERNAME,
                "password"  => PASSWORD,
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
            $table->string("email");
        });

        Capsule::schema()->dropIfExists("files");

        Capsule::schema()->create("files", function (Blueprint $table) {
            $table->increments("id");
            $table->string("namefile");
            $table->integer("user_id");
        });
    }
}
