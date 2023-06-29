<?php

 include ("../template/header.php");

?>

<div class="container">
 	<h1>User Details</h1>	
</div> 

<?php
$id = $_GET['id'];

$user_model = new User_model();

$row = $user_model->getUserById($id);

if ($row) 
{ ?>
	<div class="container">

		<p>Name:- <?php echo $row[0]['name'] ?> </p>
		<p>Email Id:- <?php echo $row[0]['emailid'] ?> </p>
		<p>Role:- <?php echo $row[0]['role'] ?> </p>
		<p>Skills :- 
			<?php 
			echo $row[0]['u_skills'];

		 ?> </p>
		<p>Status:- <?php echo $row[0]['status']== "A" ? "Active" : "Inactive" ?>  </p>
		
		<a href = 'edit.php?id=<?php echo $row[0]['id'] ?>' class="btn btn-success"> Edit </a>
	
	</div>

<?php
}

else
{
	echo "0 results";
}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#i_users").addClass("active");
	});
</script>

<?php
 include "../template/footer.php"; 

?>