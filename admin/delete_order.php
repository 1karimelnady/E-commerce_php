<?php
    if(isset($_GET['delete_orders'])){
        $delete_order=$_GET['delete_orders'];
        $qdelete="DELETE FROM `user_orders` WHERE order_id=$delete_order ";
        $result=$conn->query($qdelete);
        if($result){
            echo"<script>alert('order deleted successfully')</script>";
            echo"<script>window.open('./indexs.php?list_order.php','_self')</script>";
           

        }


    }

?>