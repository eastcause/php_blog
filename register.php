<?php
    session_start();
    require 'core/database.php';

    if(isset($_POST['submit'])){
        $temail = '';
        if(empty($_POST['email'])){
            $_SESSION['error_email'] = '<span class="error">Podaj adres e-mail!</span>';
        }else{
            $email = $_POST['email'];
            $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
            $temail = $emailB;
            if((filter_var($emailB, FILTER_VALIDATE_EMAIL) == false) || ($email!=$emailB)){
                $_SESSION['error_email'] = '<span class="error">Podaj poprawny adres email!</span>';
            }
        }
        if(empty($_POST['user'])){
            $_SESSION['error_user'] = '<span class="error">Podaj nickname!</span>';
        }else{
            $user = $_POST['user'];
            $tuser = $user;
            if(strlen($user) < 4 || strlen($user) > 32){
                $_SESSION['error_user'] = '<span class="error">Nazwa użytkownika musi zawierać od 4 do 32 znaków!</span>';
            }
            if(!ctype_alnum($user)){
                $_SESSION['error_user'] = '<span class="error">Nazwa użytkownika może zawierać jedynie znaki alfabetu oraz liczby!</span>';
            }
        }
        if(empty($_POST['pass1'])){
            $_SESSION['error_pass1'] = '<span class="error">Podaj hasło!</span>';
        }else{
            $fpass1 = $_POST['pass1'];
            if(strlen($fpass1) < 6){
                $_SESSION['error_pass1'] = '<span class="error">Minimalna długość hasła to 6 znaków!</span>';
            }
            if(strlen($fpass1) > 32){
                $_SESSION['error_pass1'] = '<span class="error">Maxymalna długość hasła to 32 zanki!</span>';
            }
            if(empty($_SESSION['error_pass1'])){
                if(!preg_match('`^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$`', $fpass1)) {
                    $_SESSION['error_pass1'] = '<span class="error">Twoje hasło musi zawierać: Dużą literę, małą literę oraz cyfre!</span>';
                }
            }
        }
        if(empty($_POST['pass2'])){
            $_SESSION['error_pass2'] = '<span class="error">Podaj hasło!</span>';
        }

        if((!empty($_POST['pass1'])) && (!empty($_POST['pass2']))){
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            if($pass1 != $pass2){
                $_SESSION['error_pass2'] = '<span class="error">Podane hasła nie są takie same!</span>';
            }
        }

        if(empty($_POST['check'])){
            $_SESSION['error_check'] = '<span class="error">Musisz zaakceptować regulamin!</span>';
        }

        $done = true;
        if(isset($_SESSION['error_email']) || isset($_SESSION['error_user']) || isset($_SESSION['error_pass1']) || isset($_SESSION['error_pass2']) || isset($_SESSION['error_check'])){
            $done = false;
        }

        if($done){
            $db = Database::getInstance();
            try {
                $user = $_POST['user'];
                $password = $_POST['pass1'];
                $sha1 = sha1($password);

                $checkEmail =$db->getConnection()->prepare("SELECT `id` FROM `users` WHERE `email`=:user");
                $checkEmail->bindParam(":user", $temail);
                $checkEmail->execute();
                if($checkEmail->rowCount() != 0){
                    $_SESSION['error_email'] = '<span class="error">Użytkownik z takim adresem email już istnieje!</span>';
                }else{
                    $checkName = $db->getConnection()->prepare("SELECT `id` FROM `users` WHERE `nickname`=:user");
                    $checkName->bindParam(":user", $user);
                    $checkName->execute();
                    if($checkName->rowCount() != 0) {
                        $_SESSION['error_user'] = '<span class="error">Użytkownik z takim nickiem już istnieje!</span>';
                    }else{
                        $input = $db->getConnection()->prepare("INSERT INTO `users`(`id`, `email`, `nickname`, `password`, `auth_key`) VALUES ('NULL',:email, :user, :password, '')");
                        $input->bindParam(":email", $temail);
                        $input->bindParam(":user", $user);
                        $input->bindParam(":password", $sha1);
                        $input->execute();

                        unset($_SESSION['error_email']);
                        unset($_SESSION['error_user']);
                        unset($_SESSION['error_pass1']);
                        unset($_SESSION['error_pass2']);
                        unset($_SESSION['error_check']);

                        $_SESSION['register'] = $user . ', Twoje konto zostało utworzone, zaloguj się!';
                        header( "Location: login.php" );
                    }
                }
            }catch (Exception $e){
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
            <h1>REJESTRACJA</h1>
            <hr>
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Adres email</label>
                    <input type="email" name="email" class="form-control" id="email">
                    <?php
                        if(!empty($_SESSION['error_email'])){
                            echo $_SESSION['error_email'];
                            unset($_SESSION['error_email']);
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="user" class="form-label">Nick</label>
                    <input type="text" name="user" class="form-control" id="user">
                    <?php
                        if(!empty($_SESSION['error_user'])){
                            echo $_SESSION['error_user'];
                            unset($_SESSION['error_user']);
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Hasło</label>
                    <input type="password" name="pass1" class="form-control" id="pass">
                    <?php
                        if(!empty($_SESSION['error_pass1'])){
                            echo $_SESSION['error_pass1'];
                            unset($_SESSION['error_pass1']);
                        }
                    ?>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Powtórz hasło</label>
                    <input type="password" name="pass2" class="form-control" id="pass">
                    <?php
                        if(!empty($_SESSION['error_pass2'])){
                            echo $_SESSION['error_pass2'];
                            unset($_SESSION['error_pass2']);
                        }
                    ?>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="check" class="form-check-input" id="check">
                    <label class="form-check-label" for="check">Akceptuje <a href="rules.php">regulamin</a></label>
                    <?php
                        if(!empty($_SESSION['error_check'])){
                            echo '<br>'. $_SESSION['error_check'];
                            unset($_SESSION['error_check']);
                        }
                    ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Zarejestruj</button>
                <div class="mb-3 or">
                    <span>
                        Posiadasz już konto? <a href="login.php">Zaloguj się tutaj.</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
