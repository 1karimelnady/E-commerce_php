<?php
    if(isset($_GET['delete_categories'])){
        $delete_category=$_GET['delete_categories'];
        $qdelete="DELETE FROM categories WHERE category_id=$delete_category";
        $result=$conn->query($qdelete);
        if($result){
            echo"<script>alert('Category deleted successfully')</script>";
            echo"<script>window.open('./indexs.php?view_category.php','_self')</script>";

        }


    }

?>




