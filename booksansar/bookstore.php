<?php require('include/top.inc.php');
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
                                  <span class="breadcrumb-item active">Book Store</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <div class="container">
            <div class="row">
                <div class="text-center" style="white-space: nowrap; width: 20%;">
                     <form  method="post">
                        <input type="text" name="search" placeholder="Search Books...">
                        <button type="submit" class="btn btn-success" name="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

       <?php 
            $searchBooks='';
            $found=0;
            if(isset($_POST['submit'])){
                $searchBooks = $_POST['search'];
                $get_product=get_product2($con,$searchBooks);
                if(!$get_product){
                }else{
                    foreach($get_product as $list){
                        $qty = $list['qty'];
            ?>
                        <section class="htc__category__area ptb--100">
                            <div class="container">
                                <div class="row">
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
                                </div>
                            </div>
                    </section>
                    <?php $found++;
                    }
                }
                if($found == 0){
                    echo "<div class='alert alert-warning'>
                            <strong>Not Found Book!</strong> You check similar type of books.
                        </div>"; ?>
                        <section class="htc__category__area ptb--100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="section__title--2 text-center">
                                            <h2 class="title__line">Similar Type of Books</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <?php
                                            $get_product=get_product($con,4);
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
                        </section>
                    <!-- End Category Area -->

                       <?php }
                       
                    }?>
         <!-- Start Category Area -->
         <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                           <?php
                            $get_product=get_product($con,4);
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
        </section>
        <!-- End Category Area -->

<?php require('include/footer.inc.php')?>        