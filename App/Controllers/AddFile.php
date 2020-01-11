<?php
namespace App\Controllers;

use App\Models\File;

class AddFile extends BaseControllers
{
    protected $fileName;

    public function addFile()
    {
        //Если пользователь авторизован направим его на список пользователей
        if (!$this->session->getUserId()) {
            $this->redirect("/login");
        }

        //проверка на существоание файла
        if (!empty($_FILES["files"]["tmp_name"])) {
            $fileContent = file_get_contents($_FILES["files"]["tmp_name"]);
            $this->fileName = md5($_FILES["files"]["name"]) . ".png";
            file_put_contents("../www/images/" . $this->fileName, $fileContent);

            //Добавляем фвйл
            $addFile = new File();
            $addFile->namefile = $this->fileName;
            $addFile->user_id = $this->session->getUserId();
            $addFile->save();

            if (!empty($addFile)) {
                $this->redirect("/addfile?success=" . $this->fileName);
            }
        }

        $this->redirect("/addfile?error=1");
    }

    public function index()
    {
        //Если пользователь авторизован направим его на список пользователей
        if (!$this->session->getUserId()) {
            $this->redirect("/login");
        }

        $this->view->render(
            "addFile",
            [
                "success" => !empty($_GET["success"]),
                "namefile" => !empty($_GET["success"]) ? $_GET["success"] : "",
                "error" => !empty($_GET["error"])
            ]
        );
    }
}
