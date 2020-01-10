<?php
namespace App\Tools;

use App\Models\BaseModel;

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
        BaseModel::init(
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
    }

    public function run()
    {
        if ($_SERVER["REQUEST_URI"] == "/form") {
            echo "<pre>";
            print_r("the form");
            echo "</pre>";
        } elseif ($_SERVER["REQUEST_URI"] == "/files") {
            echo "<pre>";
            print_r("the files");
            echo "</pre>";
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
            throw new \Exception("no template");
        }
    }
}
