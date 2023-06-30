<?php
include("config/dbconn.php");

if (isset($_POST['submit'])) 
{
	$data = array(
			'name' => $_POST['name'],
			'items' => $_POST['items'],
			'quantity' => $_POST['quantity'],
			'status' => $_POST['status'],
			'price' => $_POST['price'],
			'GST' => $_POST['GST'],
			'total_price' => $_POST['total_price'],
	);

	$where = array(
				'id' => $_POST['id']
	);

	$customer_model = new Customer_model();
	$up = $customer_model->updateCustomer($data, $where);
}

header("location:view.php?id=".$_POST['id']);
















?>