<?php
// function pr($arr){
// 	echo '<pre>';
// 	print_r($arr);
// }

// function prx($arr){
// 	echo '<pre>';
// 	print_r($arr);
// 	die();
// }

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function validatePrice($price) {
    if (preg_match("/^[0-9]+(\.[0-9]{2})?$/", $price)) {
        return true;  
    }
    return false;
}
function validateName($name) {
    if (preg_match("/^[a-zA-Z'. -]+$/", $name)) {
        return true;  
    }
    return false;
}
?>