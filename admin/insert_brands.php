<?php
include '../include/connection.php';
    if(isset($_POST['brand'])){
      $brand=$_POST['insert_brand'];
      $bselect="SELECT * FROM brands where brand_title='$brand'";
      $brands=$conn->query($bselect);
      $number=mysqli_num_rows($brands);
      if($number>0){ ?>
      <?php echo"<script>alert('This brand has been already exists')</script>"?>;
     <?php } else {
    $qinsert="INSERT INTO Brands(brand_title) VALUES('$brand')";
    $result=$conn->query($qinsert);
    if ($result) {?>
            <?php echo"<script>alert('This brand has been successfully added ')</script>"?>;
   <?php   }
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
    <h2 class="text-center">Insert Brands</h2>
    <form action="" method="post" class=" mb-2">
    <div class="input-group mb-2 bg-info w-90">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
   <input type="text" class="form-control" placeholder="Insert Brands" name="insert_brand" aria-label="brand" aria-describedby="basic-addon1">
  </div>
  <input type="submit" class=" my-3 bg-info p-2 border-0" name="brand" value="Insert Brand" aria-label="brand" aria-describedby="basic-addon1">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </form>
  </body>
  </html>