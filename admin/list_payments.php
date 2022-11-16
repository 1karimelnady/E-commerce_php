<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2 class="text-center text-success">All Payments</h2>
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>Si no</th>
                <th>Invoice number</th>
                <th> Amount</th>
                <th>payment mode</th>
                <th>Payment date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $number=1;
            $qselect="SELECT * FROM user_payment";
            $reasult=$conn->query($qselect);
            $num_row=mysqli_num_rows($reasult);
            if($num_row==0){
               echo " <h2 class='text-center text-danger'>No payments yet</h2>";
            }else{
            foreach($reasult as $r){?>
             <tr>
                <td><?=$number++?></td>
                <td><?=$r['invoice_number']?></td>
                <td><?=$r['amount']?></td>
                <td><?=$r['payment_mode']?></td>
                <td><?=$r['date']?></td>
                <td><a href="indexs.php?delete_payment=<?=$r['order_id']?>" class=""><i class="fa-solid fa-trash"></i></a></td>
            
                </tr>
            <?php } ?>
           
               
     
        </tbody>
    </table>
          <?php  }?>
</body>
</html>