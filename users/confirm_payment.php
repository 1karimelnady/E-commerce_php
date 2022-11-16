<?php
  include('../include/connection.php');
  session_start();
  if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $qeslect="SELECT * FROM user_orders WHERE order_id=$order_id";
    $result=$conn->query($qeslect);
    $data=mysqli_fetch_assoc($result);
    $invoice_number=$data['invoice_number'];
    $amount=$data['quantity_due'];
  }
  if(isset($_POST['confirm_payment'])){
 
    $invoice_number_payment=$_POST['invoice_number'];
    $amount_payment=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $qinsert="INSERT INTO user_payment(order_id,invoice_number,amount,payment_mode) 
             VALUES($order_id,'$invoice_number_payment','$amount_payment','$payment_mode')";
             $result_payment=$conn->query($qinsert);
             if($result){
                echo "<h2 class='text-center text-light'>Successfully completed the payment</h2>";
                echo "<script>window.open('profile.php','_self')</script>";
             }
             
             $update_orders="UPDATE user_orders SET order_status='complete' WHERE order_id=$order_id";
             $result_update=$conn->query($update_orders);

  }

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <title>payment</title>
  </head>
  <body class="bg-secondary">
    <div class="container my-4">
        <h1 class="text-center text-light">confirm payment</h1>
      <form action="" method="post">
        <div class="form-outline my-4 w-50 m-auto text-center ">
        <label class="text-light mb-2">Invoice Number</label>
            <input type="text" name="invoice_number" value="<?=$invoice_number?>" class="form-control w-50 m-auto">
        </div>
        
        <div class="form-outline my-4 w-50 m-auto text-center ">
        <label class="text-light mb-2">Amount</label>
            <input type="text" name="amount" value="<?=$amount?>" class="form-control w-50 m-auto">
        </div>
        <div class="form-outline my-4 w-50 m-auto text-center ">
           <select class="form-select w-50 m-auto" name="payment_mode">
            <option>Select Payment Mode</option>
            <option>UPI</option>
            <option>Net Banking</option>
            <option>Paypal</option>
            <option>Cash on Delivery</option>
            <option>Pay offline</option>
           </select>
        </div>
        <div class="form-outline my-4 w-50 m-auto text-center ">
            <input type="submit" name="confirm_payment" value="confirm payment" class="btn btn-primary">
        </div>
      </form>
    </div>
  </body>
  </html>