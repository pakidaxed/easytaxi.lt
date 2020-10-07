<?php

namespace Core;

use App\App;

class Session
{

    private ?array $user = null;

    public function __construct()
    {
        $this->loginFromCookie();
    }

    public function loginFromCookie()
    {
        if (!empty($_SESSION) && isset($_SESSION['email']) && isset($_SESSION['password'])) {
            if ($this->login($_SESSION['email'], $_SESSION['password'])) {
                return true;
            }
        }
        return false;
    }


    public function login($email, $password)
    {
        $db = App::$db->getRowsWhere('users', ['email' => $email, 'password' => $password]);
        if ($db) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['user_id'] = key($db);
            $this->user = reset($db);
            return true;
        }
        return false;
    }

    public function getUser(): ?array
    {
        return $this->user;
    }

    /**
     * Destroying user session and logging out
     *
     * @param null $redirect
     */
    public function logout($redirect = null): void
    {
        setcookie('PHPSESSID', null, -1);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['user_id']);
        $_SESSION = [];
        session_destroy();
        // if no redirect remains null
        !$redirect ?: header("Location: $redirect");
    }
}