<?php

include ("../template/header.php");	

$id = $_GET['id'];

$product_model = new Product_model();

$del = $product_model->deleteProduct($id);


header("location:selectprod.php");


?>