<?php
namespace App\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as DB;

class AddUser extends BaseControllers
{
    protected $fileName = false;

    public function index()
    {
        //Если пользователь авторизован направим его на список пользователей
        if ($this->session->getUserId()) {
            $this->redirect("/users");
        }

        $this->addUser("/users", "/registration");

        $this->view->render(
            "registration"
        );
    }

    //Метод добавляет пользователя в систему
    protected function addUser(string $luckUrl, string $failUrl)
    {
        //проверка на существоание файла
        if (!empty($_FILES["files"]["tmp_name"])) {
            $fileContent = file_get_contents($_FILES["files"]["tmp_name"]);
            $this->fileName = md5($_FILES["files"]["name"]) . ".png";
            file_put_contents("../www/images/" . $this->fileName, $fileContent);
        }

        if (!empty($_POST)) {
            //Добавляем пользователя в БД
            $addUser = new User();

            $email = htmlspecialchars(strtoupper(trim($_POST["email"])));
            $name = htmlspecialchars($_POST["name"]);
            $age = htmlspecialchars($_POST["age"]);
            $description = htmlspecialchars($_POST["description"]);
            $role = htmlspecialchars($_POST["role"]);

            //Проверка на существование пользователя
            $checkUser = DB::table('users')
                ->select("email")
                ->where("email", "=", $email)
                ->get()
                ->toArray();

            if (!empty($checkUser)) {
                $this->redirect($failUrl . "?error=2");
            }

            $addUser->email = $email;
            $addUser->password = sha1(trim($_POST["password"] . "loft"));
            $addUser->name = $name;
            $addUser->age = $age;
            $addUser->description = $description;

            //Добавляем роль при регистрации роль обычный пользватель без прав админа
            $addUser->role = $this->session->getUserRole() == 1 ? $role : USER_ROLE_NORMAL;

            $addUser->save();

            //Добавляем фвйл
            $addFile = new File();
            $addFile->namefile = $this->fileName;
            $addFile->user_id = $addUser->id;
            $addFile->save();

            if ($failUrl == "/registration") {
                //Сразу авторизуем пользователя после регистрации и направлем на список пользователей
                $this->session->login($addUser->id, $addUser->role);
                $this->redirect($luckUrl);
            }

            return $addUser->id;
        }
    }

    public function errorUser(string $template = "registration")
    {
        $this->view->render(
            $template,
            [
                "error" => !empty($_GET["error"]) ? $_GET["error"] : "",
                "role" => $this->session->getUserRole()
            ]
        );
    }

    public function addUsers()
    {
        if ($this->session->isGuest()) {
            $this->redirect("/login");
        }

        $checkRole = $this->session->getUserRole();

        if ($checkRole != 1) {
            $this->redirect("/adduser?error=1");
        }

        $result = $this->addUser("/adduser", "/adduser");

        $this->view->render(
            "adduser",
            [
                "user" => $this->session->getUserId(),
                "role" => $this->session->getUserRole(),
                "result" => !empty($result) ? $result : ""
            ]
        );
    }
}
