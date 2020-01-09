<?php
namespace App\Controllers;

use App\Tools\Render;
use App\Tools\Session;

class BaseControllers
{
    protected $session;
    protected $view;

    public function __construct()
    {
        $this->session = new Session();
        $this->view = new Render();
    }

    public function redirect($url)
    {
        header("Location:" . $url);
        exit;
    }
}
