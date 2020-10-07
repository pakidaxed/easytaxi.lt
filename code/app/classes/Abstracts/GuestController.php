<?php

namespace App\Abstracts;


use App\App;
use Core\Router;

abstract class GuestController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $allowed_for_users = ['/']; // You may enter any url, to allow the registered users to navigate
        if (App::$session->getUser() && !in_array($_SERVER['REQUEST_URI'], $allowed_for_users)) {
            Router::redirect('index');
        }
    }
}