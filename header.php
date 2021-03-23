<?php
    session_start();
?>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
    <div class="container">
        <div class="d-flex justify-content-between py-3">
            <div class="header__left">
                <a href="index.php">Народная торговая компания</a>
            </div>
            <div class="header__right">
                <?php
                    if($user->getLogin()){
                        echo '
                        <a href="?logout">Выход</a>';
                    }else{
                        echo '
                        <a href="login.php">Вход</a>
                        <a href="registration.php">Регистрация</a>';
                    }
                ?>
            </div>
        </div>