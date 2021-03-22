<?php
    session_start();
    require_once('bd.php');
    class User{
        private $login;
        private $role;
        
        function __construct()
        {
            $this->login =  $_SESSION['login']?$_SESSION['login']:'';
            $this->role =  $_SESSION['role']?$_SESSION['role']:'';
        }

        private function checkExistingLogin($login){
            global $mysql;
            $query = "SELECT role FROM `user` WHERE login='$login'";
            $result = mysqli_query($mysql, $query);
            if($result){
                if(mysqli_fetch_row($result)){
                    return 'Пользователь с таким login уже существует';
                }else{
                    return true;
                }
            }
            
        }

        public function getRole(){
            return (int) $this->role;
        }
        
        public function getLogin(){
            return $this->login;
        }

        public function auth($login, $password){
            global $mysql;
            $query = "SELECT login, role FROM `user` WHERE login='$login' AND password='$password'";
            $result = mysqli_query($mysql, $query);

            if ($result != 0){
                if($row = mysqli_fetch_assoc($result)){
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['login'] = $row['login'];
                    return true;
                }else{
                    return 'Неправильный логин или пароль';
                }
            }else{
                return false;
            }
        }

        public function registration($login, $password){
            global $mysql;
            if($this->checkExistingLogin($login) !== true){
                return $this->checkExistingLogin($login);
            }else{
                $query = "INSERT INTO `user`(`login`, `password`) VALUES ('$login', '$password')";
                $result = mysqli_query($mysql, $query);
                if($result == 'TRUE'){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function logout(){
            session_destroy();
            header('refresh:0; url=login.php');
        }
    }
    $user = new User;

    if(isset($_GET['logout'])){
        $user->logout();
    }
?>