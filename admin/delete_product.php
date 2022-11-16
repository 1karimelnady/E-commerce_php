<?php

  if(isset($_GET['delete_products'])){
    $delete_product=$_GET['delete_products'];
    $qdelete="DELETE  FROM products WHERE product_id=$delete_product ";
    $result=$conn->query($qdelete);
    if($result){
        echo"<script>alert('Product deleted successfully')</script>";
        echo"<script>window.open('./indexs.php','_self')</script>";
    }

  }