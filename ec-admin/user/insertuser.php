<?php

include("../config/dbconnection.php");

if (isset($_POST['submit']))  
{
		$insert = array(
			'name'  => $_POST['name'],
			'emailid' => $_POST['emailid'],
			'role'  => $_POST['role'],

			// used of implode() is to convert the array into string.

			'skills'=> implode(',', $_POST['skill']),	
			'status'=> $_POST['status']		
		);

		$user_model = new User_model();
		$res = $user_model->addUser($insert);
		if ($res == 'success') 
		{
			echo "Success";
		}
		else
		{
			echo "Failed";
		}
}

header("location:list.php");


?>