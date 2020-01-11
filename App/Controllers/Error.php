<?php
namespace App\Controllers;

class Error extends BaseControllers
{
    public function index()
    {
        header("HTTP/1.0 404 Not Found");

        $this->view->render(
            "404"
        );
    }
}
