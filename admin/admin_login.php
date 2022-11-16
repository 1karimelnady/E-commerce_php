<?php
include ('../include/connection.php');
session_start();

if(isset($_POST['login'])){
    $user_name=$_POST['username'];
    $admin_password=$_POST['password'];
    $qselect="SELECT * FROM admin where admin_name='$user_name'";
    $result=$conn->query($qselect);
    $number=mysqli_num_rows($result);
    $_SESSION['admin']=$user_name;
    if ($number>0) {
        $session['admin']=$user_name;
            echo "<script>alert(' login successfully')</script>";
            echo"<script>window.open('./indexs.php','_self')</script>";

           }else{
            echo "<script>alert('Invaild username or password')</script>";
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
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
</head>
<body>
    <div class="container fluid m-3 ">
    <h2 class="text-center mb-3">Admin Login </h2>
        <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <img src="./product_images/mobile-login-concept-illustration_114360-83.jpg" alt="Admin Registeration" class="img-fluid">

</div>
            <div class="col-lg-6 col-xl-4 login">
            <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label class="form-label" id="email">Email</label>
                        <input type="text" class="form-control" name="username" id="username" 
                        placeholder="Enter your username" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" id="password">password</label>
                        <input type="password" class="form-control" name="password" id="password" 
                        placeholder="Enter your password" autocomplete="off" required="required">
                    </div>
                    <div class="mt-4 pt-2">
                         <input type="submit" class="btn btn-primary px-3 py-2" name="login" value="Login">
                         <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ? <a href='admin_registeration.php' 
                         class="link-danger text-decoration-none">Rgister</a>
                        </p>
                         
                    </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>