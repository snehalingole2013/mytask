<?php 
$root_path = $_SERVER['DOCUMENT_ROOT']."/Snehalprog/ec-admin"; 

include ($root_path."/config/dbconnection.php"); 

		//Create class object.
	$cart_model = new Cart_model();

	if(!empty($_POST['cat']) ){

		$data = array('id'=>$_POST['cat']);
		$list =	$cart_model->getProducts($data);

		$return = array(
			'status' =>'success',
			'data' => $list
		);
	}
	else{

		$return = array(
			'status' =>'error',
			'message' => 'Invalid category selected'
		);
	}
echo json_encode($return);
?>