<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>brands</title>
</head>
<body>
    <h2 class="text-center text-success">All Brands</h2>
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>Si no</th>
                <th>Brand Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>  
            <tbody class="text-center">
                <?php
                $number=1;
                   $qselect="SELECT * FROM brands";
                   $result=$conn->query($qselect);
                   foreach($result as $r){?>
                    <tr>
                        <td><?=$number++?></td>
                        <td><?=$r['brand_title']?></td> 
                        <td><a href="indexs.php?edit_brands=<?=$r['brand_id']?>" class=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="indexs.php?delete_brands=<?=$r['brand_id']?>" alt="" class=""><i class="fa-solid fa-trash"></i></a></td>
            
           </tr>
                <?php } ?>

        
            </tbody>
        </thead>
    </table>
</body>
</html>