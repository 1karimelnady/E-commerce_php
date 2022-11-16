
<?php

  if(isset($_GET['edit_account'])){
    $user_session=$_SESSION['username'];
    $qselect="SELECT * FROM users WHERE username='$user_session'";
    $result=$conn->query($qselect);
    $fetch_data=mysqli_fetch_assoc($result);
    $user_id=$fetch_data['user_id'];
    $user_name=$fetch_data['username'];
    $user_email=$fetch_data['user_email'];
    $user_address=$fetch_data['user_address'];
    $user_mobile=$fetch_data['user_mobile'];
  }
  if(isset($_POST['update'])){

    $update_id=$user_id;
    $user_name=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_image=$_FILES['user_image']['name'];
    $user_tmp_img=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($tmp_image1,"./user_images/$user_image");
    $q_update="UPDATE users SET username='$user_name',user_email='$user_email',user_image='$user_image',
                      user_address='$user_address',user_mobile='$user_mobile' WHERE user_id='$update_id'";
    $update_user=$conn->query($q_update);
    if($update_user){
        echo"<script>alert('Data updated successfully')</script>";
        echo"<script>window.open('logout.php','_self')</script>";
    }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <title>Account</title>
</head>
<body>

    <div class="edit">
   <h2 class="text-success  mb-4">Editing Account</h2>
   <form action="" method="post" enctype="multipart/form-data" class="form-outline ">
    <div class="form-outline mb-4">
    <input type="text" class="form-control m-auto" value="<?=$user_name?>" name="username">
    </div>
    <div class="form-outline mb-4">
    <input type="email" class=" editing form-control  m-auto" value="<?=$user_email?>" name="user_email">
    </div>
    <div class="form-outline mb-4 d-flex m-auto">
    <input type="file" class=" rediting form-control   m-auto" name="user_image">
    <img src="./user_images/<?=$fetch_data['user_image']?>" alt="" class="edit_img">
    </div>
    <div class="form-outline mb-4">
    <input type="text" class=" editing form-control   m-auto" value="<?=$user_address?>" name="user_address" >
    </div>
    <div class="form-outline mb-4">
    <input type="text" class=" editing form-control   m-auto" value="<?=$user_mobile?>" name="user_mobile">
    </div>
    <input type="submit" class="btn btn-primary" name="update" value="update">
   </form>
   </div>
</body>
</html>