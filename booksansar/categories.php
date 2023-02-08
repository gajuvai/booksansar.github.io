<?php 
require('include/top.inc.php');
if(isset($_GET['id']) && $_GET['id']!=''){
	$cat_id=mysqli_real_escape_string($con,$_GET['id']);
	if($cat_id>0){
		$get_product=get_product($con,'',$cat_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>
<div class="body__overlay"></div>
        
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(assets/img/banner.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
					<?php if(count($get_product)>0){?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                           
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <?php
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
                            </div>
                        </div>
                    </div>
					<?php } else { 
						echo "Data not found";
					} ?>
                
				</div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- End Banner Area -->
<?php require('include/footer.inc.php')?>        