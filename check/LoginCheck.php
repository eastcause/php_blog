<?php

session_start();

class LoginCheck
{
    public function check(){
        if(empty($_SESSION['auth'])){
            header('Location: page/login.php');
            exit();
        }
        $_key = $_SESSION['auth'];
        require 'core/database.php';
        $db = Database::getInstance();
        $stmt = $db->query("SELECT `email` FROM `users` WHERE `auth_key`=:key", array(':key', $_key));
        if($stmt->rowCount() == 0){
            unset($_SESSION['auth']);
            header('Location: page/login.php');
            exit();
        }
    }

}