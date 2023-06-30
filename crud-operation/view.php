<?php

include("dbconn.php");
?>
<div class="container">
	<a href="addform.php">Add Employee</a>
</div>
<?php

$id = $_GET['id'];

$sql = "SELECT id, name, email, mobile, position, salary 
		FROM employee
		WHERE id = $id";

		echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	echo "<table border =1 cellpadding=10 cellspacing=0><tr>
				<td>Sr.no</td>
				<td>Name</td>
				<td>Email-Id</td>
				<td>Mobile-no</td>
				<td>Position</td>
				<td>Salary</td>
			</tr>";

		while ($row = $result->fetch_assoc()) 
		{
			echo "<tr>
					<td>".$row['id']. "</td>	
					<td>".$row['name']. "</td>	
					<td>".$row['email']. "</td>	
					<td>".$row['mobile']. "</td>	
					<td>".$row['position']. "</td>	
					<td>".$row['salary']. "</td>
				</tr>";	
		}
		echo "</table>";
}

else
{
	echo "0 results";
}
$conn->close();















?>