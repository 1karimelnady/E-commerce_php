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
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div class="container-fluid p-0 ">
          <nav class="navbar navbar-expand-lg navbar-light bg-info">
     <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="display_all.php">products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./users/user_registeration.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?= cart_item();?></sup></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Totalprice :100/</a>
              </li>
            </ul>
            <form action="" method="get" class="d-flex">
              <input class="form-control me-2" type="search" name="search_product" placeholder="Search" aria-label="Search">
              <input type="submit" name="search_data" value="Search" class="btn btn-outline-light" >
      
            </form>
    </div>
  </div>

</nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
      <?php
          if(!isset($_SESSION['username'])){?>
            |<li class="nav-item">
            <a class="nav-link" href="#">Welcome Guest</a>
           </li>
      <?php } else { ?>
           |<li class="nav-item">
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
    <div class="bg-light  text-center">
     <h1>Hidden store</h1>
     <p>Communications is at the heart of e-commerce and community</p>
    </div>
     <div class="row px-3">
     <div class="col-md-10">
    <div class="row" >
    <?php
       searchproduct();
       getspecficcategory();
       getspecficbrand();
    ?>
    </div>
    </div>
  <div class="col-md-2 bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
           <a class="nav-link text-light" href="#"><h4>Delivery Brands</h4></a>
        </li>
        <li class="nav-item ">
          <?php
          getbrands();
        ?>
        <li class="nav-item text-center bg-info">
          <a class="nav-link text-light" href="#"><h4>Catogories</h4></a>
        </li>
        <li class="nav-item">
          <?php
          getcategories();
         ?>
    </ul>
  </div>
     </div>

     <?php include('./partials/footer.php'); ?>
  
     </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>