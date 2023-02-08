<?php 
   require('include/top.inc.php');

?>

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(assets/img/delivery-banner.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.php">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">My Cart</span>
                             </nav>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
 <!-- End Bradcaump area -->
 <!-- cart-main-area start -->
 <h1 class="text-center">My all Orders</h1>
 <div class="wishlist-area ptb--100 bg__white">
     <div class="container">
         <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wishlist-content">
                   <form action="#">
                       <div class="wishlist-table table-responsive">
                           <table>
                               <thead>
                                   <tr>
                                       <th class="product-thumbnail">Order No</th>
                                       <th class="product-price">Date</th>
                                       <th class="product-price">Payment Status</th>
                                       <th class="product-thumbnail">Book Name</th>
                                       <th class="product-name">Amount</th>
                                   </tr>
                               </thead>
                               <tbody>
                                       <?php 
                                            $uid = $_SESSION['USER_ID'];
                                            $sql = "select * from order_manager where user_id=$uid";
                                            $res = mysqli_query($con, $sql);
                                            while($row=mysqli_fetch_assoc($res)){
                                                   echo "<tr>
                                                        <td> $row[id] </td>
                                                        <td> $row[date_on] </td>";
                                                        $status = $row['Payment'];
                                                        if($status == 1){
                                                            echo "<td>Amount Paid</td>";
                                                        }else{
                                                            echo "<td>Amount Due</td>";
                                                        }
                                                        $res1=mysqli_query($con, "select * from order_detail where order_id=$row[id]");
                                                        $i = 0;
                                                        while($row1=mysqli_fetch_assoc($res1)){
                                                            if($i>0){
                                                                echo "<tr>
                                                                    <td> $row[id] </td>
                                                                    <td> $row[date_on] </td>";
                                                                        $status = $row['Payment'];
                                                                        if($status == 1){
                                                                            echo "<td>Amount Paid</td>";
                                                                        }else{
                                                                            echo "<td>Amount Due</td>";
                                                                        }
                                                              }
                                                            $total = $row1['price']*$row1['qty'];
                                                            echo "<td> $row1[name] </td>
                                                                  <td>Rs.$total</td>";
                                                                  $i++;
                                                        }?>
                                                    </tr>
                                            <?php } ?>  
                               </tbody>
                           </table>
                       </div>  
                   </form>
               </div>
            </div>
         </div>
     </div>
 </div>
 
 						
<?php require('include/footer.inc.php')?>        