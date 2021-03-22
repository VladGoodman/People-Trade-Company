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

        public static function addOrder($name_tech, $description, $client_login, $date_completion){
            global $mysql;
            global $user;
            $user_operator = $user->getLogin();
            $date_completion = date('Y-m-d H:i:s',strtotime($date_completion));
            
            print_r( ['user_operator'=>$user_operator, 'name_technique'=> $name_tech, 'breakdown_description'=> $description, 'user_client'=>$client_login, 'date_completion'=>$date_completion]);

            $query = "INSERT INTO `orders`(`user_operator`, `name_technique`, `breakdown_description`, `user_client`, `date_completion`) VALUES ('$user_operator', '$name_tech', '$description', '$client_login', '$date_completion')";
            $result = mysqli_query($mysql, $query);
            if($result == 'TRUE'){
                return true;
            }else{
                return false;
            }
        } 
    }

?>