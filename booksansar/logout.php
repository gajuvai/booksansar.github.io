<?php
    session_start();
	// require('include/connection.inc.php');
	// require('include/function.inc.php');

	unset($_SESSION['USER_LOGIN']);
	unset($_SESSION['cart']);
	unset($_SESSION['USER_ID']);
	unset($_SESSION['USER_NAME']);
	
	header('location:index.php');
	
?>