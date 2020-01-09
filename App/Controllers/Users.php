<?php
namespace App\Controllers;


class Users extends BaseControllers
{
    public function index()
    {
        if ($this->session->isGuest()) {
            $this->redirect("/login");
        }

//        echo "Ты в индексе" . $this->session->getUser();
        $this->view->render(
            "users",
            [
                "user" => $this->session->getUser(),
            ]
        );
    }

    public function autch()
    {
        $this->view->render(
            "autch",
            [
                "error" => !empty($_GET["error"])
            ]
        );
    }

    public function login()
    {
        if (empty($_POST["login"]) || empty($_POST["password"])) {
            throw new \InvalidArgumentException();
        }

        $login = strtoupper(trim($_POST["login"]));
        $password = sha1(trim($_POST["password"]));

        if ($password !== sha1(123)) {
            $this->redirect("/login?error=1");
        }

        $userId = $login;

        $this->session->login($userId);
        $this->redirect("users");
    }

    public function logout()
    {
        $this->session->logout();
    }
}
