<?php
include ("../template/header.php");
?>

<div class="container">
	<h2>Edit User Details</h2>
</div>	

<?php

$id = $_GET['id'];

$user_model = new User_model();

$row = $user_model->getUserById($id);

$user_roles = $user_model->getRoles();

$user_skills = $user_model->getSkills();
// echo "<pre>";
// print_r($user_skills);
// echo "</pre>";

$active = "";
$inactive = "";

if ($row[0]["status"] == "A") 
{
	$active = "checked";
}
else
{
	$inactive = "checked";
}

if ($row)
		{
			// echo "<pre>";
			// print_r($row[0]);
			// echo "<pre>";

			?>
			<form action="update.php" method="POST" class="container">
					<input type="hidden" name="id" value ="<?php echo $row[0]["id"] ?>"><br>
					Name:<input type="text" name="name" value = "<?php echo $row[0]["name"] ?>"></br></br>
					Email Id:<input type="text" name="emailid" value = "<?php echo $row[0]["emailid"] ?>" ></br><br>
					Role:<select id="role" name="role">

						<?php 

							foreach ($user_roles as $role) 
							{
								echo "<option value='" . $role['id'] . "' ".( $row[0]["role"]== $role['id'] ? "Selected" : "" )."  >";
								echo  $role['name'] ;
								echo  "</option>";
							}

						?>
						<!---	<option value="SE" <?php //echo $row[0]["role"]== "SE" ? "Selected" : "" ?> > 
								Software Engineer</option>
						    <option value="SSE" <?php //echo $row[0]["role"]== "SSE" ? "Selected" : "" ?> >
						        Sr. Software Engineer</option>
						    <option value="Mng" <?php //echo $row[0]["role"]== "Mng" ? "Selected" : "" ?> >
						        Manager</option>
						    <option value="HR" <?php //echo $row[0]["role"]== "HR" ? "Selected" : "" ?> >
						    	HR</option>
						    <option value="ST" <?php// echo $row[0]["role"]== "ST" ? "Selected" : "" ?> >
						    	Software Taster</option>
						    <option value="Dev" <?php //echo $row[0]["role"]== "Dev" ? "Selected" : "" ?>  >
						    	Developer</option>   ---->
						</select></br></br>

						<label>Skills</label><br>
						<?php
						 $sk = explode(',', $row[0]['skills']);
							foreach ($user_skills as $skill) 
							{
								$res =  in_array($skill['id'], $sk);
								$checked = $res == true ? 'checked':'';
								echo '<input type="checkbox" name="skill[]" value="' .$skill['id']. '" '.$checked.' >
								<label for="skill">'.$skill['skillname'].'</label><br>'	;					 	
							}
						?>


						<!-- <input type="checkbox" name="skill" value="HTML">
						<label for="skill">HTML</label><br>

						<input type="checkbox" name="skill" value="JAVA">
						<label for="skill">JAVA</label><br>

						<input type="checkbox" name="skill" value="MySQL">
						<label for="skill">MySQL</label> -->
						<br>
					Status:</br>
					<input type="radio" name="status" value = "A"  <?php echo $active ?> > Active 
					<input type="radio" name="status" value = "I" <?php echo $inactive ?> > Inactive</br><br>
					<input type="submit" name="submit" value="Update Product" class="btn btn-success"><br>
					
			</form>
<?php	
		}

?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#i_users").addClass("active");
	});
</script>

<?php
	include("../template/footer.php");

?>