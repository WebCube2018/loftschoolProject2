<?php
namespace App\Tools;

class Session
{
    const KEY_USER = "user";
    const KEY_ROLE = "role";

    public function login($userId, $userRole)
    {
        $_SESSION[self::KEY_USER] = $userId;
        $_SESSION[self::KEY_ROLE] = $userRole;
    }

    public function logout()
    {
        $_SESSION[self::KEY_USER] = null;
    }

    public function isGuest()
    {
        return empty($_SESSION[self::KEY_USER]);
    }

    public function getUserId()
    {
        if ($this->isGuest()) {
            return null;
        }

        return $_SESSION[self::KEY_USER];
    }

    public function getUserRole()
    {
        if ($this->isGuest()) {
            return null;
        }

        return $_SESSION[self::KEY_ROLE];
    }
}
