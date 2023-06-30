<?php
include("config/dbconn.php");

if (isset($_POST['submit'])) 
{
	$insert = array(
				'name' => $_POST['name'],
				'items' => $_POST['items'],
				'quantity' => $_POST['quantity'],
				'status' => $_POST['status'],
				'price' => $_POST['price'],
				'GST' => $_POST['GST'],
				'total_price' => $_POST['total_price']
			);

	$customer_model = new Customer_model();
	$result = $customer_model->addCustomer($insert);

	if ($result == 'success') 
	{
		echo "Success";
	}
	else
	{
		echo "Failed";
	}
}
else
{
	echo "Invalid Form Data";
}

 header("location:list.php");


















?>