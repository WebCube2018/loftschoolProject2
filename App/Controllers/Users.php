<?php
namespace App\Controllers;

use App\Models\User;
use Illuminate\Database\Capsule\Manager as DB;

class Users extends BaseControllers
{
    public function index()
    {
        if ($this->session->isGuest()) {
            $this->redirect("/login");
        }

        $user = User::all();
        if (!isset($user)) {
            throw new \InvalidArgumentException("No users");
        }

        $users = DB::table('users')
            ->orderBy('age', 'desc')
            ->join('files', 'users.id', '=', 'files.user_id')
            ->select('users.*', 'files.namefile')
            ->get()
            ->toArray();
        
        $this->view->render(
            "users",
            [
                "user" => $this->session->getUserId(),
                "data" => $users,
                "role" => $this->session->getUserRole()
            ]
        );
    }

    public function autch()
    {
        //Если пользователь авторизован направим его на список пользователей
        if ($this->session->getUserId()) {
            $this->redirect("/users");
        }

        $this->view->render(
            "autch",
            [
                "error" => !empty($_GET["error"])
            ]
        );
    }

    public function login()
    {
        //Проверка пользователя в БД перенаправление если прошла проверка удасно или не удачно
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            throw new \InvalidArgumentException();
        }

        $login = strtoupper(trim($_POST["email"]));
        $password = sha1(trim($_POST["password"] . "loft"));

        $autch = User::where([
            ["email", "=", $login],
            ["password", "=", $password]
        ])->get()->toArray();

        if (empty($autch)) {
            $this->redirect("/login?error=1");
        }

        $user = User::where('email', $login)->first()->toArray();
        $this->session->login($user["id"], $user["role"]);
        $this->redirect("users");
    }

    public function logout()
    {
        $this->session->logout();
        $this->redirect("/login");
    }
}
