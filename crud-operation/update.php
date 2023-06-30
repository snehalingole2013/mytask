<?php

include("dbconn.php");

if (isset($_POST['submit'])) 
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$position = $_POST['position'];
	$salary = $_POST['salary'];

	$sql = "UPDATE employee SET name = '$name', email = '$email', mobile = '$mobile',
	        position = '$position', salary = '$salary' 
	        WHERE id = '$id'";

	if ($conn->query($sql) === TRUE) 
	{
		echo "Record Updated Successfully";
	}
	else
	{
		echo "Error : " .$sql. "<br>" . $conn->error;
	}

}	

$conn->close();

header("location:view.php?id=".$_POST['id']);



?>