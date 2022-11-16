<?php
     if(isset($_GET['delete_brands'])){
        $delete_brand=$_GET['delete_brands'];
        $qdelete="DELETE FROM brands WHERE brand_id=$delete_brand";
        $result=$conn->query($qdelete);
        if($result){
            echo"<script>alert('Brand deleted successfully')</script>";
            echo"<script>window.open('./indexs.php?view_brand.php','_self')</script>";

        }

     }




