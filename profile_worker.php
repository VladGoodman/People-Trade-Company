<?php 
    print_r($_POST);
    print_r($_SESSION);
    require 'modules/order_module.php';

if(isset($_POST['name_tech'])){
  Order::addOrder($_POST['name_tech'], $_POST['description'], $_POST['client_login'], $_POST['date_completion']);
}

?>
<h3>Профиль работника</h3>

<p>Оформление заказа</p>

<form method="POST">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Название техники:</label>
    <input type="text" class="form-control" id="exampleInputName" name="name_tech">
  </div>
  <div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Описание поломки: </label>
    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputClientLogin" class="form-label">Login клиента:</label>
    <input type="text" class="form-control" id="exampleInputClientLogin" name="client_login">
  </div>
  <div class="mb-3">
    <label for="exampleInputDateCompletion" class="form-label">Дата завершения ремонта: </label>
    <input type="date" class="form-control" id="exampleInputDateCompletion" name="date_completion">
  </div>
  <button type="submit" class="btn btn-primary">Создать заказ</button>
</form>

    <p>Список ремонта по гарантии:</p>

