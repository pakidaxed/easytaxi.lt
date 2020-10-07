<?php


namespace App\Abstracts;


use App\App;
use Core\Router;

abstract class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!App::$session->getUser()) {
            Router::redirect('login');
        }
    }
}