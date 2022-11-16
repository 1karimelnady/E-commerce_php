    <?php
    include '../include/connection.php';
      if(isset($_POST['insert_product'])){

      $product_title=$_POST['product_title'];
      $product_description=$_POST['product_description'];
      $product_keywords=$_POST['product_keywords'];
      $product_category=$_POST['product_category'];
      $product_brand=$_POST['product_brand'];
      $product_price=$_POST['product_price'];
      $products_status='true';
      $product_image1=$_FILES['product_image1']['name'];
      $product_image2=$_FILES['product_image2']['name'];
      $product_image3=$_FILES['product_image3']['name'];
      $tmp_image1=$_FILES['product_image1']['tmp_name'];
      $tmp_image2=$_FILES['product_image2']['tmp_name'];
      $tmp_image3=$_FILES['product_image3']['tmp_name'];
      if($product_title=='' or $product_description=='' or $product_keywords==''
           or $product_price=='' or  $product_image1=='' or  $product_image2=='' or  $product_image3==''){
          echo"<script>alert('All filed required')</script>";
           } else {
              move_uploaded_file($tmp_image1,"./product_images/$product_image1");
              move_uploaded_file($tmp_image2,"./product_images/$product_image2");
              move_uploaded_file($tmp_image3,"./product_images/$product_image3");
              $qinsert="INSERT INTO products(product_title, product_description,product_keywords, category_id, brand_id, 
              product_image1, product_image2, product_image3, price, status, date) 
              VALUES ('$product_title','$product_description','$product_keywords','$product_category','$product_brand' ,
               '$product_image1','$product_image2','$product_image3','$product_price','$products_status',Now())";
               $qresult=$conn->query($qinsert);
               if($qresult){?>
               <?php echo"<script>alert('This product has been successfully added ')</script>"?>;
           <?php }
         }

      }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
        <title>Insert products</title>
    </head>
    <body class="bg-light">
        <div class="container mt-3">
          <h2 class="text-center">Insert products</h2>
            <form action="" method="POST"  enctype="multipart/form-data">
              <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_title">product title</label>
                <input type="text" name="product_title" placeholder="Enter product title" autocomplete="off" required id="product_title" class="form-control mt-2" >
              </div>
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description">product description</label>
                <input type="text" name="product_description" id="product_description" autocomplete="off" require="required" placeholder="Enter product description" class="form-control mt-2">
              </div>
              <div class="form-outline mb-4 m-auto w-50">
                <label for="product_keywords">Product keywords</label>
                <input type="text" id="product_keywords" name="product_keywords" autocomplete="off" placeholder="Enter product keywords" class="form-control mt-2" >
              </div>
              <div class="form-outline w-50 m-auto mb-4">
                <select  name="product_category" id="" class="form-select">
                   <option value="">select category</option>
                   <?php
                   $qselect="SELECT * FROM categories";
                   $result=$conn->query($qselect);
                   foreach($result as $r){?>
                                 <option value="<?=$r['category_id']?>"><?=$r['category_title'] ?></option>
                    <?php }?>
                </select>
              </div>
              <div class="form-outline w-50 m-auto mb-4">
                <select name="product_brand" id="" class="form-select mb-3">
                  <option value="">select Brand</option>
                  <?php
                  $bselect="SELECT * FROM brands";
                  $result=$conn->query($bselect);
                  foreach($result as $b){?>
                            <option value="<?=$b['brand_id']?>"><?=$b['brand_title'] ?></option>
                 <?php } ?>
                </select>
              </div>
              <div class="form-outline mb-4 m-auto w-50">
                <label for="Product_image1">Product image 1</label>
                <input type="file" id="product_image1" name="product_image1"  class="form-control mt-2" >
              </div>
              <div class="form-outline mb-4 m-auto w-50">
                <label for="Product_image2">Product image 2</label>
                <input type="file" id="product_image2" name="product_image2"  class="form-control mt-2" >
              </div>
              <div class="form-outline mb-4 m-auto w-50">
                <label for="Product_image3">Product image 3</label>
                <input type="file" id="product_image3" name="product_image3"  class="form-control mt-2" >
              </div>
              <div class="form-outline w-50 m-auto mb-4">
              <label for="product_price">Product price</label>
                <input type="text" id="product_price" autocomplete="off" name="product_price" placeholder="Enter product price" class="form-control mt-2" >
              </div>
              <div class="form-outline m-auto w-50 mb-4">
                <input type="submit" name="insert_product" value="Insert products" class="btn btn-primary mb-3 px-3">
              </div>
            </form>
        </div>
        
    </body>
    </html>