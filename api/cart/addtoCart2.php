<?php
session_start();


$prd = json_decode(file_get_contents('php://input'));

$id = $prd->pid;
$qty = $prd->qty;
$name = $prd->pname;
$price = $prd->pprice;
$img = $prd->pimg;


if(isset($_SESSION["shopping_cart"]))
{
	$is_available = 0;
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		if($_SESSION["shopping_cart"][$keys]['product_id'] == $id)
		{
			$is_available++;
			$_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $qty;
		}
	}
	if($is_available == 0)
	{
		$item_array = array(
			'product_id'               =>     $id,  
			'product_name'             =>     $name,  
			'product_price'            =>     $price,  
			'product_quantity'         =>     $qty,
			'product_image'            =>     $img
		);
		$_SESSION["shopping_cart"][] = $item_array;
	}
}
else
{
	$item_array = array(
		'product_id'               =>     $id,  
		'product_name'             =>     $name,  
		'product_price'            =>     $price,  
		'product_quantity'         =>     $qty,
		'product_image'            =>     $img
	);
	$_SESSION["shopping_cart"][] = $item_array;
	
}
