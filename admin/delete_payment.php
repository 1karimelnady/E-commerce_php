<?php
if(isset($_GET['delete_payment'])){
    $payment_delete=$_GET['delete_payment'];
    $qdelete="DELETE FROM user_payment WHERE order_id=$payment_delete";
    $result=$conn->query($qdelete);
    if($result){
        echo"<script>alert('payment deleted successfully')</script>";
        echo"<script>window.open('./indexs.php?list_payments.php','_self')</script>";
       

    }


}