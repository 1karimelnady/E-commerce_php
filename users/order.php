<?php
   include('../functions/common_functions.php');
   include('../include/connection.php');

?>
<?php

   if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

   }
   $totalprice=0;
   $get_ip_address=getIPAddress();
   $invoice_number=mt_rand();
   $order_status='pending';
   $cart_select="SELECT * FROM cart WHERE ip_address='$get_ip_address'";
   $result=$conn->query($cart_select);
   $cart_count=mysqli_num_rows($result);
   foreach($result as $r){
    $product_id=$r['product_id'];
    $product_select="SELECT * FROM products WHERE product_id=$product_id";
    $product_result=$conn->query($product_select);
    foreach($product_result as $p){
          $price=array($p['price']);
          $price_value=array_sum($price);
          $totalprice+=$price_value;
    }

   }
   $quantity_select="SELECT * FROM cart";
   $quantity_result=$conn->query($quantity_select);
   $quantity_run=mysqli_fetch_array($quantity_result);
   $quantity=$quantity_run['quantity'];
   if($quantity==0){
     $quantity=1;
     $subtotal=$totalprice;
   }else {
   $quantity=$quantity;
   $totalprice=$totalprice*$quantity;
   }

   $order_insert="INSERT INTO user_orders(user_id, quantity_due, invoice_number, total_products, order_status, order_date) 
   VALUES ('$user_id','$subtotal','$invoice_number','$cart_count','$order_status',NOW())";
       $order_result=$conn->query($order_insert);
       if($order_result){
        echo"<script>alert('Order submitted successfully')</script>";
        echo"<script>window.open('profile.php','_self')</script>";
       }
       $order_pending="INSERT INTO order_pending(user_id, quantity, invoice_number, product_id, order_status) 
       VALUES ('$user_id','$quantity','$invoice_number','$product_id','$order_status')";
       $result_pending=$conn->query($order_pending);
       
       $qdelete="DELETE FROM cart WHERE ip_address='$get_ip_address'";
       $result_delete=$conn->query($qdelete);

