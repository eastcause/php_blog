<?php
session_start();
require 'core/database.php';
$db = Database::getInstance();
if(isset($_SESSION['logged'])) {
    $key = $_SESSION['logged'];
    $check = $db->getConnection()->prepare("SELECT * FROM `users` WHERE `auth_key`=:key");
    $check->bindParam(":key", $key);
    $check->execute();
    echo $check->rowCount();
    if ($check->rowCount() > 0) {
        unset($_SESSION['logged']);
        header('Location: login.php');
        exit();
    } else {
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}