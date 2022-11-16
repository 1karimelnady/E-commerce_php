<?php
  include ('../include/connection.php');
  include('../functions/common_functions.php');

  if(isset($_POST['register'])){
    $username=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $encpass=md5($password);
    $confirm_password=$_POST['confirm_password'];
    $qselect="SELECT * FROM admin WHERE admin_name='$username' ";
    $result=$conn->query($qselect);
    $number=mysqli_num_rows($result);
    if($number>0){
        echo"<script>alert('user name and email already exist')</script>";
    }
    elseif($password!=$confirm_password){
        echo"<script>alert('password don`t match')</script>";
        echo"<script>window.open('admin_registeration.php','_self')</script>";
        
    }else{
        $qinsert="INSERT INTO admin (admin_name,admin_email,admin_password)VALUES('$username','$email','$encpass')";
        $results=$conn->query($qinsert);
        if($results){
            echo"<script>alert('Registered successfully')</script>";
            echo"<script>window.open('admin_login.php','_self')</script>";

        }

    }


  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registeration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <style>
        .register {
            margin-left: 200px;
            margin-top: 20px;

        }
        .image {
            margin-top: 100px;
            margin-left: 20px;
        }
    </style>  
</head>
<body>
    <div class="container fluid m-3">
    <h2 class="text-center mb-3">Admin Registeration </h2>
        <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="./product_images/draw1.webp" alt="Admin Registeration" class="img-fluid image">

</div>
            <div class="col-lg-6 col-xl-4 register">
            <form action="" method="post">
            <div class="form-outline mb-4 ">
                        <label class="form-label" id="user_name">Username</label>
                        <input type="text" class="form-control" name="user_name" id="user_name"
                         placeholder="Enter your user name" required="required" autocomplete="off">
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" id="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" 
                        placeholder="Enter your email" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" id="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" 
                        placeholder="Enter your password" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" id="password">confirm password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" 
                        placeholder=" confirm password " autocomplete="off" required="required">
                    </div>
                    <div class="mt-4 pt-2">
                         <input type="submit" class="btn btn-primary px-3 py-2" name="register" value="Register">
                         <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href='admin_login.php' 
                         class="link-danger text-decoration-none">login</a>
                        </p>
                         
                    </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>