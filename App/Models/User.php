<?php
namespace App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;

class User extends BaseModel
{
    public function getUserId($id)
    {
        self::$eloquent;
        $users = Capsule::table('users')->where('id', '=', $id)->get();
        return $users;
    }
}
