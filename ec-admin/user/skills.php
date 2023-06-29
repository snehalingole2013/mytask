<?php
include ("../template/header.php");
?>

<div class="container">
	<h2>Skills</h2>
</div>	
<?php 

$user_model = new User_model();
$user_skills = $user_model->getSkills();

?>
<div class="container">
<div class="row">
	<?php foreach ($user_skills as $sk) { ?>
			<!-- $sk['id']  $sk['id']   $sk['skillname'] ; -->
			<div class="col-2 border m-1 p-1 edit_skill" data-edit="true" data-skill="<?php echo $sk['skillname']; ?>" data-id="<?php echo $sk['id']; ?>">
				<?php echo $sk['skillname']; ?>
			</div>
	<?php } ?>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".edit_skill").click(function(){
console.log('edit');
			if($(this).attr("data-edit")=="true"){
			
				var skill = $(this).attr("data-skill");
				var str = '<input type="text" style="width:80%" value="'+skill+'">';
					 str += '<i class="update_skill fas fa-save ml-3 bg-success" ></i>';

				$(this).html(str); // write html string in give selector	
				$(this).attr("data-edit","false"); // set value of attriabute			

				$( ".update_skill" ).bind( "click", function(e) {

					if($(this).parent().attr("data-edit")=="false"){
						console.log('save clicked');
						
						var skill = $(this).parent().find("input").val();
						var id = $(this).parent().attr("data-id");
						var data = {
							skill_nm: skill,
							skillid:id
						};

						//Asynchronus javascript XML
						$.ajax({
							"url":"<?php echo PROJECT_URL ?>/user/updateSkill.php",
							"type":"POST",
							"data":data,
							"dataType":"json",//text , html, xml
							"success": function(res){
								console.log(res);
								if(res.status=='success'){
									alert(res.message);
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

						// html(skill) write the value in attribute data-name from input.
						$(this).parent().html(skill).attr("data-edit","true").attr("data-skill", skill);
						e.stopPropagation();
					}


				});
			}
		});


	});
</script>

<?php
	include("../template/footer.php");

?>