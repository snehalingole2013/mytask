<?php

include("Common_model.php");

$common_model = new Common_model();

if (!empty($_POST['state'])) 
{
	$data = array('id'=>$_POST['state']);
	$list = $common_model->getCities($data);

	$return = array(
				'status'=>"success",
				'data'=>$list
	);
}
else
{
	$return = array(
				'status'=>'error',
				'message'=>'Invalid city list'
	);
}
echo json_encode($return);









?>