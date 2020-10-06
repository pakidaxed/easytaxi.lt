<?php

use Core\FileDB;

require "../bootloader.php";

$db = new FileDB(DB_FILE);
$db->load();
$db->createTable('users');
$db->createTable('feedbacks');
$db->save();
$db->showMessage();
