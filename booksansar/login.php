<?php 
require('include/top.inc.php');

$msg = '';
$msgs = '';
$msgsp = '';
$name = '';
$email = '';
$mobile = '';

if(isset($_POST['login'])){

	$email=get_safe_value($con,$_POST['login_email']);
	$password=get_safe_value($con,$_POST['login_password']);

	$sql="select * from users where email='$email' and password='$password'";
	$res=mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($res);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['USER_LOGIN']='yes';
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];
		?>
		<script>
			window.location.href='index.php';
		</script>
		<?php
	}else{
		$msgl="Please enter correct login details";	
	}
	
}

if(isset($_POST['signup'])){

	$name=get_safe_value($con,$_POST['name']);
	$email=get_safe_value($con,$_POST['email']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$password=get_safe_value($con,$_POST['password']);
	$repassword=get_safe_value($con,$_POST['repassword']);

	$res=mysqli_query($con,"select * from users where email='$email'");
	if(mysqli_num_rows($res) > 0){
		$msgs = "email id already exits try differnt.";
	}else{
		 if($password != $repassword){
    		$msgsp = "Both password doesnot match.";
	    }else{
	    	$sql="insert into users(name,password,email,mobile) values('$name', '$password', '$email', '$mobile')";
			$res=mysqli_query($con,$sql);

			die();
			header('location:login.php');
	    }
	}
}

?>
<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(assets/img/banner-bg.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Login/Register</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        
		<!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form  method="post">
									<span class="field_error"><?php echo $msg; ?></span>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="login_email" placeholder="Your Email*" style="width:100%">
										</div>									
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="login_password"  placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" name="login" class="fv-btn">Login</button>
									</div>
								</form>
							</div>
						</div> 
                
				</div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form  method="post">
									<span class="field_error"><?php echo $msgs; ?></span>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" placeholder="Your Name*" style="width:100%" value="<?php echo
											 $name?>">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" placeholder="Your Email*" style="width:100%" value="<?php echo
											 $email?>">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="mobile" placeholder="Your Mobile*" style="width:100%" value="<?php echo
											 $mobile?>">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="repassword"  placeholder="Your Re-Password*" style="width:100%">
										</div>
										<span class="field_error"> <?php echo $msgsp;?></span>
									</div>
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn" name="signup">Register</button>
									</div>
								</form>
								<div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
					
            </div>
        </section>
<?php require('include/footer.inc.php')?>        