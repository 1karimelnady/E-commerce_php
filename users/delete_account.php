<?php
  if(isset($_POST['delete'])){
    $user_session=$_SESSION['username'];
    $qdelete="DELETE FROM users WHERE username='$user_session'";
    $result=$conn->query($qdelete);
    if($result){
        session_destroy();
        echo"<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }

  }
  if(isset($_POST['don\'t_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <title>Deleteing Account</title>
</head>
<body>
    <div class="delete">
      <h3 class="text-danger mb-4">Deleting Account</h3>
      <form action="" method="post">
        <div class="form-outline w-50 mb-4 m-auto">
            <input type="submit" value="Deleting Account" name="delete" class="form-control  w-50 m-auto">
        </div>
        <div class="form-outline w-50 m-auto">
            <input type="submit" value="Don't Deleting Account" name="don't_delete" class="form-control  w-50 m-auto">
        </div>
      </form>
      </div>
</body>
</html>