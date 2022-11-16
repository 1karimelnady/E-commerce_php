
  <?php
      if(isset($_GET['edit_categories'])){
        $edit=$_GET['edit_categories'];
        $qselect="SELECT * FROM categories WHERE category_id=$edit";
        $result=$conn->query($qselect);
        $data=mysqli_fetch_assoc($result);
        $category_title=$data['category_title'];
        

      }

  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Edit</title>
</head>
<body>
       <div class="container mt-3">
          <h2 class="text-center">Edit Category</h2>
            <form action="" method="POST">
              <div class="form-outline mb-4 w-50 m-auto">
              <label for="Category Title" class="labels">category Title</label>
                <input type="text" value="<?=$category_title?>" name="category_title"  autocomplete="off" required="required" id="category_title" class="form-control mt-2" >
              </div>
    </div>
    <div class="form-outline m-auto w-50 mb-4">
                <input type="submit" name="update_category" value="Update category" class="btn btn-primary mb-3 px-3">
              </div>
            </form>

    
</body>
</html>
<?php
     if(isset($_POST['update_category'])){
        $title_category=$_POST['category_title'];
        $qupdate="UPDATE categories SET category_title='$title_category' where category_id=$edit";
        $result=$conn->query($qupdate);
        if($result){
            echo"<script>alert('Category updated successfully')</script>";
            echo"<script>window.open('./indexs.php?view_category.php','_self')</script>";

        }

     }