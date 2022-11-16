<?php
     include ('../include/connection.php');
     include ('../functions/common_functions.php');
     session_start();

?>
<?php
if (isset($_POST['login'])) {
    $user_name=$_POST['user_name'];
    $user_password= password_hash($_POST['user_password'],PASSWORD_DEFAULT);
    $qselect="SELECT * FROM users where username='$user_name' or user_password='$user_password'";
    $result=$conn->query($qselect);
    $data=mysqli_fetch_assoc($result);
    $number=mysqli_num_rows($result);
    $ip_address=getIPAddress();
    $cart_select="SELECT * FROM cart where ip_address='$ip_address'";
    $cart_result=$conn->query($cart_select);
    $cart_number=mysqli_num_rows($cart_result);
if ($number>0){
    $_SESSION['username']=$user_name;
    if ($number==1 and $cart_number==0) {
        $_SESSION['username']=$user_name;
        echo "<script>alert('login successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    } else {
        $_SESSION['username']=$user_name;
        echo "<script>alert(' login successfully')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
    }
    } else {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/user.css">     
    <title>Registeration</title>
</head>
<body>
    <div class="container fluid my-4 ">
    <h2 class="text-center"> User login </h2>
        <div class="row justify-content-center align-item-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label class="form-label" id="user_name">username</label>
                        <input type="text" class="form-control" name="user_name" id="user_name"
                         placeholder="Enter your user name" require="required" autocomplete="off">
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" id="password">password</label>
                        <input type="password" class="form-control" name="user_password" id="password" 
                        placeholder="Enter your password" autocomplete="off" require="required">
                    </div>
                    <div class="">
                       <a href="#">Forgot password</a>
                    </div>

                    <div class="mt-4 pt-2">
                         <input type="submit" class="btn btn-primary px-3 py-2" name="login" value="Login">
                         <p class="small fw-bold mt-2 pt-1 mb-0">
                            Don't have an account ? 
                            <a href='user_registeration.php' class="text-decoration-none text-danger">Register</a>
                        </p>
                         
                    </div>

                
                </form>
            </div>
        </div>
    </div>
</body>
</html>