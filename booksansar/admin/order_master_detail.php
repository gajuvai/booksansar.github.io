<?php
	require('include/top.inc.php');
	$order_id=$_GET['orderid'];
	$sum = 0;
	if(isset($_POST['submit'])){

		$status='1';
		$update_status_sql="update order_manager set Payment='$status' where id='$order_id'";

		if(mysqli_query($con,$update_status_sql)){

			echo "<script>alert('Amount Paid Successfully.'');
				 </script>";
		}
		
	   echo "<script> window.location.href='order_master.php';</script>";
	}
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order Detail </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
								<thead>
									<tr>
										<th class="product-thumbnail">Product Name</th>
										<th class="product-thumbnail">Product Image</th>
										<th class="product-name">Qty</th>
										<th class="product-price">Price</th>
										<th class="product-price">Total Price</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								   $query2 = "SELECT * FROM `order_detail` WHERE order_id=$order_id";
								   $order_result = mysqli_query($con,$query2);
								   while($row=mysqli_fetch_assoc($order_result)){
								    $q=$row['qty'];
									$p=$row['price'];
									$total=$p*$q;
									echo "<tr>
												<td>$row[id]</td>
												<td></td>
												<td>$row[qty]</td>
												<td>$row[price]</td>
												<td>$total</td>
											</tr>";
											$sum=$sum+$total;
									} ?>
									<tr>
										<td colspan="3"></td>
										<td class="product-name">Total Price</td>
										<td class="product-name"><?php echo $sum ?></td>
										
									</tr>
								</tbody>
							
						</table>
						<div id="address_details">
							<?php
							   $query2 = "SELECT * FROM order_manager WHERE id=$order_id";
							   $order_result = mysqli_query($con,$query2);
							   $row=mysqli_fetch_assoc($order_result);
							?>

							<strong>Address</strong>
							<?php echo "$row[address]"?><br/><br/>
							
							<div>
								<form method="post">
								<div class="contact-btn">
                                    <button type="submit" class="fv-btn btn-success text-center" name="submit">Amount Paid</button>
                                </div>
								</form>
							</div>
						</div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('include/footer.inc.php');
?>