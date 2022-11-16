<?php
      if(isset($_GET['edit_brands'])){
        $edit=$_GET['edit_brands'];
        $qselect="SELECT * FROM brands WHERE brand_id=$edit";
        $result=$conn->query($qselect);
        $data=mysqli_fetch_assoc($result);
        $brand_title=$data['brand_title'];
        

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
          <h2 class="text-center">Edit Brand</h2>
            <form action="" method="POST">
              <div class="form-outline mb-4 w-50 m-auto">
              <label for="Brand Title" class="labels">category Title</label>
                <input type="text" value="<?=$brand_title?>" name="brand_title"  autocomplete="off" required="required" id="Brand_title" class="form-control mt-2" >
              </div>
    </div>
    <div class="form-outline m-auto w-50 mb-4">
                <input type="submit" name="update_brand" value="Update Brand" class="btn btn-primary mb-3 px-3">
              </div>
            </form>

    
</body>
</html>
<?php
     if(isset($_POST['update_brand'])){
        $title_brand=$_POST['brand_title'];
        $qupdate="UPDATE brands SET brand_title='$title_brand' where brand_id=$edit";
        $result=$conn->query($qupdate);
        if($result){
            echo"<script>alert('Brand updated successfully')</script>";
            echo"<script>window.open('./indexs.php?view_brand.php','_self')</script>";

        }

     }