<?php

$con=mysqli_connect("localhost","root","","booksanasr");

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/booksansar/');
define('SITE_PATH','http://127.0.0.1/booksansar/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>