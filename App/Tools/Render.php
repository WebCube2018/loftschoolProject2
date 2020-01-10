<?php
namespace App\Tools;

class Render
{
    private $templateDir;

    public function __construct()
    {
        $this->templateDir = realpath(__DIR__ . "/../Views");
    }

    public function render($template, $data = [], $extract = true)
    {
        $path = $this->templateDir . "/" . $template . ".php";

        if (!file_exists($path)) {
            throw new \RuntimeException("No Template");
        }

        if ($extract) {
            extract($data);
        }

        include $path;
    }
}
