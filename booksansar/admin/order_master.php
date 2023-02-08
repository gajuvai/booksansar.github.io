<?php require('include/top.inc.php'); 

?>

<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">All Orders </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table text-center">
							<thead>
								<tr>
									<th scope="col">Order ID</th>
									<th scope="col">Customer ID</th>
									<th scope="col">Phone No.</th>
									<th scope="col">Address</th>
									<th scope="col">Pay Mod</th>
									<th scope="col">Date</th>
									<th scope="col">Payment Status</th>
									<th scope="col"><a class="badge badge-edit" role="button" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order">View Orders</a></th>
								</tr>
							</thead>
							<tbody>
								<?php 
								    $query1 = "SELECT * FROM order_manager";
								    $user_result = mysqli_query($con,$query1);

								    while($row=mysqli_fetch_assoc($user_result)){
										$query2 = "SELECT * FROM order_detail WHERE order_id='$row[id]'";
										$order_result = mysqli_query($con,$query2);
								    	echo "<tr>
												<td>$row[id]</td>
												<td>$row[user_id]</td>
												<td>$row[phone]</td>
												<td>$row[address]</td>
												<td>$row[pay_mod]</td>
												<td>$row[date_on]</td>
												<td>";

													if($row['Payment']==2){
														echo "<span class='badge badge-pending'><a href='order_master_detail.php?orderid=".$row['id']."'>Due Amount</a></span>&nbsp;";
													}else{
														echo "<span class='badge badge-complete'>Amount Paid</span>&nbsp;";
													}
													?></td>
												<td>	
													<div class="collapse" id="order">
													  <table class="table text-center">
														<thead>
															<tr>
																<th scope="col">Item Name</th>
																<th scope="col">Price</th>
																<th scope="col">Quantity</th>
															</tr>
														</thead>
														<tbody>
															<?php 
															   while($order_fetch=mysqli_fetch_assoc($order_result)){
															   	     echo "<tr>
															   	     		   <td>$order_fetch[name]</td>
															   	     		   <td>$order_fetch[price]</td>
															   	     		   <td>$order_fetch[qty]</td>
															   	     	   </tr>";
															   }
															 ?>
														</tbody>
													</table>

													</div>
												</td>
													
											</tr>
								    <?php }?>
								
							</tbody>
					  </table>


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