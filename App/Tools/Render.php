<?php
namespace App\Tools;

class Render
{
    private $templateDir;

    public function __construct()
    {
        $this->templateDir = realpath(__DIR__ . "/../Views");
    }

    public function render($template, $data = [])
    {
        $path = $this->templateDir . "/" . $template . ".php";

        if (!file_exists($path)) {
            throw new \RuntimeException("No Template");
        }

        extract($data);

        include $path;
    }
}
