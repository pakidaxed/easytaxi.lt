<?php


namespace App\Controllers\User;

use App\Abstracts\UserController;
use App\App;
use Core\Router;

class LogoutController extends UserController
{

    /**
     * Logging out the user
     *
     * @return string|null
     */
    function index(): ?string
    {
        App::$session->logout(Router::getUrl('index'));
        return 'Logged out';
    }
}