<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**@var string */
    protected $table = "files";

    /**@var bool*/
    public $timestamps = false;
}