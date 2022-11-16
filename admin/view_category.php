
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categories</title>
</head>
<body>
<h2 class="text-center text-success">All categories</h2>
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>S1 no</th>
                <th>Category Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">
        <?php
    
    $qselect="SELECT * FROM categories";
     $result=$conn->query($qselect);
     $number=1;
     foreach($result as $r){?>
          <tr>
                <td><?=$number++?></td>
                <td><?=$r['category_title']?></td>
                <td><a href="indexs.php?edit_categories=<?=$r['category_id']?>" class=""><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="indexs.php?delete_categories=<?=$r['category_id']?>" class=""><i class="fa-solid fa-trash"></i></a></td>
            </tr>

     <?php } ?>
       
        </tbody>
    </table>
</body>
</html>