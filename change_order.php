<?php 
    require 'modules/user_module.php';
    require 'modules/order_module.php';

    $order = Order::getOrder($_GET['id']);

    if(isset($_POST['status'])){
        Order::updateStatusOrder($_GET['id'], $_POST['status']);
        header('Refresh: 0');
    }
    
    if(isset($_POST['date'])){
        Order::updateDateCompletionOrder($_GET['id'], $_POST['date']);
        header('Refresh: 0');
    }

    if(isset($_POST['delete_order'])){
        Order::delOrder($_POST['delete_order']);
        header('Location: index.php');
    }

    require 'header.php';

    if($user->getRole() == 1){
        echo '<h3>ID заказа: '.$order['id'].'</h3>';
        echo '<h3>Оператор оформивший заказ: '.$order['user_operator'].'</h3>';
        echo '<h3>Логин клиента: '.$order['user_client'].'</h3>';
        echo '<h3>Название техники: '.$order['name_technique'].'</h3>';
        echo '<h3>Описание поломки: '.$order['breakdown_description'].'</h3>';
        echo '<h3>Дата оформления: '.$order['date_issue'].'</h3>';
        echo '<h3>Дата завершения ремонта: '.$order['date_completion'].'</h3>';
        echo '<h3>Статус: '.Order::nameStatusOrder($order['status']).'</h3>';
    }else{
        echo 'Вам недоступна эта страница';
    }
?>
<form method="post">
    <button class="btn btn-success" type="submit" name="change_status">Изменить статус</button>
    <button class="btn btn-success" type="submit" name="change_date">Изменить дату завершения</button>
    <button class="btn btn-success" type="submit" name="delete_order" value="<?= $order['id'] ?>">Удалить</button>
</form>

<?php
    if(isset($_POST['change_status'])){
        echo '<br>
        <form method="post">
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="0">На ремонте</option>
                <option value="1">Ремонт завершен</option>
            </select><br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>';
    }
    if(isset($_POST['change_date'])){
        echo '<br>
        <form method="post">
            <input type="date" name="date" value='.$order["date_completion"].'>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>';
    }
    
?>