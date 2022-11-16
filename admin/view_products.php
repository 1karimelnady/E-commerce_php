<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
</head>
<body>
    <h2 class="text-center">All product</h2>
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
               $qselect="SELECT * FROM products";
               $result=$conn->query($qselect);
               foreach($result as $r){?>
                <tr>
                <td><?=$r['product_id']?></td>
                <td><?=$r['product_title']?></td>
                <td><?=$r['price']?></td>
                <td><img src="./product_images/<?=$r['product_image1'] ?>" class="card-img-top product_img"  alt="..."></td>
                <td>
                <?php
                  $product_id=$r['product_id'];
                  $oselect="SELECT * FROM order_pending WHERE product_id=$product_id";
                  $oresult=$conn->query($oselect);
                  $row_count=mysqli_num_rows($oresult);
               echo $row_count;
                ?>
                </td>
                <td><?=$r['status']?></td>
                <td><a href="indexs.php?edit_products=<?=$r['product_id']?>" class=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="indexs.php?delete_products=<?=$r['product_id']?>" class=""><i class="fa-solid fa-trash"></i></a></td>
            </tr>

            <?php } 
            
            ?>

           
        </tbody>

    </table>
</body>
</html>