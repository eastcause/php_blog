<?php
    ob_start();
    session_start();
    require 'core/database.php';
    $db = Database::getInstance();
    $i = 1;
    $page = 1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    $stmt = $db->getConnection()->query('SELECT count(*) FROM posts');
    $total_results = $stmt->fetchColumn();
    $total_pages = ceil($total_results / 5);

    $start = ($page - 1) * 5;

    $query = "SELECT * FROM posts ORDER BY `last_updated` DESC LIMIT $start,5";

    $rows = $db->getConnection()->query($query)->fetchAll();

    include 'checklogin.php';

    require 'Utils.php';
    $updated = 0;
    if (isset($_POST['submit'])) {
        if(!$logged){
            return;
        }
        $title = Utils::htmlEscape($_POST['title']);
        $content = Utils::htmlEscape($_POST['content']);
        if (strlen($title) == 0) {
            $_POST['error_title'] = '<span class="error">Podaj tytuł! </span>';
        }
        if (strlen($content) == 0) {
            $_POST['error_content'] = '<span class="error">Podaj zawartość! </span>';
        }
        if (strlen($title) > 120) {
            $_POST['error_title'] = '<span class="error">Tytuł może zawierać maxymalnie 2000 znaków! </span>';
        }
        if (strlen($content > 2000)) {
            $_POST['error_content'] = '<span class="error">Zawartość może zawierać maxymalnie 2000 znaków! </span>';
        }

        $newid = 0;

        if ((empty($_POST['error_content'])) && (empty($_POST['error_title']))) {
            $check = $db->getConnection()->prepare("SELECT * FROM `posts` WHERE `title`='$title'");
            $check->execute();
            if ($check->rowCount() != 0) {
                $_POST['error_insert'] = '<span class="error">Jest już post z takim tytułem! </span>';
            } else {
                $insert = $db->getConnection()->prepare("INSERT INTO `posts`(`author`, `title`, `content`, `views`) VALUES (:author, :title, :content, :views)");
                $i = 0;
                $insert->bindParam(':author', $username);
                $insert->bindParam(':title', $title);
                $insert->bindParam(':content', $content);
                $insert->bindParam(':views', $i);
                $insert->execute();
                $newid = $db->getConnection()->lastInsertId('posts');
                $updated = 1;
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

    <?php include 'nav.php'?>


    <div class="container econtainer">
        <h1>Najnowsze wpisy:</h1>
        <hr>
        <?php if(count($rows) != 0){?>
            <?php foreach ($rows as $row) {?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="pb-3">
                            <a href="post.php?id=<?php echo $row[0]?>"><b><?php echo $row[2]?></b></a>
                            <br>
                            <span>Dodany przez: <b><?php echo $row[1]?></b>, dnia: <b><?php echo $row[6]?></b></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <b><?php echo $row[4]?></b> Wyświeleń
                        <br>
                        <b><?php

                                $q = $db->getConnection()->prepare("SELECT count(*) FROM `comments` WHERE `post_id`=:postid");
                                $q->bindParam(':postid', $row[0]);
                                $q->execute();
                                $n = $q->fetchColumn();
                                echo $n;
                            ?></b> Odpowiedzi
                    </div>
                </div>
                <hr>
            <?php }} ?>


        <nav aria-label="Page navigation">
            <?php if(count($rows) != 0){ ?>
                <ul class="pagination">

                    <?php if($page == 1){ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php }else{ ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php
                        $previouspage = ($page - 1);
                        if($previouspage != 0){
                            echo '<li class="page-item"><a class="page-link" href="index.php?page='.$previouspage.'">'.$previouspage.'</a></li>';
                        }
                    ?>

                    <li class="page-item disabled"><a class="page-link" href="#"><?php echo $page; ?></a></li>

                    <?php
                        $nextpage = ($page + 1);

                        if($nextpage <= $total_pages){
                            echo '<li class="page-item"><a class="page-link" href="index.php?page='.$nextpage.'">'.$nextpage.'</a></li>';
                        }
                    ?>
                    <?php if($page == $total_pages){ ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php }else{ ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?page=<?php echo $total_pages ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php }?>



                </ul>
            <?php }else{ ?>
                <p>Brak wpisów</p>
            <?php }?>
        </nav>
    </div>

    <section>
        <div class="container my-5 py-5 text-dark">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex flex-start w-100">
                                <div class="w-100">
                                    <h5>Dodaj temat</h5>
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tytuł:</label>
                                            <input type="text" name="title" class="form-control" <?php if(!$logged) echo 'disabled'?> id="title" minlength="10" maxlength="120">
                                            <?php
                                                if(!empty($_POST['error_title'])){
                                                    echo $_POST['error_title'];
                                                    unset($_POST['error_title']);
                                                }
                                            ?>
                                        </div>

                                        <div class="form-outline">
                                            <label for="title" class="content">Zawartość:</label>
                                            <textarea class="form-control" id="content" name="content" <?php if(!$logged) echo 'disabled'?> rows="4" minlength="30" maxlength="2000"></textarea>
                                            <label class="form-label" for="content">Limit znaków 2000.</label><br>
                                            <?php
                                                if(!empty($_POST['error_content'])){
                                                    echo $_POST['error_content'];
                                                    unset($_POST['error_content']);
                                                }
                                            ?>
                                        </div>
                                        <?php
                                            if(!empty($_POST['error_insert'])){
                                                echo $_POST['error_insert'];
                                                unset($_POST['error_insert']);
                                            }
                                            if ($updated == 1){
                                                $head =  'post.php?id=' . $newid;
                                                header('Location: ' . $head);
                                                exit();
                                            }
                                        ?>
                                        <br>
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

    <?php include 'footer.php'?>


</body>
</html>
