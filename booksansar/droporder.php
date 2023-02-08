<?php 
    require('include/connection.inc.php');
    require('include/function.inc.php');

 ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<h2>My Customers</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Country</th>
  </tr>
  <div class="container">
                    <div class="row">
                           <?php
                            $get_product=get_product($con);
                            foreach($get_product as $list){
                                $qty = $list['qty'];
                            ?>
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <form action="manage_cart.php" method="POST">
                                    <div class="card">
                                      <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" class="card-img-top">
                                      <div class="card-body text-center">
                                        <h5 class="card-title"><?php echo $list['name']?></h5>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><s>Rs. <?php echo $list['mrp']?></s></li>
                                            <li>Rs. <?php echo $list['price']?></li>
                                        </ul>
                                        <?php 
                                            if($qty == '0'){
                                                echo " <button class='btn btn-danger' disabled><s>Out of Stock</s></button>";
                                            }else if($qty <= '4'){
                                                echo "<h7 style='color: red;'>Limited Stock</h7>";
                                                echo " <button type='submit' name='Add_To_Cart' class='btn btn-success'>Add to Cart</button>";
                                            }else{
                                                echo " <button type='submit' name='Add_To_Cart' class='btn btn-success'>Add to Cart</button>";
                                            }
                                         ?>
                                        <input type="hidden" name="item_name" value="<?php echo $list['name']?>">
                                        <input type="hidden" name="price" value="<?php echo $list['price']?>">
                                      </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>
                    </div>
     </div>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
