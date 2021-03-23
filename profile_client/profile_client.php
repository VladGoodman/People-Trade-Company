<h3>Ваши заказы на ремонт техники: </h3>
<table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>Название техники</th>
          <th>Описание поломки</th>
          <th>Дата завершения ремонта</th>
          <th>Статус</th>
        </tr>
      </thead>
      <tbody>
  <?php
    foreach(Order::getOrdersByUser($user->getLogin()) as $order){
      echo '
        <tr>
          <td>'.$order['name_technique'].'</td>
          <td>'.$order['breakdown_description'].'</td>
          <td>'.date('Y-m-d', strtotime($order['date_completion'])).'</td>
          <td>'.Order::nameStatusOrder($order['status']).'</td>
        </tr>
      ';
    }
    ?>
    </tbody>
</table>