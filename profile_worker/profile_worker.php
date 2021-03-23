<?php
  

  if(isset($_POST['delete_order'])){
    if(Order::delOrder($_POST['delete_order'])){
        header('Refresh: 0');
    }
  }
  
?>
  <div class="p-3 my-3 border border-dark border-3">
    <? require 'profile_worker-add.php'; ?>
  </div>
  <div class="p-3 my-3 border border-dark border-3">
    <? require 'profile_worker-search.php'; ?>
  </div>
  <div class="p-3 my-3 border border-dark border-3">
    <? require 'profile_worker-list.php'; ?>
  </div>

      