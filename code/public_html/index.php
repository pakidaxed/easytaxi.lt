<?php

use Core\FileDB;

require "../bootloader.php";
?>
<img src="assets/img/logo.png" alt="">
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$db = new FileDB(DB_FILE);
$db->load();

?>
</body>
</html>
