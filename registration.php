<?php
require 'modules/user_module.php'; 
setlocale(LC_ALL, "ru_RU.UTF-8");



function checkPasswordForCorrectness($password, $repeat_password){
    if(strlen($password) < 6 or strlen($password) > 20){
        return 'Пароль должен содержать больше 6 и менее 20 символов';
    }elseif($password !== $repeat_password){
        return 'Пароли не совпадают';
    }else{
        return true;
    }
}

function checkInfoInputs($login, $password, $repeat_password){
    if($login==false or $password==false or $repeat_password==false){
        return 'Одно из полей не заполнено';
    }elseif(checkPasswordForCorrectness($password, $repeat_password) !== true){
        return checkPasswordForCorrectness($password, $repeat_password);
    }else{
        return true;
    }
}

if(!empty($_POST)){
    if(checkInfoInputs($_POST['login'], $_POST['password'], $_POST['repeat_password']) === true){
        if($user->registration($_POST['login'], $_POST['password']) === true){
            $form_info = 'Регистрация пройдена успешно. Переадресация на логин...';
            header('refresh:2; url=login.php');
        }else{
            $form_info = $user->registration($_POST['login'], $_POST['password']);
        }
    }
    else{
        $form_info = checkInfoInputs($_POST['login'], $_POST['password'], $_POST['repeat_password']);
    }
}

require 'header.php';

if(!$user->getLogin()){
    echo '
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Login</label>
                <input class="form-control" type="text" name="login">
            </div>
            <div class="mb-3">
                <label class="form-label">Password </label>
                <input class="form-control" type="password" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Repeat password </label>
                <input class="form-control" type="password" name="repeat_password">
            </div>
            <button class="btn btn-primary" type="submit">Зарегистрироваться</button>';
            echo $form_info.'
        </form>'; 
}else{
    echo '<h1>Вы уже авторизированы (<a href="index.php"> На главную</a> )</h1>';
}
?>