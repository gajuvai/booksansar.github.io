<?php 
require('include/top.inc.php');
 if(isset($_SESSION['cart'])){
        $count=count($_SESSION['cart']);
  }
   if($count==0){
        echo "<script>
                alert('Cart is empty.');
                window.location.href='index.php';
               </script>";
    }

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
                                <span class="breadcrumb-item active">My Cart</span>
                             </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    	<div class="row">
    		<div class="col-lg-12 text-center  my-5">
    			<h1>MY CART</h1>
    		</div>
    		<div class="col-lg-9">
    			<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">s.n</th>
				      <th scope="col">Book Name</th>
				      <th scope="col">Price</th>
				      <th scope="col">Quantity</th>
				      <th scope="col">Total</th>
				      <th scope="col"></th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  	    if(isset($_SESSION['cart'])){
					  	    foreach($_SESSION['cart'] as $key => $value){
					  	    	$sn = $key +1;
					  	    	echo "<tr>
					  	    	          <td>$sn</td>
						  	    	      <td>$value[item_name]</td>
						  	    	      <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
						  	    	      <td>
						  	    	         <form action='manage_cart.php' method='POST'>
						  	    	      		<input class='text-center iqty' name='mod_qty' onchange='this.form.submit();' type='number' value='$value[qty]' min='1' max='10'>
						  	    	      		<input type='hidden' name='item_name' value='$value[item_name]'>
						  	    	      	 </form>
						  	    	      </td>
						  	    	      <td class='itotal'><td>
						  	    	      <td>
						  	    	      <form action='manage_cart.php' method='POST'>
						  	    	          <button class='btn btn-sm btn-danger' name='remove_item'>REMOVE</button>
						  	    	          <input type='hidden' name='item_name' value='$value[item_name]'>
						  	    	      </form>
						  	    	      </td>
					  	    	      </tr>";
					  	          }
				         	}
				         	?>
				  </tbody>
				</table>
    			
    		</div>
    		<div class="col-lg-3">
    			<div class="border bg-light rounded p-4">
    				<h5 >Grand Total = Rs.<span id="gtotal"></span></h5><br>
    			    <form action="purchase.php?gtotal=gtotal" method="POST">

    			    	<div class="from-group">
    			    		<label>Phone Number</label>
    			    		<input type="number" name='phone' class="form-control" required>
    			    	</div>
    			    	<div class="from-group">
    			    		<label>Full Address</label>
    			    		<input type="text" name='address' class="form-control" required>
    			    	</div>
    			    	<div class="from-group">
    			    		<label>Zip/Post Code</label>
    			    		<input type="number" name='zipcode' class="form-control" required>
    			    	</div><br>

	    			    <div class="form-check">
						  <input class="form-check-input" type="radio" name="pay_mod" value="COD" checked>
						  <label class="form-check-label" for="flexRadioDefault1">Cash on Delivery</label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" disabled>
						  <label class="form-check-label" for="flexRadioDefault2">Credit Card</label>
						</div>

    			    	<button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
    			    </form>
    			</div>
    		</div>
    	</div>
    </div><br><br>
    <script>
    	
    	var gt=0;
    	var iprice = document.getElementsByClassName('iprice');
    	var iqty = document.getElementsByClassName('iqty');
    	var itotal = document.getElementsByClassName('itotal');
    	var gtotal = document.getElementById('gtotal');

    	function subTotal(){
    		gt=0;
    		for(i=0; i<iprice.length;i++){

    			itotal[i].innerText=(iprice[i].value)*(iqty[i].value);

    			gt=gt+(iprice[i].value)*(iqty[i].value);
    		}
    		gtotal.innerText=gt;
    	}

    	subTotal();
    </script>


  <?php require('include/footer.inc.php'); ?>    
