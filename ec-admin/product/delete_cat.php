<?php

include("../config/dbconnection.php");

$id = $_GET['id'];

$product_model = new Product_model();

$prod = $product_model->getProductsByCategory($id);

// header("content-type:application/json");

if (count($prod) > 0) 
{
	$rslt = array(
		'status'=>"success",
		'message'=>"This Category has assign a product",
	);
}
else
{
	$del = $product_model->deleteCategory($id);

	if ($del == true) 
	{
		$rslt = array(
				'status'=>"success",
				'message'=>"Record deleted<br> succesfully",
			);		
	}
	else
	{
		$rslt = array(
				'status'=>"error",
				'message'=>$del,
		);
	}
}
echo json_encode($rslt);




















?>