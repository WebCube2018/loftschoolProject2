<?php
namespace App\Tools;

class Session
{
    const KEY_USER = "user";

    public function login($userId)
    {
        $_SESSION[self::KEY_USER] = $userId;
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
}
