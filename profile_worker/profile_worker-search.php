<hr>
<form method="post">
    <p class="fs-3 fw-bolder">Поиск заказов пользователя: </p>
    <input type="text" name="search_user">
    <button type="submit">Найти</button>
</form>

<?php
    if(isset($_POST['search_user'])){
        if(Order::getOrdersByUser($_POST['search_user'])){
        echo '
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>User client</th>
                    <th>Name technique</th>
                    <th>Breakdown description</th>
                    <th>Date issue</th>
                    <th>Date completion</th>
                    <th>Operator</th>
                    <th>Status</th>
                  </tr>
                </thead>
            <tbody>';
            foreach(Order::getOrdersByUser($_POST['search_user']) as $order){
                echo '
                <tr>
                  <td>'.$order['user_client'].'</td>
                  <td>'.$order['name_technique'].'</td>
                  <td>'.$order['breakdown_description'].'</td>
                  <td>'.date('Y-m-d', strtotime($order['date_issue'])).'</td>
                  <td>'.date('Y-m-d', strtotime($order['date_completion'])).'</td>
                  <td>'.$order['user_operator'].'</td>
                  <td>'.$order['status'].'</td>
                  <td><a href="change_order.php?id='.$order['id'].'">Страница заказа</a></td>
                </tr>
              ';
            }
            echo '
            </tbody>
        </table>';
        }else{
            echo 'Не найдено';
        }
    }
?>
<hr>
