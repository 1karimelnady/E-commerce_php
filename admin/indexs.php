<?php
      include('../include/connection.php');
      session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <title>Admin</title>
</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
        <img src="" alt="" class="">
        <nav class=" navbar navbar-expand-lg">
       <ul class="navbar-nav">
       <?php
          if(!isset($_SESSION['admin'])){?>
            <li class="nav-item">
            <a class="nav-link" href="#">Welcome Guest</a>
           </li>
      <?php } else { ?>
           <li class="nav-item">
           <a class="nav-link" href="#">Welcome <?=$_SESSION['admin']?></a>
          </li>
  <?php    } ?>
       </ul>
        </nav>
        </div>
    </nav>

<div class="text-dark my-2 text-center">
           <h2>Manage Details</h2>
          </div>
          <div class="row ">
            <div class="col-md-12 bg-info p-1 d-flex align-item-center">
            <div class="button text-center bg-info p-4 me-2">
            <button class="my-3  p-2"><a href="insert_products.php" class="navlink  p-2  text-dark  text-decoration-none">Insert products</a></button>
            <button class="my-3  p-2 "><a href="indexs.php?view_product" class="navlink p-2  text-dark text-decoration-none">View products</a></button>
            <button class="my-3  p-2"><a href="indexs.php?insert_category" class="navlink  p-2  text-dark text-decoration-none">Insert categories</a></button>
            <button class="my-3  p-2"><a href="indexs.php?view_categories" class="navlink  p-2  text-dark text-decoration-none">View categories</a></button>
            <button class="my-3  p-2"><a href="indexs.php?insert_brand" class="navlink  p-3  text-dark text-decoration-none">Insert Brand</a></button>
            <button class="my-3  p-2"><a href="indexs.php?view_brands" class="navlink  p-3   text-dark text-decoration-none">View Brand</a></button>
            <button class="my-3  p-2"><a href="indexs.php?list_orders" class="navlink  p-3   text-dark text-decoration-none">All Orders</a></button>
            <button class="my-3  p-2"><a href="indexs.php?list_payments" class="navlink  p-3   text-dark text-decoration-none">All payements</a></button>
            <button class="my-3  p-2"><a href="indexs.php?list_user" class="navlink  p-3   text-dark text-decoration-none">List users</a></button>
            <button class="my-3  p-2"><a href="admin_logout.php?logout" class="navlink  p-3   text-dark text-decoration-none">log out</a>  </button>
</div>
</div>
</div>
<div class="container my-3">
<?php
    if(isset($_GET['insert_category'])){
        include 'insert_categories.php';
    }
    if(isset($_GET['insert_brand'])){
        include 'insert_brands.php';
    }
    if(isset($_GET['view_product'])){
        include 'view_products.php';
    }
    if(isset($_GET['edit_products'])){
        include('edit_product.php');
      }
      if(isset($_GET['delete_products'])){
        include('delete_product.php');
      }
      if(isset($_GET['view_categories'])){
        include('view_category.php');
      }
      if(isset($_GET['view_brands'])){
        include('view_brand.php');
      }
      if(isset($_GET['edit_categories'])){
        include('edit_category.php');
      }
      if(isset($_GET['delete_categories'])){
        include('delete_category.php');
      }
      if(isset($_GET['edit_brands'])){
        include('edit_brand.php');
      }
      if(isset($_GET['delete_brands'])){
        include('delete_brand.php');
      }
      if(isset($_GET['list_orders'])){
        include('list_order.php');
      }
      if(isset($_GET['delete_orders'])){
        include('delete_order.php');
      }
      if(isset($_GET['list_payments'])){
        include('list_payments.php');
      }
      if(isset($_GET['delete_payment'])){
        include('delete_payment.php');
      }
      if(isset($_GET['list_user'])){
        include('list_user.php');
      }
      

      
?>
</div>
   <?php include('../partials/footer.php'); ?>
     </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>