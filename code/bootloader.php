<?php
session_start();
define('ROOT', __DIR__);
define('DB_FILE', ROOT.'/app/data/db.json');
ini_set('xdebug.var_display_max_depth', '10');
ini_set( 'error_reporting', E_ALL );

require 'vendor/autoload.php';
require 'app/config/routes.php';

require 'app/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/validators.php';



$app = new App\App();


