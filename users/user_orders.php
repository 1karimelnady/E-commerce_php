
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <?php
        $username=$_SESSION['username'];
        $qselect="SELECT * FROM users WHERE username='$username'";
        $result=$conn->query($qselect);
        $data=mysqli_fetch_assoc($result);
        $user_id=$data['user_id'];
    ?>
    <h2 class="text-success ord">All my orders</h2>
    <div class="container user_order">
        <div class="row">
        <div class="col-md-12">
             <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>serial number</th>
                    <th>order number</th>
                    <th>Amount due</th>
                    <th>Total products</th>
                    <th>Invoice number</th>
                    <th>Date</th>
                    <th>Complete / Incomplete</th>
                    <th> Status</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                         $qselect="SELECT * FROM user_orders";
                         $result=$conn->query($qselect);
                         $number=1;
                         while($data=mysqli_fetch_assoc($result)){ ?>
                                <tr>
                          <td>
                             <?=$number++?>
                         </td>
                            <td>
                            <?=$data['order_id']?>
                            </td>
                        <td>
                    <?=$data['quantity_due']?>
                      </td>
                        <td>
                        <?=$data['total_products']?>
                     </td>

                         <td>
                         <?=$data['invoice_number']?>
                    </td>

                        <td>
                        <?=$data['order_date']?>                    
                      </td>
                     
                  
                     <?php
                        if($data['order_status']=='pending'){
                          echo"<td>Incomplete</td>" ;
                        } else{
                          echo"<td>complete</td>" ;
                        }
                     ?>
                  
            
                        <?php
                        if($data['order_status']=='complete'){
                          echo "<td>Paid</td>";
                        } else{?>
                             <td>
                             <a href="confirm_payment.php?order_id=<?=$data['order_id']?>"class="nav-link">confirm</a>
                    </td>
                        <?php }
                        ?>
                   
           
                
                    </tr>

                       <?php }
                      ?>
                  
                         
                  
                  
                    </div>
                    </div>
                    </div>
                   
</body>
</html>