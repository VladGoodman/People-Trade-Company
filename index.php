<?php
    require 'modules/user_module.php'; 
    require 'header.php';
?>
<div class="container">
    <?php
        if($user->getLogin()){
            $user->getRole()==1?
                require 'profile_worker.php':
                require 'profile_client.php';
        }else{
            echo '
                    <p>
                        <a href="login.php">Авторизируйтесь чтобы продолжить</a>
                    </p>';
        }
    ?>
</div>


// TODO: ДОБАВЛЕНИЕ В БД ОРДЕРОВ СДЕЛАЛ