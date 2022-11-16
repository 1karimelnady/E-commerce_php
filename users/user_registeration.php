
<?php
    include ('../include/connection.php');
    include ('../functions/common_functions.php');
    session_start();
?>
<?php

if (isset($_POST['register'])) {
    $username=$_POST['user_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $encpass=password_hash($password, PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $user_ip=getIPAddress();
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $qselect="SELECT * FROM users WHERE username='$username' or user_email='$email' ";
    $results=$conn->query($qselect);
    $number=mysqli_num_rows($results);
    if($number>0){
        echo"<script>alert('user name and email already exist')</script>";
    }elseif ($password!=$confirm_password) {
        echo"<script>alert('password don`t match')</script>";
        echo"<script>window.open('user_registeration.php','_self')</script>";
    } else {
         move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $qinsert="INSERT INTO users( username, user_email,user_password, user_image, user_mobile,  user_ip, user_address) 
                  VALUES ('$username',' $email',' $encpass','$user_image','$contact',' $user_ip',' $address')";

        $result=$conn->query($qinsert);
        if ($result) {
            echo"<script>alert('Registered successfully')</script>";
        }
        $qselect="SELECT * FROM cart where ip_address='$user_ip'";
        $result=$conn->query($qselect);
        $number=mysqli_num_rows($result);
        if ($number>0) {
            $_SESSION['username']=$username;
            echo"<script>alert('you have item in cart')</script>";
            echo"<script>window.open('checkout.php','_self')</script>";
        } else {
            echo"<script>window.open('../index.php','_self')</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <title>Registeration</title>
</head>
<body>
    <div class="container fluid my-3 ">
    <h2 class="text-center">New User Registeration </h2>
        <div class="row justify-content-center align-item-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label class="form-label" id="user_name">username</label>
                        <input type="text" class="form-control" name="user_name" id="user_name"
                         placeholder="Enter your user name" required="required" autocomplete="off">
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" id="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" 
                        placeholder="Enter your email" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" id="user_image">user image</label>
                        <input type="file" class="form-control" name="user_image" id="user_image" required="required">
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
                    <div class="form-outline mb-4">
                        <label class="form-label" id="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" 
                        placeholder="Enter your address" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" id="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" id="contact" 
                        placeholder="Enter your mobile number" autocomplete="off" required="required">
                    </div>
                    <div class="mt-4 pt-2">
                         <input type="submit" class="btn btn-primary px-3 py-2" name="register" value="Register">
                         <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href='user_login.php' 
                         class="text-decoration-none text-danger">login</a>
                        </p>
                         
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</body>
</html>