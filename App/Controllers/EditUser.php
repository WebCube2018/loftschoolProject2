<?php
namespace App\Controllers;

use Illuminate\Database\Capsule\Manager as DB;

class EditUser extends BaseControllers
{
    public function index()
    {
        if ($this->session->isGuest()) {
            $this->redirect("/login");
        }

        $checkRole = $this->session->getUserRole();

        if ($checkRole != 1) {
            $this->redirect("/users");
        }

        if (!empty($_POST) && !empty($_GET["id"])) {
            //Обновляем пользователя в БД

            $userId = htmlspecialchars($_GET["id"]);
            $email = htmlspecialchars(strtoupper(trim($_POST["email"])));
            $name = htmlspecialchars($_POST["name"]);
            $age = htmlspecialchars($_POST["age"]);
            $description = htmlspecialchars($_POST["description"]);
            $role = htmlspecialchars($_POST["role"]);


            $result = DB::table("users")
                ->where("id", $userId)
                ->update([
                    "name" => $name,
                    "age" => $age,
                    "email" => $email,
                    "description" => $description,
                    "role" => $role

                ]);
            
            if (empty($result)) {
                $this->redirect("edituser?id=" . $userId . "&error=2");
            }
        }

        if (!empty($_GET["id"])) {
            $userId = htmlspecialchars($_GET["id"]);

            $query = DB::table("users")
                ->select("name", "age", "description", "email", "role")
                ->where("id", "=", $userId)
                ->get()
                ->toArray();
        }

        $this->view->render(
            "editUser",
            [
                "userid" => $this->session->getUserId(),
                "role" => $this->session->getUserRole(),
                "user" => !empty($query) ? $query[0] : "",
                "result" => !empty($result) ? $result : "",
                "error" => !empty($_GET["error"]) ? $_GET["error"] : ""
            ]
        );
    }
}
