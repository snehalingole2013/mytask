<?php

session_start();
include("../config/dbconnection.php");	

if (isset($_POST['skill_nm'])) 
{
	$save = array(
					'skillname' => $_POST['skill_nm']
	);

	$where = array(
					'id' => $_POST['skillid']
	);
	//print_r($_POST);
	//exit();

	$user_model = new User_model();
	$update = $user_model->updateSkills($save, $where);

	if($update == true)
	{
		$res = array(
			'status'=>"success",
			'message'=>"Record updated succesfully",
		);
	}
	else
	{
		$res = array(
			'status'=>"error",
			'message'=>$update,
		);
	}
}


echo json_encode($res);


























?>