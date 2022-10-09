<?php
    session_start();
    require 'core/database.php';
    $db = Database::getInstance();
    if (isset($_POST['submit'])) {
        $temail = '';
        if (empty($_POST['email'])) {
            $_SESSION['error_email'] = '<span class="error">Podaj adres email lub użytkownika!</span>';
        }else{
            $email = $_POST['email'];
            if(strpos($email, "@") !== false) {
                $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
                $temail = $emailB;
                if ((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($email != $emailB)) {
                    $_SESSION['error_email'] = '<span class="error">Podaj poprawny adres email!</span>';
                }
            }
        }

        if (empty($_POST['pass'])) {
            $_SESSION['error_pass'] = '<span class="error">Podaj hasło!</span>';
        }else{
            $fpass = $_POST['pass'];
            if(strlen($fpass) < 6 || strlen($fpass) > 32 || !preg_match('`^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$`', $fpass)){
                $_SESSION['error_pass'] = '<span class="error">Podane hasło jest niepoprawne!</span>';
            }
        }


        $done = true;
        if(isset($_SESSION['error_email']) || isset($_SESSION['error_pass'])){
            $done = false;
        }

        if($done){
            try {
                include 'Utils.php';
                $user = $_POST['email'];
                $pass = $_POST['pass'];

                $mail = (strpos($user, "@") !== false);
                if(!$mail) {
                    if (strlen($user) < 4 || strlen($user) > 32) {
                        $_SESSION['error_email'] = '<span class="error">Nazwa użytkownika może zawierać od 4 do 32 znaków!</span>';
                    }
                    if (!ctype_alnum($user)) {
                        $_SESSION['error_email'] = '<span class="error">Nazwa użytkownika może zawierać jedynie znaki alfabetu oraz liczby!</span>';
                    }
                    $check =$db->getConnection()->prepare("SELECT * FROM `users` WHERE `nickname`=:user");
                    $check->bindParam(":user", $user);
                    $check->execute();
                    if($check->rowCount() == 0) {
                        $_SESSION['error_sum'] = '<span class="error">Nie odnaleziono takiego użytkownika!</span>';
                    }else{
                        $realpass = $check->fetchColumn(3);
                        if(sha1($pass) != $realpass){
                            $_SESSION['error_sum'] = '<span class="error">Podane hasło lub login jest nieprawidłowy!</span>';
                        }else{
                            $key = Utils::generateRandomString(128);
                            $_SESSION['logged'] = $key;
                            $check =$db->getConnection()->prepare("UPDATE `users` SET `auth_key`=:key WHERE `nickname`=:user");
                            $check->bindParam(":key", $key);
                            $check->bindParam(":user", $user);
                            $check->execute();
                            header("Location: index.php");
                            exit();
                        }
                    }
                }else{
                    $check =$db->getConnection()->prepare("SELECT * FROM `users` WHERE `email`=:email");
                    $check->bindParam(":email", $temail);
                    $check->execute();
                    if($check->rowCount() == 0) {
                        $_SESSION['error_sum'] = '<span class="error">Nie odnaleziono takiego użytkownika!</span>';
                    }else{
                        $realpass = $check->fetchColumn(3);
                        if(sha1($pass) != $realpass){
                            $_SESSION['error_sum'] = '<span class="error">Podane hasło lub email jest nieprawidłowy!</span>';
                        }else{
                            $key = Utils::generateRandomString(128);
                            $_SESSION['logged'] = $key;
                            $check =$db->getConnection()->prepare("UPDATE `users` SET `auth_key`=:key WHERE `email`=:email");
                            $check->bindParam(":key", $key);
                            $check->bindParam(":email", $temail);
                            $check->execute();
                            header("Location: index.php");
                            exit();
                        }
                    }
                }
            }catch (Exception $e){
                //echo $e->getMessage();
            }

        }

    }
?>

<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/newstyle.css">
        <link rel="stylesheet" href="css/fontello.css">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto form-sign">
                    <h1>LOGOWANIE</h1>
                    <hr>
                    <form method="post">
                        <?php
                            if(!empty($_SESSION['register'])){
                                echo '<span class="error">'.$_SESSION['register'].'</span>';
                                unset($_SESSION['register']);
                            }
                        ?>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adres email lub nazwa użytkownika</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <?php
                                if(!empty($_SESSION['error_email'])){
                                    echo $_SESSION['error_email'];
                                    unset($_SESSION['error_email']);
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Hasło</label>
                            <input type="password" name="pass" class="form-control" id="pass">
                            <?php
                                if(!empty($_SESSION['error_pass'])){
                                    echo '<br>'.$_SESSION['error_pass'];
                                    unset($_SESSION['error_pass']);
                                }
                            ?>
                        </div>
                        <?php
                        if(!empty($_SESSION['error_sum'])){
                            echo ' <div class="mb-3">'.$_SESSION['error_sum']. '</div>';
                            unset($_SESSION['error_sum']);
                        }
                        ?>
                        <button type="submit" name="submit" class="btn btn-primary">Zaloguj</button>
                        <div class="mb-3 or">
                            <span>
                                Nie masz konta? <a href="register.php">Zarejestruj się tutaj.</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
