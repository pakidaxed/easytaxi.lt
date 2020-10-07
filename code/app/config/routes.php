<?php

use Core\Router;

Router::add('index', '/', '\App\Controllers\Guest\DefaultController');
Router::add('feedbacks-guest', '/feedbacks', '\App\Controllers\Guest\FeedbacksController');
Router::add('feedbacks-user', '/feedbacks/add', '\App\Controllers\User\FeedbacksController');

Router::add('login', '/login', '\App\Controllers\Guest\LoginController');
Router::add('register', '/register', '\App\Controllers\Guest\RegisterController');
Router::add('logout', '/logout', '\App\Controllers\User\LogoutController');

