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

        

        public function getRole(){
            return (int) $this->role;
        }
        
        public function getLogin(){
            return $this->login;
        }



        public function auth($login, $password){
            global $mysql;
            $query = "SELECT role, login FROM `user` WHERE login='$login' AND password='$password'";
            $result = mysqli_query($mysql, $query);
            if($row = mysqli_fetch_assoc($result)){
                $_SESSION['role'] = $row['role'];
                $_SESSION['login'] = $row['login'];
                return true;
            }else{
                return 'Неправильный логин или пароль';
            }
        }

        public function getUserOrders($email){
            global $mysql;
            $query = "SELECT * FROM `orders` WHERE user='$email'";
            $result = mysqli_query($mysql, $query);
            if($result){
                $result_array = [];
                while($row = mysqli_fetch_assoc($result)){
                    $result_array[] = $row;
                }
                return $result_array;
            }else{
                return false;
            }
            
        }


        public function registration($fio, $email, $password){
            global $mysql;
            if($this->checkExistingEmail($email) !== true){
                return $this->checkExistingEmail($email);
            }else{
                $query = "INSERT INTO `user`(`fio`, `password`, `email`) VALUES ('$fio', '$password', '$email')";
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