<?php
include("Common_model.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script type="text/javascript" src="jquery-3.6.1.min.js"></script>
</head>
<body>
	<?php
	$common_model = new Common_model();
	$state = $common_model->getStates();

 ?>
		<div class="col">
			<label>State:-</label>
				<select id="stateId">
					<option value="">Select State</option>
					<?php 
					foreach ($state as $value) 
					{
						echo '<option value='. $value['id'] . '>' . $value['name'] .'</option>';
					}
					?>
				</select><br><br>	
		</div>
		<div class="col">
			<label>City</label>
			<select id="city_list">
				<option value="">Select State</option>	
			</select>
		</div>

		<p id="error_msg" style="color:red"></p>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#stateId').change(function(){
					var st = $(this).val();
					var datastring = 'id='+st;
					console.log(st);
					$.ajax({
						url:"getcities.php",
						data:{"state": st},
						type:"POST",
						dataType:"json",
						success:function(res){
							console.log(res);
							if (res.status='success') {
								html_str="";
								if (res.data.length>0) {
									html_str ="<select><option>Select City</option>"
									$.each(res.data,function(key,value){
										html_str+='\
										<option value="">'+value.name+'</option>';
									});
									html_str+="</select>";
								}else{
									html_str="no cities found";
								}
								$('#city_list').html(html_str);
							}
							else{
								$('#error_msg').html(res.message);
							}

						}//success close
					});//ajax close
				});
			});
		</script>

			
</body>
</html>