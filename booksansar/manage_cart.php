<?php   
  session_start();
  require('include/connection.inc.php');

  if(isset($_SESSION['USER_LOGIN'])){
  if($_SERVER["REQUEST_METHOD"] == "POST"){

  	if(isset($_POST['Add_To_Cart'])){

  		if(isset($_SESSION['cart'])){
  			$myitems=array_column($_SESSION['cart'], 'item_name');

  			if(in_array($_POST['item_name'], $myitems)){
  				echo "<script>
  				             alert('Book already added on cart');
  				             window.location.href='index.php';
  				       </script>";

  			}else{
  				$count = count($_SESSION['cart']);
	  			$_SESSION['cart'][$count]=array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'qty'=>1);
	  			echo "<script>
	  				    alert('Book added on cart');
	  				    window.location.href='index.php';
	  				  </script>";

  			}
  		}else{
  			$_SESSION['cart'][0]=array('item_name'=>$_POST['item_name'],'price'=>$_POST['price'],'qty'=>1);
  			echo "<script>
  				        alert('Book added on cart');
  				        window.location.href='index.php';
  				 </script>";
  			
  		}
  	}

  	if(isset($_POST['remove_item'])){

  		foreach($_SESSION['cart'] as $key => $value){

  			if($value['item_name'] == $_POST['item_name']){

  				unset($_SESSION['cart'][$key]);
  				$_SESSION['cart']=array_values($_SESSION['cart']);
  				echo "<script>
	  				    alert('Book removed from cart');
	  				    window.location.href='mycart.php';
	  				  </script>";
  			}
  		}
  	}

  	if(isset($_POST['mod_qty'])){
  		foreach($_SESSION['cart'] as $key => $value){

  			if($value['item_name'] == $_POST['item_name']){

         $q = $_SESSION['USER_ID'];
  			 // $product=mysqli_query($con,"select * from product where id = ");
      //    $product_id =mysqli_fetch_assoc($product);
      //    $product_qty = $product_id['qty'];

          // if($_POST['mod_qty'] > $product_qty){
          // 	echo "<script>
					  			// 	alert('Before add to cart you must login');
					  			// 	window.location.href='login.php';
					  		 // </script>";

          // }else{
		  				$_SESSION['cart'][$key]['qty']=$_POST['mod_qty'];
		  				echo "<script>
							  				window.location.href='mycart.php';
			  		         </script>";
	  		  // }
  			}
  	}
  }

  }
}else{
	echo "<script>
	  				alert('Before add to cart you must login');
	  				window.location.href='login.php';
	  		 </script>";
}
?>