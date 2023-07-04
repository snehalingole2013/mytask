<?php

include("dbconn.php");

if (isset($_POST['submit'])) 
{
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$position = $_POST['position'];
	$salary = $_POST['salary'];

	$sql = "INSERT INTO employee(name, email, mobile, position, salary)
			VALUES('$name', '$email', '$mobile', '$position', $salary)";
			echo $sql;

	if ($conn->query($sql) === TRUE) 
	{
		echo "Record inserted Successfully";
	}
	else
	{
		echo "Error : ".$sql. "<br>" .$conn->error;
	}
}

$conn->close();

header("location:list.php");









?>