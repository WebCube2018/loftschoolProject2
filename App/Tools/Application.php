<?php
namespace App\Tools;

use App\Models\BaseModel;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    public function __construct()
    {
        $this->session();
        $this->loader();
        $this->db();
    }

    protected function session()
    {
        session_start();
    }

    protected function loader()
    {
        require_once __DIR__ . "/../../vendor/autoload.php";
    }

    protected function db()
    {
        BaseModel::$DB = new Capsule;
        BaseModel::$DB->addConnection(
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
        BaseModel::$DB->setAsGlobal();
        BaseModel::$DB->bootEloquent();
    }

    public function run()
    {
        if ($_SERVER["REQUEST_URI"] == "/files") {
            $controllers = new \App\Controllers\Files();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/addfile" && !empty($_FILES)) {
            $controllers = new \App\Controllers\AddFile();
            $controllers->addFile();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/addfile") === 0) {
            $controllers = new \App\Controllers\AddFile();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/users") {
            $controllers = new \App\Controllers\Users();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/login" && !empty($_POST)) {
            $controllers = new \App\Controllers\Users();
            $controllers->login();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/login") === 0) {
            $controllers = new \App\Controllers\Users();
            $controllers->autch();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/registration") === 0) {
            $controllers = new \App\Controllers\AddUser();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/logout") {
            $controllers = new \App\Controllers\Users();
            $controllers->logout();
            exit();
        } else {
            $controllers = new \App\Controllers\Error();
            $controllers->index();
            exit();
        }
    }
}
