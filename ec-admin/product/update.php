<?php

include("../config/dbconnection.php");
session_start();

if (isset($_POST['submit'])) 
{

	$update = array (
					'price' => $_POST['price'],
					'name' => $_POST['name'],
					'quantity' => $_POST['quantity'],
					'status' => $_POST['status'],
					'category_id' => $_POST['category'],
				);
	//$image = "";

	if (!empty($_FILES['fileToUpload']['name'])) 
	{
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], 'fileuploads/'.($_FILES['fileToUpload']['name']));
		$update['image'] = $_FILES['fileToUpload']['name'];
	}
	$where = array(
					'id' => $_POST['id']
	);

	$product_model = new Product_model();

	$up = $product_model->updateProduct($update, $where);

	if($up===true)
	{
		$_SESSION['success_msg'] = "Product updated succesfully";
	}
	else
	{
		$_SESSION['error_msg'] = $up;
	}
}

header("location:view.php?id=".$_POST['id']);

//conn->close();

?>