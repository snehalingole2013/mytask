<?php

session_start();

if (isset($_SESSION['user'])) 
{
		echo "Successfull Login <br>";
		header("location:../addform.php");
}
else
{
	echo "Please <a href ='login.php'> Login </a>";
 }
;













?>