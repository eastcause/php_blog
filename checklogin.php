<?php

$logged = false;
$username = '';
if(isset($_SESSION['logged'])) {
    $key = $_SESSION['logged'];
    $check = $db->getConnection()->prepare("SELECT * FROM `users` WHERE `auth_key`=:key");
    $check->bindParam(":key", $key);
    $check->execute();
    if ($check->rowCount() == 0) {
        unset($_SESSION['logged']);
        $_SESSION['logout'] = true;
        header('Location: login.php');
        exit();
    }else{
        $logged = true;
        $username = $check->fetchColumn(2);
    }
}