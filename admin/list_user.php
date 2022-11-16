<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Document</title>
</head>
<body>
            <?php
            $number=1;
            $qselect="SELECT * FROM users";
            $reasult=$conn->query($qselect);
            $num_row=mysqli_num_rows($reasult);
            if($num_row==0){
               echo " <h2 class='text-center text-danger'>No users yet</h2>";
            }else{?>
                <h2 class="text-center text-success">All Users</h2>
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>Si no</th>
                <th>user name</th>
                <th>user email</th>
                <th>user image</th>
                <th>user mobile</th>
                <th>user address</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody class="text-center">
        <?php
            foreach($reasult as $r){?>
             <tr>
                <td><?=$number++?></td>
                <td><?=$r['username']?></td>
                <td><?=$r['user_email']?></td>
                <td><img src="../users/user_images/<?=$r['user_image'] ?> "class="card-img-top user_img "</td>
                <td><?=$r['user_mobile']?></td>
                <td><?=$r['user_address']?></td>
                <td><a href="indexs.php?delete_users=<?=$r['user_id']?>" class=""><i class="fa-solid fa-trash"></i></a></td>

         
                </tr>
            <?php } ?>
           
               
     
        </tbody>
    </table>
          <?php  }?>
</body>
</html>