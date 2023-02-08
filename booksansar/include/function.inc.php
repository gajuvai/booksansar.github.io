<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function searchBook($con,$bookname=''){

	$sql="select product.*,categories.categories from product,categories where product.status=1 and categories.status=1 ";
	if($bookname!=''){
		$sql.=" and product.name=$bookname ";
	}
	// $sql.=" and product.categories_id=categories.id ";
	// $sql.=" order by product.id desc";
	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

function get_product($con,$limit='',$cat_id='',$product_id=''){

	$sql="select product.*,categories.categories from product,categories where product.status=1 and categories.status=1 ";
	if($cat_id!=''){
		$sql.=" and product.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and product.id=$product_id ";
	}
	$sql.=" and product.categories_id=categories.id ";
	$sql.=" order by product.id desc";
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

function get_product2($con,$search=''){

	if($search!=''){

		$sql1="select product.*,categories.categories from product,categories where product.status=1 and categories.status=1 and product.name='$search' ";
	}else{

		$sql1="select product.*,categories.categories from product,categories where product.status=1 and categories.status=1 and product.categories_id=categories.id order by product.id desc";
	}
	
	$res=mysqli_query($con,$sql1);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}
function validateName($name) {
    if (preg_match("/^[a-zA-Z'. -]+$/", $name)) {
        return true;  
    }
    return false;
}

?>