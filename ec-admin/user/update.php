<?php

include ("../template/header.php");


if (isset($_POST['submit'])) 
{
	$data = array (
					'name' => $_POST['name'],
					'emailid' => $_POST['emailid'],
					'role' => $_POST['role'],
					'skills' => isset($_POST['skill']) ? implode(',', $_POST['skill']) : '',
					'status' => $_POST['status']
				);
	$where = array (
						'id' => $_POST['id']
						// 'role' => 5,
					);

				// print_r($data);

				$user_model = new User_model();
				$up = $user_model->updateUser($data, $where);
				$sk = $user_model->getSkills();
			
}

header("location:view.php?id=".$_POST['id']);

?>