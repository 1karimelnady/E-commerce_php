<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2 class="text-center text-success">All Orders</h2>
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>Si no</th>
                <th>Due quantity</th>
                <th>Invoice number</th>
                <th>Total products</th>
                <th>Order date</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $number=1;
            $qselect="SELECT * FROM user_orders";
            $reasult=$conn->query($qselect);
            $num_row=mysqli_num_rows($reasult);
            if($num_row==0){
               echo " <h2 class='text-center text-danger'>No Orders yet</h2>";
            }else{
            foreach($reasult as $r){?>
             <tr>
                <td><?=$number++?></td>
                <td><?=$r['quantity_due']?></td>
                <td><?=$r['invoice_number']?></td>
                <td><?=$r['total_products']?></td>
                <td><?=$r['order_date']?></td>
                <td><?=$r['order_status']?></td>
                <td><a href="indexs.php?delete_orders=<?=$r['order_id']?>" class=""><i class="fa-solid fa-trash"></i></a></td>
            
                </tr>
            <?php } ?>
           
               
     
        </tbody>
    </table>
          <?php  }?>
</body>
</html>