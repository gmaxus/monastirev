<?php

include 'config.php';
include 'safemysql.php';
include 'messages.class.php';
include 'image.class.php';

$db = new SafeMySQL($db_connect);
$messages = new Messages();
$image = new Image();

$messages->table = $db_connect['table'];

session_start();

if(isset($_SESSION['is_admin']))
    $is_admin = true;
else
    $is_admin = false;

?>