<?php

namespace App\Views;

use App\App;
use Core\Router;
use Core\View;

class Navigation extends View
{
    public function __construct()
    {
        $nav = [];

        $nav['home'] = ['url' => Router::getUrl('index'), 'title' => 'Pagrindinis'];

        if (App::$session->getUser()) {
            $nav['feedbacks'] = ['url' => Router::getUrl('feedbacks-user'), 'title' => 'Feedbacks'];
            $nav[] = ['url' => Router::getUrl('logout'), 'title' => 'Logout'];
        } else {
            $nav['feedbacks'] = ['url' => Router::getUrl('feedbacks-guest'), 'title' => 'Feedbacks'];
            $nav[] = ['url' => Router::getUrl('login'), 'title' => 'Login'];
            $nav[] = ['url' => Router::getUrl('register'), 'title' => 'Register'];
        }
        parent::__construct($nav);
    }

    public function render(string $template_path = '../core/templates/parts/topmenu.tpl.php'): string
    {
        return parent::render($template_path);
    }
}
