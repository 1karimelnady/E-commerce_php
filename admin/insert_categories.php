<?php
   include '../include/connection.php';
   if(isset($_POST['cat'])){
    $cate=$_POST['insert_cat'];
    $qselect="SELECT * FROM categories WHERE category_title='$cate'";
    $select=$conn->query($qselect);
    $number=mysqli_num_rows($select);
    if($number>0){?>
      <?php echo"<script>alert('This category has been aleardy exists ')</script>"?>;
        
    <?php } else{
    $qinsert="INSERT INTO categories(category_title) VALUES('$cate') ";
    $result=$conn->query($qinsert);
    if ($result) {?>
     <?php echo"<script>alert('This category has been aleardy added ')</script>"?>;
  <?php  }
}
   } ?>



  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertcategories</title>
  </head>
  <body>
    <h2 class="text-center">Insert Categories</h2>
    <form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90 ">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
   <input type="text" class="form-control" placeholder="Insert categories" name="insert_cat" aria-label="category" aria-describedby="basic-addon1">
  </div>
   <input type="submit" class=" my-3 bg-info p-2 border-0" name="cat" value="Insert category" aria-label="category" aria-describedby="basic-addon1">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  </html>