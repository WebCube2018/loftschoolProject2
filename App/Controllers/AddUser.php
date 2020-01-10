<?php
namespace App\Controllers;

use App\Models\File;
use App\Models\User;

class AddUser extends BaseControllers
{
    public function index()
    {
        //Если пользователь авторизован направим его на список пользователей
        if ($this->session->getUserId()) {
            $this->redirect("/users");
        }

        $fileName = false;

        //проверка на существоание файла
        if (!empty($_FILES["files"]["tmp_name"])) {
            $fileContent = file_get_contents($_FILES["files"]["tmp_name"]);
            $fileName = md5($_FILES["files"]["name"]) . ".png";
            file_put_contents("../www/images/" . $fileName, $fileContent);
        }

        if (!empty($_POST)) {
            //Добавляем фвйл
            $addFile = new File();
            $addFile->namefile = $fileName;
            $addFile->save();

            //Добавляем пользователя в БД
            $addUser = new User();
            $addUser->email = htmlspecialchars(strtoupper(trim($_POST["email"])));
            $addUser->password = sha1(trim($_POST["password"] . "loft"));
            $addUser->name = htmlspecialchars($_POST["name"]);
            $addUser->age = htmlspecialchars($_POST["age"]);
            $addUser->description = htmlspecialchars($_POST["description"]);
            $addUser->files = $addFile->id;
            $addUser->save();

            //Сразу авторизуем пользователя после регистрации и направлем на список пользователей
            $this->session->login($addUser->id);
            $this->redirect("users");
        }

        $this->view->render(
            "registration"
        );
    }
}
