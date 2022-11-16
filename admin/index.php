<?php
      include('../include/connection.php');
      session_start();  
?>

    <?php
    if(!isset($_SESSION['admin'])){
     include('admin_registeration.php');

    }else{
              include('indexs.php');
} ?>

