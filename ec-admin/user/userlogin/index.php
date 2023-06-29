<?php

if ($_POST) 
{
	session_start();

	$servername="localhost";
	$username="root";
	$password="";
	$dbname="ecommerce";

	$conn= new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) 
	{
		die("Connection Failed :" . $conn->connect_error);
	}
	else
	{
		$usname = $_POST['username'];
		$psw = $_POST['password'];

		$sql = "SELECT * 
				FROM user
				WHERE emailid='$usname' and password='$psw'";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) 
		{
			$row = $result->fetch_assoc();

			$_SESSION['user'] = array(
									'id'=>$row['id'],
									'name'=>$row['name'],
									'emailid'=>$row['emailid']
									);

			header('location:session.php');
		}
		else
		{
			header('location:login.php');
		}
	}
	

}
else
{
	echo "Invalid data.";
}



?>