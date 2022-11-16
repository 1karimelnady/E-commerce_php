<?php
    include ('../include/connection.php');
    include ('../functions/common_functions.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/user.css">
    <title>payment</title>
</head>
<body>
    <?php
       $user_ip=getIPAddress();
       $qselect="SELECT * FROM users ";
       $result=$conn->query($qselect);
       $data=mysqli_fetch_assoc($result);
       ?>
      
         <div class="container my-4">
  <h2 class="text-center text-info">payment options</h2>
  <div class="row d-flex justify-content-center align-items-center my-5">
      <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../users/user_images/gettyimages-1368269931-612x612.jpg" 
            class="payment_img"  alt=""></a>
      </div>
      <div class="col-md-6">
        <a href="order.php?user_id=<?=$data['user_id'] ?>"><h2 class="text-center">pay offline</h2></a>
      </div>
  </div>
</div>

       


</body>
</html>