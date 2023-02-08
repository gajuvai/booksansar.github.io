<?php require('include/top.inc.php'); ?>

<div class="body__overlay"></div>
        
        <!-- Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Reading is the best for get idea</h2>
                                        <h1>KEEP READING</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="assets/img/1.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Think before you speak</h2>
                                        <h1>Read before you think</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="assets/img/2.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Reading is the best for get idea</h2>
                                        <h1>KEEP READING</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="assets/img/1.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Think before you speak</h2>
                                        <h1>Read before you think</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">See More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="assets/img/2.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->
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
        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Best Seller</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                           <?php
                            $res=mysqli_query($con,"select product.*,categories.categories from product,categories where product.status=1 and categories.status=1 and product.categories_id=categories.id   order by product.id asc limit 4 ");
                            $data=array();
                            while($row=mysqli_fetch_assoc($res)){
                                $data[]=$row;
                            }
                            $get_product=$data;
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
        <!-- End Product Area -->
<?php require('include/footer.inc.php')?>        