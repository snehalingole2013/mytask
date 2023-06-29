<?php

include ("../config/dbconnection.php");	

//print_r($_POST);
if ($_POST['name']) 
{
	$insert = array(
		'category'		=> $_POST['name'],
	);

	$product_model = new Product_model();
	$add = $product_model->addCategory($insert);

	if ($add == 'success') 
	{
		$rs = array(
				'status'=>"success",
				'message'=>"Record Added",
			);	
	}
	else
	{
		$rs = array(
				'status'=>"error",
				'message'=>"Failed",
			);	

	}

}

echo json_encode($rs);


?>