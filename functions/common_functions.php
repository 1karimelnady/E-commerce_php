<?php
   function getproduct() {
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            global $conn;
            $qselect="SELECT * FROM products  order by rand() LIMIT 0,9";
            $result=$conn->query($qselect);
            foreach($result as $c){?>
            <div class="col-md-4 mb-2">
                  <div class="card">
                       <a href="./product_deatil.php?product_id=<?=$c['product_id'] ?>"><img src="./admin/product_images/<?=$c['product_image1'] ?>" class="card-img-top" alt="..."></a>
                        <div class="card-body mb-2">
                          <h5 class="card-title"><?=$c['product_title'] ?> </h5>
                          <p class="card-text"><?=$c['product_description'] ?></p>
                          <p class="card-text"><?=" EGP ".$c['price']?></p>
                          <a href="index.php?add_to_cart=<?=$c['product_id'] ?>" class="btn btn-info">Add to cart</a>
                          <a href="product_deatil.php?product_id=<?=$c['product_id'] ?>" class="btn btn-secondary">View more </a>
            </div>
            </div>
            </div>
          <?php } 
          }
        }
    }
    function all_product(){
      if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            global $conn;
            $qselect="SELECT * FROM products  order by rand()";
            $result=$conn->query($qselect);
            foreach($result as $c){?>
            <div class="col-md-4 mb-2">
                  <div class="card">
                    <a href="./product_deatil.php?product_id=<?=$c['product_id'] ?>"><img src="./admin/product_images/<?=$c['product_image1'] ?>" class="card-img-top" alt="..."></a>
                        <div class="card-body mb-2">
                          <h5 class="card-title"><?=$c['product_title'] ?> </h5>
                          <p class="card-text"><?=$c['product_description'] ?></p>
                          <p class="card-text"><?=" EGP ".$c['price'] ?></p>
                          <a href="index.php?add_to_cart=<?=$c['product_id'] ?>" class="btn btn-info">Add to cart</a>
                          <a href="product_deatil.php?product_id=<?=$c['product_id'] ?>" class="btn btn-secondary">View more </a>
            </div>
            </div>
            </div>
          <?php } 
          }
        }

    }
    function getspecficcategory(){
         if(isset($_GET['category'])){
            $category_id=$_GET['category'];
            global $conn;
            $qselect="SELECT * FROM products where category_id=$category_id ";
            $result=$conn->query($qselect);
            $number=mysqli_num_rows($result);
            if($number==0){
                echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
            }
            foreach($result as $c){?>
            <div class="col-md-4 mb-2">
                  <div class="card">
                       <a href="./product_deatil.php?product_id=<?=$c['product_id'] ?>"> <img src="./admin/product_images/<?=$c['product_image1'] ?>" class="card-img-top" alt="..."></a>
                        <div class="card-body mb-2">
                          <h5 class="card-title"><?=$c['product_title'] ?> </h5>
                          <p class="card-text"><?=$c['product_description'] ?></p>
                          <p class="card-text"><?=" EGP ".$c['price'] ?></p>
                          <a href="index.php?add_to_cart=<?=$c['product_id'] ?>" class="btn btn-info">Add to cart</a>
                          <a href="product_deatil.php?product_id=<?=$c['product_id'] ?>" class="btn btn-secondary">View more </a>
            </div>
            </div>
            </div>
          <?php } 
          }
         }
         function getspecficbrand(){
            if(isset($_GET['brand'])){
                $brand_id=$_GET['brand'];
                global $conn;
                $qselect="SELECT * FROM products where brand_id=$brand_id";
                $result=$conn->query($qselect);
                $number=mysqli_num_rows($result);
                if($number==0){
                    echo "<h2 class='text-center text-danger'>This Brand is not available for this service</h2>";
                }
                foreach($result as $c){?>
                <div class="col-md-4 mb-2">
                      <div class="card">
                         <a href="./product_deatil.php?product_id=<?=$c['product_id'] ?>"><img src="./admin/product_images/<?=$c['product_image1'] ?>" class="card-img-top" alt="..."></a>
                            <div class="card-body mb-2">
                              <h5 class="card-title"><?=$c['product_title'] ?> </h5>
                              <p class="card-text"><?=$c['product_description'] ?></p>
                              <p class="card-text"><?=" EGP ".$c['price'] ?></p>
                              <a href="index.php?add_to_cart=<?=$c['product_id'] ?>" class="btn btn-info">Add to cart</a>
                              <a href="product_deatil.php?product_id=<?=$c['product_id'] ?>" class="btn btn-secondary">View more </a>
                </div>
                </div>
                </div>
              <?php } 
              }
            }
function getbrands(){
         global $conn;
    $bselect="SELECT * FROM brands";
    $results=$conn->query($bselect);
    foreach($results as $b){ ?>
                 <a class="nav-link text-light" href="index.php?brand=<?=$b['brand_id'] ?>"><?=$b['brand_title'] ?></a>
  </li>
   <?php }     
}

function getcategories(){
    global $conn;
    $qselect="SELECT * FROM categories ";
    $result=$conn->query($qselect);
    foreach($result as $r){?>
              <a class="nav-link text-light" href="index.php?category=<?=$r['category_id']?>"><?=$r['category_title'] ?></a>
       </li>
   <?php }

}

function searchproduct(){
    global $conn;
    if(isset($_GET['search_data'])){
        $serach_product=$_GET['search_product'];
        $qselect="SELECT * FROM products where product_keywords like '%$serach_product%'";
        $result=$conn->query($qselect);
        $number=mysqli_num_rows($result);
        if($number==0){
            echo "<h2 class='text-center text-danger'>No results match. No products found in this category </h2>";
        }
        foreach($result as $c){?>
            <div class="col-md-4 mb-2">
            <div class="card">
                <a href="./product_deatil.php?product_id=<?=$c['product_id'] ?>"><img src="./admin/product_images/<?=$c['product_image1'] ?>" class="card-img-top" alt="..."></a>
                  <div class="card-body mb-2">
                    <h5 class="card-title"><?=$c['product_title'] ?> </h5>
                    <p class="card-text"><?=$c['product_description'] ?></p>
                    <p class="card-text"><?=" EGP : ".$c['price'] ?></p>
                    <a href="index.php?add_to_cart=<?=$c['product_id'] ?>" class="btn btn-info">Add to cart</a>
                    <a href="product_deatil.php?product_id=<?=$c['product_id'] ?>" class="btn btn-secondary">View more </a>
      </div>
      </div>
      </div>
    <?php } 
        }

    }

    function getproductdeatils(){
    global $conn;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_deatil=$_GET['product_id'];
                $qselect="SELECT * FROM products where product_id=$product_deatil";
                $result=$conn->query($qselect);
                foreach ($result as $c) {?>
                  <div class="col-md-4 mb-2">
                  <div class="card">
                <img src="./admin/product_images/<?=$c['product_image1'] ?>" class="card-img-top" alt="...">
                        <div class="card-body mb-2">
                          <h5 class="card-title"><?=$c['product_title'] ?> </h5>
                          <p class="card-text"><?=$c['product_description'] ?></p>
                          <p class="card-text"><?=" EGP ".$c['price'] ?></p>
                          <a href="index.php?add_to_cart=<?=$c['product_id'] ?>" class="btn btn-info">Add to cart</a>
                    <a href="product_deatil.php?product_id=<?=$c['product_id'] ?>" class="btn btn-secondary">View more </a>
          
            </div>
            </div>
            </div>
                        <div class="md-8">
                         <div class="row">
                         <div class="md-12">
                                <h4 class="text-center text-info">Product details</h4>
        </div>
                         <div class="col-md-6">
                                 <img src="./admin/product_images/<?=$c['product_image2']?>" class="card-img-top" alt="...">
                                 <h5 class="card-title"><?=$c['product_title'] ?> </h5>
                          <p class="card-text"><?=$c['product_description'] ?></p>
        </div>
                         <div class="col-md-6">
                                 <img src="./admin/product_images/<?=$c['product_image3'] ?>" class="card-img-top" alt="...">
                                 <h5 class="card-title"><?=$c['product_title'] ?> </h5>
                          <p class="card-text"><?=$c['product_description'] ?></p>
        </div>
        </div>
        </div>


          <?php }
                }
        }
    }
}

  
    function getIPAddress() {  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  
function cart(){
    if (isset($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_address=getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $qselect="SELECT * FROM cart where ip_address='$get_ip_address' and product_id=$get_product_id";
        $result=$conn->query($qselect);
        $number=mysqli_num_rows($result);
        if ($number>0) {?>
             <?php echo"<script>alert('This item has been aleardy in cart')</script>"?>;

<?php } else {
    $qinsert="INSERT INTO cart(product_id,ip_address,quantity) VALUES($get_product_id,'$get_ip_address','0')";
    $result=$conn->query($qinsert);
    if ($result) { ?>
                 <?php echo"<script>alert('This item has been successfully added in cart')</script>"?>;
                 
      
<?php }
    }
    }
}

function cart_item(){
  if (isset($_GET['add_to_cart'])) {
    global $conn;
    $get_ip_address=getIPAddress();
    $qselect="SELECT * FROM cart where ip_address='$get_ip_address'";
    $result=$conn->query($qselect);
    $count_cart_item=mysqli_num_rows($result);
   } else {
    global $conn;
    $get_ip_address=getIPAddress();
    $qselect="SELECT * FROM cart where ip_address='$get_ip_address'";
    $result=$conn->query($qselect);
    $count_cart_item=mysqli_num_rows($result);

}
echo $count_cart_item;

}

  function total_cart_price(){
    $totalprice=0;
        global $conn;
        $get_ip_address=getIPAddress();
        $cartselect="SELECT * FROM cart where ip_address='$get_ip_address'";
        $result=$conn->query($cartselect);
        foreach($result as $r){
          $product_id=$r['product_id'];
          $select_product="SELECT * FROM products where product_id='$product_id'";
          $result_product=$conn->query($select_product);
          foreach($result_product as $s){
                $product_price=array($s['price']);
                $price_value=array_sum($product_price);
               $totalprice+=$price_value;
          }
        }
       
       echo $totalprice;

  }
  function get_orders(){
    global $conn;
    $username=$_SESSION['username'];
    $qselect="SELECT * FROM users where username='$username'";
    $result=$conn->query($qselect);
    while($row=mysqli_fetch_array($result)){
      $user_id=$row['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['dalete_account'])){
          $order_select="SELECT * FROM `user_orders` WHERE user_id=$user_id and order_status='pending'";
          $result_order=$conn->query($order_select);
          $row_count=mysqli_num_rows($result_order);
        if ($row_count>0) {

                echo"
                    <h3  class='text-center' style='margin-left:250px'>you have <span class='text-danger'>$row_count</span> pending orders</h3>
                    <h2 class='text-center' style='margin-left:250px'><a href='profile.php?my_orders' class='nav-link '>Order Details</a></h2>
                    ";
        } else {

                echo"
                <h3 class='text-center text-success' style='margin-left:250px'>you have 0 pending orders</h3>
                <h2 class='text-center' style='margin-left:250px'><a href='../index.php' class='nav-link text-danger '>Explore products</a></h2>
                ";
        }

          }

        }

      }

    }
  }
  function delete_cart_item(){
    global $conn;
  if (isset($_POST['delete_cart'])){
    foreach($_POST['deleteitem'] as $remove){
        $qdelete=" DELETE  FROM `cart` where product_id=$remove";
        $results=$conn->query($qdelete);
        if($results){
           echo "<script>window.open('cart.php','_self')</script>";
        }
      
    }
   
}

}
echo $removeitem=delete_cart_item();
   
?>

