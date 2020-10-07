<?php

namespace App;


use Core\FileDB;
use Core\Router;
use Core\Session;

class App
{
    public static FileDB $db;
    public static Session $session;
    private static Router $router;

    public function __construct()
    {
        self::$db = new FileDB(DB_FILE);
        self::$db->load();

        self::$session = new Session();

        self::$router = new Router();
    }

    public function __destruct()
    {
        self::$db->save();
    }

    public function run()
    {
        $html = self::$router->run();
        !$html ? Router::redirect('index') : print $html;
    }
}