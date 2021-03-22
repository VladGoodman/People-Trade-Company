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
            <label >Login
                <input type="text" name="login" value="admin" >
            </label><br>
            <label >Password 
                <input type="text" name="password" value="admin" >
            </label><br>
            <button type="submit">Войти</button>
            <p>'.$login_info.'</p>
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