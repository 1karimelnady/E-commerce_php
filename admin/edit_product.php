<?php
   if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $qselect="SELECT * FROM products WHERE product_id=$edit_id";
    $result=$conn->query($qselect);
    $data=mysqli_fetch_assoc($result);
    $product_title=$data['product_title'];
    $product_description=$data['product_description'];
    $product_keywords=$data['product_keywords'];
    $product_image1=$data['product_image1'];
    $product_image2=$data['product_image2'];
    $product_image3=$data['product_image3'];
    $product_price=$data['price'];
    $product_category=$data['category_id'];
    $product_brand=$data['brand_id'];

   }
   $select="SELECT * FROM brands Where brand_id=$product_brand ";
   $results=$conn->query($select);
   $data=mysqli_fetch_assoc($results);
   $brand_title=$data['brand_title'];

   $selects="SELECT * FROM categories Where category_id=$product_category";
   $resulte=$conn->query($selects);
   $datac=mysqli_fetch_assoc($resulte);
   $category_title=&$datac['category_title'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Product</title>
</head>
<body>
<div class="container mt-3">
          <h2 class="text-center">Edit product</h2>
            <form action="" method="POST"  enctype="multipart/form-data">
              <div class="form-outline mb-4 w-50 m-auto">
              <label for="product_title">product title</label>
                <input type="text" value="<?= $product_title?>" name="product_title" placeholder="Enter product title" autocomplete="off" required="required" id="product_title" class="form-control mt-2" >
              </div>
              <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description">product description</label>
                <input type="text" value="<?= $product_description?>" name="product_description" id="product_description" autocomplete="off" required="required" placeholder="Enter product description" class="form-control mt-2">
              </div>
              <div class="form-outline mb-4 m-auto w-50">
                <label for="product_keywords">Product keywords</label>
                <input type="text" value="<?=$product_keywords?>" id="product_keywords" name="product_keywords" autocomplete="off" required="required" placeholder="Enter product keywords" class="form-control mt-2" >
              </div>
              <div class="form-outline mb-4 m-auto w-50">
              <label class="mb-2" for="Product_categories">Product_categories</label>
                <select class="form-select" name="Product_categories">
                      <option value="<?=$category_title?>"><?=$category_title?></option>
                    <?php
                     $select="SELECT * FROM categories";
                     $results=$conn->query($select);
                     foreach($results as $s){?>
                      <option value="<?=$product_category?>"><?=$s['category_title']?></option>

                    <?php } ?>
                  
                </select>
              </div>
              <div class="form-outline mb-4 m-auto w-50">
              <label class="mb-2" for="Product_Brands">Product_Brands</label>
                <select class="form-select" name="Product_Brands">
                         <option value="<?=$brand_title?>"><?=$brand_title?></option>
                    <?php
                     $select="SELECT * FROM brands";
                     $results=$conn->query($select);
                     foreach($results as $s){?>
                      <option value="<?=$product_brand?>"><?=$s['brand_title']?></option>
                    <?php } ?>
                </select>
              </div>
              <div class="form-outline mb-4 m-auto w-50">
                <label for="Product_image1">Product image 1</label>
                <div class="d-flex">
                  <input type="file" id="product_image1"  required="required" name="product_image1"  class="form-control mt-2" >
                 <img src="./product_images/<?=$product_image1?>" class="product_img" alt="">
              </div>
              </div>
              <div class="form-outline mb-4 m-auto w-50">
                <label for="Product_image2">Product image 2</label>
                <div class="d-flex">
                <input type="file"id="product_image2" required="required" name="product_image2"  class="form-control mt-2" >
                <img src="./product_images/<?=$product_image2?>" class="product_img" alt="">
                </div>
              </div>
              <div class="form-outline mb-4 m-auto w-50">
                <label for="Product_image3">Product image 3</label>
                <div class="d-flex">
                <input type="file" id="product_image3" required="required" name="product_image3"  class="form-control mt-2" >
                <img src="./product_images/<?=$product_image3?>" class="product_img" alt="">
              </div>
              </div>
              <div class="form-outline w-50 m-auto mb-4">
              <label for="product_price">Product price</label>

                <input type="text" value="<?=$product_price?>" required="required" id="product_price" autocomplete="off" name="product_price" placeholder="Enter product price" class="form-control mt-2" >
              </div>
              <div class="form-outline m-auto w-50 mb-4">
                <input type="submit" name="update_products" value="Update product" class="btn btn-primary mb-3 px-3">
              </div>

            </form>
</div>
    
</body>
</html>

 <?php
if (isset($_POST['update_products'])) {
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_price=$_POST['product_price'];
    $product_category=$_POST['Product_categories'];
    $product_brand=$_POST['Product_Brands'];
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    $img_tmp1=$_FILES['product_image1']['tmp_name'];
    $img_tmp2=$_FILES['product_image2']['tmp_name'];
    $img_tmp3=$_FILES['product_image3']['tmp_name'];
    if ($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brand==''
           or $product_price=='' or  $product_image1=='' or  $product_image2=='' or  $product_image3=='') {
        echo"<script>alert('All filed required')</script>";
    } else {
        move_uploaded_file($img_tmp1, "./product_images/$product_image1");
        move_uploaded_file($img_tmp2, "./product_images/$product_image2");
        move_uploaded_file($img_tmp3, "./product_images/$product_image3");
        $qupdate="UPDATE products SET product_title='$product_title', product_description='$product_description', 
        product_keywords='$product_keywords',
        price='$product_price', product_image1='$product_image1', product_image2='$product_image2' ,
        product_image3='$product_image3'
        WHERE product_id=$edit_id ";
        $update=$conn->query($qupdate);
        if ($update) {
            echo"<script>alert('product updated successfully')</script>";
            echo"<script>'window.open('./insert_products.php','_self')'</script>";
        }
    }
}
 ?>