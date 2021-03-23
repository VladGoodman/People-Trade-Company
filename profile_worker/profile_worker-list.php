<p class="fs-3 fw-bolder">Список ремонта по гарантии:</p>
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
      <tbody>
  <?php
    foreach(Order::getAllOrders() as $order){
      echo '
        <tr>
          <td>'.$order['user_client'].'</td>
          <td>'.$order['name_technique'].'</td>
          <td>'.$order['breakdown_description'].'</td>
          <td>'.date('Y-m-d', strtotime($order['date_issue'])).'</td>
          <td>'.date('Y-m-d', strtotime($order['date_completion'])).'</td>
          <td>'.$order['user_operator'].'</td>
          <td>'.Order::nameStatusOrder($order['status']).'</td>
          <td><a href="change_order.php?id='.$order['id'].'">Страница заказа</a></td>
        </tr>
      ';
    }
    ?>
    </tbody>
</table>
<hr>