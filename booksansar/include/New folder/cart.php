<?php   

  require('include/connection.inc.php');
   
  $id = $_GET['id'];

  $res = mysqli_query($con, "select * from product where id = '$id'");
  $row = mysqli_fetch_array($res);

  // $image = $row['imgage'];
  $name = $row['name'];
  $price = $row['price'];
  $qty = 1;

  $product = array($name, $price, $qty);

  $_SESSION[$name] = $product;

  header('location: index.php');
 ?>