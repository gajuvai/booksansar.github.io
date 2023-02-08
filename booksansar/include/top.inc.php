<?php
session_start();
require('connection.inc.php');
require('function.inc.php');
require('add_to_cart.inc.php');

// unset($_SESSION['USER_LOGIN']);
// unset($_SESSION['USER_ID']);
// unset($_SESSION['USER_NAME']);

$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();

while($row=mysqli_fetch_assoc($cat_res)){
    $cat_arr[]=$row;    
}

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Booksansar | ECommerce site</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
    <!-- <div id="loader"></div>
    <script>
      var preloader = document.getElementById('loader');
      function preLoaderHandler(){
          preloader.style.display = 'none';
      }
    </script> -->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="assets/img/logo1.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <li><a href="bookstore.php">BookStore</a></li>
                                        <li class="drop"><a href="">Categories</a>
                                            
                                            <ul class="dropdown">
                                                <?php
                                               foreach($cat_arr as $list){
                                               ?>
                                                   <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                               <?php } ?>
                                            </ul>

                                            
                                        </li> 
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.php">Home</a></li>

                                            <li><a href="bookstore.php">BookStore</a></li>
                                            <li class="drop"><a href="">Categories</a>
                                            
                                                <ul class="dropdown">
                                                    <?php
                                                   foreach($cat_arr as $list){
                                                   ?>
                                                       <li><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
                                                   <?php } ?>
                                                </ul>
                                            </li> 
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    
                                        <?php if(isset($_SESSION['USER_LOGIN'])){

                                            echo '<a href="logout.php">Logout</a>&nbsp;&nbsp; <a href="my_order.php">My Order</a>';
                                        }else{
                                            echo '<a href="login.php">Login/Register</a>';
                                        }
                                        ?>
                                        
                                        <?php 
                                           $count=0;
                                           if(isset($_SESSION['cart'])){
                                            $count=count($_SESSION['cart']);
                                           }
                                           
                                         ?>
                                        <a href="mycart.php" class="btn btn-outline-success">My Cart(<?php echo $count; ?>)</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            
        </header>