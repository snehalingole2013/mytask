<?php

include("dbconn.php");

$id = $_GET['id'];

$sql = "SELECT id,name, email, mobile, position, salary 
		FROM employee
		WHERE id = $id";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	$row = $result->fetch_assoc();
?>
		<form action="update.php" method="POST" class="container">
			 <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>
			Name:- <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
			Email Id:- <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
			Mobile Number:-<input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"><br>
			Position:- <input type="text" name="position" value="<?php echo $row['position']; ?>"><br>
			Salary:- <input type="text" name="salary" value="<?php echo $row['salary']; ?>"><br>
			<input type="submit" name="submit" value="Update Info">
		</form>

<?php
}
else
{
	echo "0 results";
}
$conn->close();


?>