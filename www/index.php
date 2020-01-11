<?php
define("APP_DIR", realpath(__DIR__ . "/../App"));
require_once APP_DIR."/Tools/config.php";
require_once APP_DIR."/Tools/Application.php";

$app = new \App\Tools\Application();

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}
