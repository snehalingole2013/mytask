<?php

session_start();
include("../config/dbconnection.php");	

if (isset($_POST['name'])) 
{

	$update = array ( 
					'category' => $_POST['name'],
				);

	$where = array(
		"id" => $_POST['id']
	);

	$product_model = new Product_model();
	$up = $product_model->updateCategory($update, $where );
	
	if($up==true)
	{
		$result = array(
			'status'=>"success",
			'message'=>"Record updated succesfully",
		);		
	}
	else
	{
		$result = array(
			'status'=>"error",
			'message'=>$up,
		);
	}
}

//conn->close();

echo json_encode($result);


?>