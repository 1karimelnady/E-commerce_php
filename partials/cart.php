<?php
  include './include/connection.php';
  include './functions/common_functions.php';
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
<link rel="stylesheet" href="./css/user.css">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce cart-deatils</title>
</head>
<body>

     <div class="container-fluid p-0 ">
          <nav class="navbar navbar-expand-lg navbar-light bg-info">
     <div class="container-fluid">
        <img src="" alt="">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="display_all.php">products</a>
              </li>
              <?php
                 if(isset($_SESSION['username'])){ ?>
                             <li class="nav-item">
                <a class="nav-link" href="./users/profile.php">My Account</a>
              </li>
               <?php } else { ?>
                       <li class="nav-item">
                       <a class="nav-link" href="./users/user_registeration.php">Register</a>
                     </li>
            <?php }
              ?>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?= cart_item();?></sup></i></a>
</li>
         </div>
         </div>
     </ul>
</nav>
    <?php
    cart();
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
      <?php
          if(!isset($_SESSION['username'])){?>
            <li class="nav-item">
            <a class="nav-link" href="#">Welcome Guest</a>
           </li>
      <?php } else { ?>
           <li class="nav-item">
           <a class="nav-link" href="#">Welcome <?= $_SESSION['username']?></a>
          </li>
  <?php    } ?>
      <?php
          if(!isset($_SESSION['username'])){ ?>
            <li class="nav-item">
            <a class="nav-link" href="./users/user_login.php">Login</a>
           </li>
       <?php   } else { ?>
            <li class="nav-item">
            <a class="nav-link" href="./users/logout.php">Logout</a>
            </li>
     <?php  } ?>
     
    </ul>
    </nav>  

    <div class="bg-light ">
     <h1 class="text-center">Hidden store</h1>
     <p class="text-center">Communications is at the heart of e-commerce and community</p>
    </div>
       <div class="container car">
        <div class="row">
        <form action="" method="POST">
                 <?php
                   $totalprice=0;
                   $get_ip_address=getIPAddress();
                   $cartselect="SELECT * FROM cart where ip_address='$get_ip_address'";
                   $result=$conn->query($cartselect);
                   $number=mysqli_num_rows($result);
if ($number>0) { ?>
  <table class="table table-bordered text-center">
  <thead>
      <tr>
          <th>Product Title</th>
          <th>Product Image</th>
          <th>Quantity</th>
          <th>Total price</th>
          <th>Remove</th>
          <th>Operations</th>
      </tr>
  </thead>
  <tbody >
    <?php
    foreach ($result as $r) {
        $product_id=$r['product_id'];
        $select_product="SELECT * FROM products where product_id='$product_id'";
        $result_product=$conn->query($select_product);
        foreach ($result_product as $s) {?>
                     <?php
              $product_price=array($s['price']);
            $price_value=array_sum($product_price);
            $totalprice+=$price_value;

            ?>
                    <tr>
                        <td><?=$s['product_title']?></td>
                        <td><img class="cart_img"  src="./admin/product_images/<?=$s['product_image1'] ?> " alt=""></td>
                        <td><input type="text" name="quantity" id="" class="form-input w-50"></td>
                        <?php

                      $get_ip_address=getIPAddress();
            if (isset($_POST['update_cart'])) {
                $cart=$_POST['quantity'];
                $qupdate=" UPDATE `cart` SET `quantity`='$cart' WHERE `ip_address`='$get_ip_address' ";
                $result_update_quantity=$conn->query($qupdate);
                $totalprice=$totalprice*(int)$cart;
            }

            ?>
                        
                           <td><?=$s['price']?></td>
                        <td><input type="checkbox" name="deleteitem[]" value="<?=$s['product_id']?>" id="delete"></td>
                        <td>
                         <input type="submit" name="update_cart" value="update_cart" class="btn btn-primary mb-2 p-3 py-2 ">   
                         <input type="submit" name="delete_cart" value="delete_cart" class="btn btn-danger p-3 py-2 ">  
                        
                        </td>
                    </tr>
                </tbody>
         <?php   }
    }
}else{
  echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
} ?>
            </table>
             <div class="d-flex mb-5">
              <?php
             $get_ip_address=getIPAddress();
             $cartselect="SELECT * FROM cart where ip_address='$get_ip_address'";
             $result=$conn->query($cartselect);
             $number=mysqli_num_rows($result);
      if ($number>0) { ?>
            <h4 class=" px-3 ">Subtotal : <strong class="text-info"><?=$totalprice .' EGP'?></strong></h4>   
                <input type="submit" value="Continue shopping" name="continue_shopping" class="btn btn-primary px-3 py-2  mx-2" >
                <button class="bg-secondary py-2 p-3 border-0"><a href="./users/checkout.php" class="text-light text-decoration-none">checkout</a></button>
        <?php } else{?> 
            <input type="submit" value="Continue shopping" name="continue_shopping" class="btn btn-primary px-3 py-2  mx-2" >
  <?php } ?>
            <?php
              if(isset($_POST['continue_shopping'])){
                echo "<script>window.open('index.php','_self')</script>";
              }
            ?>
            </div>
        </div>
       </div>
       </form>
       <?php
       delete_cart_item();
?>

<?php include('./partials/footer.php'); ?>
     </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>