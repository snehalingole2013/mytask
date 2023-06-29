<?php 
include ("../template/header.php"); 

// if (!isset($_SESSION['user'])) 
// {
// 	header('location:'.PROJECT_URL.'/user/userlogin/login.php');
// } 
?>	

<section class="my-2">
	<div class="">
		<h2 class="text-center">Create New User</h2>
	</div>

	<div class="w-50 m-auto">
		<form action="insertuser.php" method="POST" id="f_adduser">
			<div class="form-group">
				<label>Name :-</label>
				<input type="text" name="name" class="form-control" id="user_Name">
				<span id="user_n" style="color:red;"></span>
			</div>
			<div class="form-group">
				<label>Email Id :-</label>		
				<input type="text" name="emailid" class="form-control" id="user_email">
				<span id="user_eid" style="color:red;"></span>	
			</div>

			<?php 
			$user_model = new User_model();

			$user_roles = $user_model->getRoles();
			$user_skills = $user_model->getSkills();

			// print_r($result);

			?>
			<label>Role :-</label>
			<select id="role" name="role">
			    <option value="">Select Role</option>
				<?php 
				foreach ($user_roles as $role) 
				{
			        echo '<option value=' . $role['id'] . '>' . $role['name'] . ' </option>';
				}
				?>		    
			</select>
			<span id="user_role" style="color:red;"></span><br>

			<label>Skills :-</label>
			<div class="form-check">
				<?php
					foreach ($user_skills as $skill) 
					{ ?>
						<label for="skill[]" class="form-check-label col-3">
							<input type="checkbox" class="form-check-input usr_sk" name="skill[]"  
									value="<?php echo $skill['id']?>" >
									<?php echo $skill['skillname']?></label>
									
			<?php	} ?>
			<span id="user_s" style="color:red;"></span>
										
			</div><br>

			<label>Status :-</label>
			<div class="form-check">
				<label class="form-check-label" for="radio1">
					<input type="radio" name="status" value="A" class="form-check-input" id="radio1">Active		
				</label>	
			</div>
			<div class="form-check">
				<label class="form-check-label" for="radio2">
					<input type="radio" name="status" value="I" class="form-check-input" id="radio2">Inactive<br><br>
				</label>	
			</div>
			
			<input type="submit" name="submit" value="Add User" class="btn btn-success">
		
			
		</form>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$("#i_users").addClass("active");

		$("#f_adduser").submit(function(){
			$('#user_n').text("");//to set the empty value in input
			$('#user_eid').text("");
			$('#user_role').text("");
			$('#user_s').text("");

			// value read from input using val()
			var n = $("#user_Name").val();
			// console.log(n);
			if(n=="")
			{
				$('#user_n').text("Please fill name field");
				return false;
			}
			var email = $("#user_email").val();
			// console.log(email);
			var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if (email=="" || !pattern.test(email)) 
			{
				$("#user_eid").text("Please fill valid Email-Id");
				return false;
			} 
			var user_role = $("#role").val();
			// console.log(user_role);
			if(user_role =="")
			{
				$("#user_role").text("Please select Role");
				return false;
			}
			var sk_checked = false; 

			$(".usr_sk").each(function(key, ele){
				if( $(ele).prop("checked") ){
					sk_checked = true;
				}
			})
			if(sk_checked==false){
				$('#user_s').text("Please Select at least one Skill");
				return false;
			}

		});
	});
</script>
<?php include "../template/footer.php"; ?>
</body>
</html>