<?php 
   require('include/top.inc.php');

    // if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){

    // }else{
    //     header('location:login.php');
    //     die();
    // }

?>

 <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(assets/img/banner-bg.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">SNo.</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php 
                                             if(isset($_GET['submit'])){
                                                                        $value = $_GET['qty'];
                                                                    }
                                            $bill = 0;
                                            $sno = 1;
                                            foreach($_SESSION as $product){
                                              echo "<tr>";
                                                       $p = 0;
                                                       $q = 0;
                                                       echo "<td></td>"; 
                                                       foreach($product as $key => $value){
                                                         if($key == 2){
                                                            echo "<td class=product-quantity'><input type='number' name='qty' value='".$value."'/>
                                                                   <br/><a href='cart.php?id='$value'>update</a></td>";
                                                            $q = $value;
                                                         }else if($key == 1){
                                                            echo"<td class='product-price'>Rs. $value</td>";
                                                            $p = $value;
                                                         }else if($key == 0){
                                                            echo "<td class='product-name'>$value</td>";
                                                         }
                                                       }
                                                    $bill = $q * $p;
                                                    echo "<td>Rs.".$bill."</td>";
                                                    echo"<td class='product-remove'><a href='#'><i class='icon-trash icons'></i></a></td>";
                                                    echo "</tr>";  
                                            }
                                         ?> 
                                        <!--  <tr>
                                                <td class="product-thumbnail"><a href="#"><img src=""/></a></td>
                                                <td class="product-name"><a href="#"></a></td>
                                                <td class="product-price"><span class="amount"></span></td>
                                                <td class="product-quantity"><input type="number" id="#" />
                                                <br/><a href="#">update</a></td>
                                                <td class="product-subtotal"></td>
                                                <td class="product-remove"><a href="#"><i class="icon-trash icons"></i></a></td>
                                            </tr>  -->
				
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="<?php echo SITE_PATH?>">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="#">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        										
<?php 
  require('include/footer.inc.php');
?>        