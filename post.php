<?php
    session_start();
    require 'core/database.php';
    $db = Database::getInstance();
    $i = 0;
    $post_id = 1;
    if(isset($_GET['id'])){
        $post_id = $_GET['id'];
    }
    $select = $db->getConnection()->prepare("SELECT * FROM `posts` WHERE `id`=:id");
    $select->bindParam(':id', $post_id);
    $select->execute();
    if($select->rowCount() < 1){
        header('Location: notfound.php');
        exit();
    }

    include 'checklogin.php';
    require 'Utils.php';

    if(isset($_POST['submit'])){
        if(!$logged || empty($_POST['content'])){
            return;
        }
        $content = Utils::htmlEscape($_POST['content']);
        if (strlen($content) == 0) {
            $_POST['error_content'] = '<span class="error">Podaj zawartość! </span>';
        }
        if (strlen($content > 2000)) {
            $_POST['error_content'] = '<span class="error">Zawartość może zawierać maxymalnie 2000 znaków! </span>';
        }

        if ((empty($_POST['error_content']))) {
            $insert = $db->getConnection()->prepare("INSERT INTO `comments`(`post_id`, `author`, `content`) VALUES (:post, :author, :content)");
            $str = 'specu';
            $i = 0;
            $insert->bindParam(':post', $post_id);
            $insert->bindParam(':author', $username);
            $insert->bindParam(':content', $content);
            $insert->execute();
            $updated = 1;
        }
    }

    $post = $select->fetch();
    $comments = array();
    $select2 = $db->getConnection()->prepare("SELECT * FROM `comments` WHERE `post_id`=:id ORDER BY `created_at` ASC;");
    $select2->bindParam(':id', $post_id);
    $select2->execute();
    while ($row = $select2->fetch()){
        $comments[] = $row;
    }
    $views = $post[4];
    $views++;
    $update = $db->getConnection()->prepare("UPDATE `posts` SET `views`=:views WHERE `id`=:id");
    $update->bindParam(':views', $views);
    $update->bindParam(':id', $post_id);
    $update->execute();
    $firstComment = null;
    if(count($comments) != 0) {
        $firstComment = $comments[0];
        unset($comments[0]);
    }

?>

<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/newstyle.css">
    </head>

    <body class="d-flex flex-column min-vh-100">

        <?php include 'nav.php' ?>

        <div class="container">
            <section>
                <div class="container my-5 py-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-10 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                        <div>

                                            <h6 class="fw-bold text-primary mb-1"><?php echo $post[2]?></h6>
                                            <p class="text-muted small mb-0">Opublikowano - <?php echo $post[6] ?> przez <?php echo $post[1] ?></p>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-4 pb-2"><?php echo $post[3] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section >
                <div class="container my-5 py-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-10">
                            <div class="card text-dark">
                                <div class="card-body p-4">

                                    <h4 class="mb-0">Odpowiedzi</h4>
                                    <p class="fw-light mb-4 pb-2">Sortowanie od najstarszej do najnowszej!</p>
                                    <div class="d-flex flex-start">
                                        <div>
                                            <?php if($firstComment == null){ ?>
                                                Brak odpowiedzi
                                            <?php }else{ ?>
                                                <h6 class="fw-bold mb-1"><?php echo $firstComment[2] ?></h6>
                                                <div class="d-flex align-items-center mb-3">
                                                    <p class="mb-0"><?php echo $firstComment[4] ?></p>
                                                </div>
                                                <p class="mb-0"><?php echo $firstComment[3] ?></p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-0" />

                                <?php if(count($comments) > 0){
                                    foreach ($comments as $comment) {?>

                                        <div class="card-body p-4">
                                            <div class="d-flex flex-start">
                                                <div>
                                                    <h6 class="fw-bold mb-1"><?php echo $comment[2] ?></h6>
                                                    <div class="d-flex align-items-center mb-3">
                                                        <p class="mb-0"><?php echo $comment[4] ?></p>
                                                    </div>
                                                    <p class="mb-0">
                                                        <?php echo $comment[3] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-0" />

                                    <?php }} ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container my-5 py-5 text-dark">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-6">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="d-flex flex-start w-100">
                                        <div class="w-100">
                                            <h5>Dodaj komentarz</h5>
                                            <form method="post">
                                                <div class="form-outline">
                                                    <textarea class="form-control" name="content" id="textAreaExample" <?php if(!$logged) echo 'disabled'?> rows="4" maxlength="2000"></textarea>
                                                    <label class="form-label" <?php if(!$logged) echo 'disabled'?> for="textAreaExample">Limit znaków 2000.</label>
                                                    <?php
                                                        if(!empty($_POST['error_content'])){
                                                            echo $_POST['error_content'];
                                                            unset($_POST['error_content']);
                                                        }
                                                    ?>
                                                </div>
                                                <button type="submit" name="submit" <?php if(!$logged) echo 'disabled'?> class="btn btn-primary">
                                                    Opublikuj
                                                </button>
                                                <?php
                                                    if(!$logged){
                                                        echo '<br><span class="error">Zaloguj sie aby dodac temat</span> ';
                                                    }
                                                ?>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>



        <?php include 'footer.php'?>

    </body>
</html>

