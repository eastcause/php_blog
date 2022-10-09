<?php
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand me-2" href="index.php">
            <h1>BLOGIY</h1>
        </a>

        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>

            <div class="d-flex align-items-center">
                <?php if(!$logged){ ?>
                    <a href="login.php">
                        <button type="button" class="btn btn-primary me-3">Zaloguj</button>
                    </a>
                <?php }else{ ?>
                    <a href="logout.php">
                        <span class="demo-icon icon-user">Wyloguj</span>
                    </a>
                <?php } ?>


            </div>
        </div>
    </div>
</nav>
