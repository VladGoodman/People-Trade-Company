<?php
    require 'modules/user_module.php';
    require 'modules/order_module.php';

    if(isset($_POST['name_tech']) and isset($_POST['description']) and isset($_POST['client_login']) and isset($_POST['date_completion'])){
        if(Order::addOrder($_POST['name_tech'], $_POST['description'], $_POST['client_login'], $_POST['date_completion'])){
            $form_error = null;
            header('Location: index.php');
        }else{
            $form_error = '<p class="p-3 mb-2 bg-warning text-dark">Одно и полей не заполнено</p>';
        }
      }
    require 'header.php';
?>
<div class="container">
    <?php
        if($user->getLogin()){
            $user->getRole()==1?
                require 'profile_worker/profile_worker.php':
                require 'profile_client/profile_client.php';
        }else{
            echo '
                <p>
                    <a href="login.php">Авторизируйтесь чтобы продолжить</a>
                </p>';
        }
    ?>
</div>

