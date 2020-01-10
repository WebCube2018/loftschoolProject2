<?php
namespace App\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class Users extends BaseControllers
{
    protected $userModel;
    
    public function index()
    {
        if ($this->session->isGuest()) {
            $this->redirect("/login");
        }

        $users = User::all();
        if (!isset($users)) {
            throw new \InvalidArgumentException("No users");
        }

        $users = DB::table('users')
            ->join('files', 'users.files', '=', 'files.id')
            ->select('users.*', 'files.namefile')
            ->get();
#---------------------------НАЧАЛО ОТЛАДКА---------------------------#
echo "<pre>";
print_r($users);
echo "</pre>";
exit();
#---------------------------КОНЕЦ ОТЛАДКА----------------------------#

        $users = $users->toArray();

        $this->view->render(
            "users",
            [
                "user" => $this->session->getUserId(),
                "data" => $users,
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

        $userId = User::where('email', $login)->first()->toArray();
        $this->session->login($userId["id"]);
        $this->redirect("users");
    }

    public function logout()
    {
        $this->session->logout();
        $this->redirect("/login");
    }
}
