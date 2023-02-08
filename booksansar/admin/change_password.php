<?php
require('include/top.inc.php');
$msg = '';

if(isset($_POST['submit'])){
	$old_password = $_POST['opass'];
	$new_password = $_POST['npass'];
	$re_password = $_POST['rpass'];
	
	$user=$_SESSION['ADMIN_USERNAME'];
	$sql = "SELECT * FROM admin_users WHERE username='$user'";
    $res = mysqli_query($con, $sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		if($old_password != $count['password']){
			$msg = "Please enter correct old password";	
		}else if($new_password != $re_password){
			$msg = "Re-password doesnot match";
		}else if($old_password == $new_password){
			$msg = "Please enter diffrent password";
		}else{
			$result = mysqli_query($con,"UPDATE admin_users SET password='$new_password' WHERE username='$user'");
		}
	}else{
		$msg ="Please enter correct old password";	
		echo "<script>alert('Password Changed Successfully.'');
				 </script>";
	   echo "<script> window.location.href='index.php';</script>";
	}
}
?>
       <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Change </strong><small>Password</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
								<div class="form-group">
									<label for="categories" class=" form-control-label">Old Password</label>
									<input type="password" name="opass" placeholder="Enter old password" class="form-control" required">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">New Password</label>
									<input type="password" name="npass" placeholder="Enter new password" class="form-control" required">
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Re Enter Password</label>
									<input type="password" name="rpass" placeholder="Enter re-password" class="form-control" required">
								</div>
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('include/footer.inc.php');
?>