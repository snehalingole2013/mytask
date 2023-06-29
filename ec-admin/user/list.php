<?php

include ("../template/header.php");	
?>

<div class="container">
<a href = 'addform.php' class="btn btn-info"> Add New User </a>	
</div>

<?php

echo "<br><br>";

$user_model = new User_model();
$result = $user_model->getUser();

if ($result) 
{
	?>
	<div class="container">
	<table class="table table-striped table-bordered"><tr>
		  		<th>Id</th>
		  		<th>Name</th>
		  		<th>Email Id</th>
		  		<th>Role</th>
		  		<th>Status</th>
		  		<th colspan = 3>Action</th>
				</tr>
<?php
				//output data of each row
				$i = 0;
				foreach ($result as $key => $row) 
				{
					echo "<tr>
							<td>" . ++$i . "</td>
							<td>" . $row["name"] . "</td>
							<td>" . $row["emailid"] . "</td>
							<td>" . $row["role_name"] . "</td>
							<td>" . ($row["status"]== "A" ? "Active" : "Inactive") . "</td>
							<td><a href = 'edit.php?id=" . $row["id"] . "' > Edit </td>
							<td><a href = 'view.php?id=" . $row["id"] . "' > View </td>
							<td><a href = 'delete.php?id=" . $row["id"] . "' > Delete </td>
							</tr>";
				}
	echo "</table>";
	echo "</div>";
}
else
{
	echo "0 result";
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#i_users").addClass("active");
	});
</script>

<?php
include '../template/footer.php';



?>