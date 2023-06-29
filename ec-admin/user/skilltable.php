<?php
include("../template/header.php");
?>

<div class="container">
	<h2 class="text-center">Skills</h2>	
	<button type="button" data-name="<?php echo $row['category']; ?>" 
			data-id="<?php echo $row['id']; ?>" class="btn btn-sm btn-primary add_cat pull-right" 
			data-toggle="modal" data-target="#myModal2">Add New Skill</button>
</div>

<?php  
echo "<br><br>";

$user_model = new User_model();
$user_skills = $user_model->getSkills();

if ($user_skills) 
{
	?>

	<div class="container">
		<table class="table table-striped table-bordered"><tr>
			<th width="40px">Sr No.</th>
			<th>Skills</th>
			<th colspan="2">Action</th>
		</tr>

		<?php
		$i = 0;
		foreach ($user_skills as $index => $row) 
		{
		?>
			<tr id="row-<?php echo $row['id']; ?>">
				<td><?php echo (++$index); ?></td>
				<td class="skill_Name"><?php echo $row['skillname']; ?></td>
				<td>
					<button type="button" data-name="<?php echo $row['skillname']; ?>" 
							data-id="<?php echo $row['id']; ?>" class="btn btn-sm btn-primary edit_skill">
						  <i class="fas fa-edit"></i>
					</button>
				</td>
				<td>
					<button type="button" data-id="<?php echo $row['id']; ?>" 
						class="btn btn-sm btn-success save_skill">
						  <i class="fas fa-save"></i>
					</button>
				</td>
		</tr>

		<?php
		}
		?>
			
		</table>
		
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".edit_skill").click(function(){
			var skill = $(this).attr("data-name");
			var id = $(this).attr("data-id");
			var str = '<input type="text" value="'+skill+'">';
			$(this).parents("tr").find(".skill_Name").html(str);			
		});

		$(".save_skill").click(function(){
			var sk = $(this).parents("tr").find("input").val();
			var sk_id = $(this).attr("data-id");

			var data = {
							"skill_nm": sk,
							"skillid":sk_id
						};
						console.log(data);


		$.ajax({
					"url":"<?php echo PROJECT_URL ?>/user/updateSkill.php",
					"type":"POST",
					"data":data,
					"dataType":"json",//text , html, xml
					"success": function(res){
						console.log(res);
						if(res.status=='success'){
							alert(res.message);
							$("#row-"+sk_id).find(".skill_Name").text(sk);	
							 $("#row-"+sk_id).find(".edit_skill").attr("data-name", sk);

						}
						else{
							alert(res.message);
						}

					},
					"error": function(jqXHR, exception){
						console.log("Error function");
					},
					"complete": function(data){
						console.log(data);
						console.log("Complete function");
					}

				});

		});
	});
</script>
<?php	
}
else
{
	echo "0 results";
}
?>
