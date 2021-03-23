<?php
require 'modules/user_module.php'; 
if(!empty($_POST)){
    if(!empty($_POST['login']) and !empty($_POST['password'])){
        $login_info = $user->auth($_POST['login'], $_POST['password']) === true?
        header('refresh:0; url=index.php'): 
        $user->auth($_POST['login'], $_POST['password']);
    }else{
        $login_info = 'Одно из полей пустое';
    }
}

require 'header.php';

if(empty($user->getLogin())){
    echo '
    <div class="container">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Login</label>
                <input class="form-control" type="text" name="login">
            </div>
            <div class="mb-3">
                <label class="form-label">Password </label>
                <input class="form-control" type="password" name="password">
            </div>
            <p class="my-3 bg-warning text-dark">'.$login_info.'</p>
            <button class="btn btn-primary" type="submit">Войти</button>
        </form> 
    </div>
        ';
}else{
    echo '
        <div class="container">
            <h3>Вы уже авторизированы (<a href="index.php"> На главную</a> )</h3>
        </div>';
}
?>