<?php   
  session_start();
  require('include/connection.inc.php');

  if($_SERVER["REQUEST_METHOD"] == "POST"){

  	 if(isset($_POST['purchase'])){

         $uid = $_SESSION['USER_ID'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
         $paymod = $_POST['pay_mod'];
         $zipcode = $_POST['zipcode'];
         $payment = 2;

         // $product=mysqli_query($con,"select * from product where id = $_SESSION['USER_ID']");
         // $product_id =mysqli_fetch_assoc($product);
         // $product_qty = $product_id['qty'];

         $sql = "INSERT INTO `order_manager`(`user_id`, `phone`, `address`, `pay_mod`, `zipcode`, `Payment`) VALUES ('$uid','$phone','$address','$paymod','$zipcode', '$payment')";
         
         if(mysqli_query($con, $sql)){
             $order_id=mysqli_insert_id($con);
             $sql2 = "INSERT INTO `order_detail`(`order_id`, `name`, `price`, `qty`) VALUES (?,?,?,?)";
             $stmt= mysqli_prepare($con,$sql2);
             if($stmt){
                mysqli_stmt_bind_param($stmt,"isdi",$order_id,$name,$price,$qty);
                foreach($_SESSION['cart'] as $key => $values){

                  $name = $values['item_name'];
                  $price = $values['price'];
                  $qty = $values['qty'];
                  // if($q > $product_qty){
                  //   echo "<script>
                  //          alert('Invalid qty. we have limited stock.');
                  //          window.location.href='mycart.php';
                  //        </script>";
                  // }
                  // $qty = $product_qty-$q;
                  mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>
                   alert('Order placed..');
                   window.location.href='index.php';
                 </script>";
             }else{
              echo "<script>
                   alert('SQL query prepare error.');
                   window.location.href='mycart.php';
                 </script>";
             }
      	 }else{
            echo "<script>
                   alert('SQL error');
                   window.location.href='mycart.php';
                 </script>";
         }
       }
  }

  
 ?>