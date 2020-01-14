<?php
namespace App\Tools;

use App\Controllers\AddFile;
use App\Controllers\AddUser;
use App\Controllers\EditUser;
use App\Controllers\Error;
use App\Controllers\Files;
use App\Controllers\Users;
use Illuminate\Database\Capsule\Manager as Capsule;

class Application
{
    public static $DB;

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
        self::$DB = new Capsule;
        self::$DB->addConnection(
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
        self::$DB->setAsGlobal();
        self::$DB->bootEloquent();
    }

    public function run()
    {
        if ($_SERVER["REQUEST_URI"] == "/files") {
            $controllers = new Files();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/addfile" && !empty($_FILES)) {
            $controllers = new AddFile();
            $controllers->addFile();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/addfile") === 0) {
            $controllers = new AddFile();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/users") {
            $controllers = new Users();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/login" && !empty($_POST)) {
            $controllers = new Users();
            $controllers->login();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/login") === 0) {
            $controllers = new Users();
            $controllers->autch();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/registration") {
            $controllers = new AddUser();
            $controllers->index();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/registration") === 0) {
            $controllers = new AddUser();
            $controllers->errorUser();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/adduser") {
            $controllers = new AddUser();
            $controllers->addUsers();
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/adduser") === 0) {
            $controllers = new AddUser();
            $controllers->errorUser("adduser");
            exit();
        } elseif (strpos($_SERVER["REQUEST_URI"], "/edituser") === 0) {
            $controllers = new EditUser();
            $controllers->index();
            exit();
        } elseif ($_SERVER["REQUEST_URI"] == "/logout") {
            $controllers = new Users();
            $controllers->logout();
            exit();
        } else {
            $controllers = new Error();
            $controllers->index();
            exit();
        }
    }
}
