<?php
  include '../include/connection.php';
  include '../functions/common_functions.php';
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    	
    <title>Document</title>
	<link rel="stylesheet" href="../css/user.css">
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
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../display_all.php">products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile.php">My Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"><sup><?= cart_item();?></sup></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> Totalprice :<?=total_cart_price();?> /</a>
              </li>
            </ul>
            <form action="../search_product.php" method="get" class="d-flex">
              <input class="form-control me-2" type="search" name="search_product" placeholder="Search" aria-label="Search">
              <input type="submit" name="search_data" value="Search" class="btn btn-outline-light" >
      
            </form>
    </div>
  </div>
    
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
           <a class="nav-link" href="#">welcome <?=$_SESSION['username']?></a>
          </li>
  <?php    } ?>
      <?php
          if(!isset($_SESSION['username'])){ ?>
            <li class="nav-item">
            <a class="nav-link" href="user_login.php">Login</a>
           </li>
       <?php   } else { ?>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
            </li>
     <?php  } ?>
        
      </ul>
    </nav>  
    <div class="bg-light  text-center">
     <h1>Hidden store</h1>
     <p>Communications is at the heart of e-commerce and community</p>
    </div>
	<div class="profile">
		<h2 class="text-center "> My Profile</h2>
		<ul class="nav nav-lg">
			<?php
           $user_namesession=$_SESSION['username'];
           $image_user="SELECT * FROM users WHERE username='$user_namesession'";
           $image_result=$conn->query($image_user);
           foreach($image_result as $r){?>
                 <li><img src="../users/user_images/<?=$r['user_image'] ?> "class="card-img-top user_img " </li>
        <?php }?>
			<h4><li class="nav-item"><a href="profile.php" class="nav-link text-danger ">
              pending orders
			</a>
		</li></h4>
			<h4><li class="nav-item"><a href="profile.php?edit_account" class="nav-link text-danger">
              Edit Account
			</a>
		</li></h4>
    <h4><li class="nav-item"><a href="profile.php?my_orders" class="nav-link text-danger">
              My orders
			</a>
		</li></h4>
		</li>
		<h4>	<li class="nav-item"><a href="profile.php?dalete_account" class="nav-link text-danger">
              Delete Account
			</a>
		</li></h4>
		<h4><li class="nav-item"><a href="logout.php" class="nav-link text-danger">
             logout
			</a>
		</li></h4>

		</ul>
	</div>		
	<div class="col-md-10 text-center">
		<?php
		   get_orders();
		   if(isset($_GET['edit_account'])){
			include ('edit_account.php');
		   }
       if(isset($_GET['my_orders'])){
        include ('user_orders.php');
         }
         if(isset($_GET['dalete_account'])){
          include ('delete_account.php');
           }
		?>
	</div>
  <?php include('../partials/footer.php'); ?>
					
</body>
</html>
