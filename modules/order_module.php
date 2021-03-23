<?php
    session_start();
    require_once('bd.php');
    require_once('user_module.php');

    class Order{
        public static function getAllOrders(){
            global $mysql;
            $query = "SELECT * FROM `orders`";
            $result = mysqli_query($mysql, $query);
            $result_array = [];
            while($row = mysqli_fetch_assoc($result)){
                $result_array[] = $row;
            }
            return $result_array;
        }

        public static function getOrder($id){
            global $mysql;
            $query = "SELECT * FROM `orders` WHERE id=$id";
            $result = mysqli_query($mysql, $query);
            if($result){
                if($order = mysqli_fetch_assoc($result)){
                    return $order;
                }
            }
        }
        
        public static function getOrdersByUser($username){
            global $mysql;
            $query = "SELECT * FROM `orders` WHERE user_client='$username'";
            $result = mysqli_query($mysql, $query);
            $result_array = [];
            while($row = mysqli_fetch_assoc($result)){
                $result_array[] = $row;
            }
            return $result_array;
        }

        public static function addOrder($name_tech, $description, $client_login, $date_completion){
            global $mysql;
            global $user;
            $user_operator = $user->getLogin();
            $date_completion = date('Y-m-d H:i:s',strtotime($date_completion));
            $query = "INSERT INTO `orders`(`user_operator`, `name_technique`, `breakdown_description`, `user_client`, `date_completion`) VALUES ('$user_operator', '$name_tech', '$description', '$client_login', '$date_completion')";
            $result = mysqli_query($mysql, $query);
            if($result == 'TRUE'){
                return true;
            }else{
                return false;
            }
        }

        public static function updateStatusOrder($id, $status){
            global $mysql;
            $query = "UPDATE `orders` SET `status`='$status' WHERE id=$id";
            $result = mysqli_query($mysql, $query);
            if($result == 'TRUE'){
                return true;
            }else{
                return false;
            }
        }

        public static function updateDateCompletionOrder($id, $date){
            global $mysql;
            $date = date('Y-m-d H:i:s',strtotime($date));
            $query = "UPDATE `orders` SET `date_completion`='$date' WHERE id=$id";
            $result = mysqli_query($mysql, $query);
            if($result == 'TRUE'){
                return true;
            }else{
                return false;
            }
        }

        public static function delOrder($id){
            global $mysql;
            $query = "DELETE FROM `orders` WHERE id=$id";
            $result = mysqli_query($mysql, $query);
            if($result == 'TRUE'){
                return true;
            }else{
                return false;
            }
        }

        public static function nameStatusOrder($id){
            switch($id){
                case 0:
                    return 'На ремонте';
                    break;
                case 1:
                    return 'Ремонт завершен';
                    break;
            }
        }
    }

?>