<?php 
include ("../template/header.php");
?>

<div class="container-fluid">
	<div class="container">
		<h3>Product Categories</h3>
		<button type="button" data-name="<?php echo $row['category']; ?>" 
			data-id="<?php echo $row['id']; ?>" class="btn btn-sm btn-primary add_cat pull-right" 
			data-toggle="modal" data-target="#myModal2">Add New Category</button>
	</div>

<?php
$product_model = new Product_model();
$result = $product_model->getCatagories();
 
if ($result) 
{
?>
	<div class="container">
		<table class="table table-striped table-bordered">
		<tr>
			<th>Sr.no.</th>
			<th>Category</th>
			<th>Total</th>
			<th colspan="2">Action</th>
		</tr>
			
		<?php 
		$i =0;
		foreach($result as $index => $row)
		{
		?>
			<tr id="row-<?php echo $row['id']; ?>"> 
				<td><?php echo (++$index);?> </td>
				<td class="cat_name"><?php echo $row['category']; ?></td>
				<td class="cat_name"><?php echo $row['total']; ?></td>
				<td>
					<button type="button" data-name="<?php echo $row['category']; ?>" 
						data-id="<?php echo $row['id']; ?>" class="btn btn-sm btn-primary edit_cat" 
						data-toggle="modal" data-target="#myModal">
					  <i class="fas fa-edit"></i>
					</button>
				</td>
				<td>
					<button type="button" data-name="<?php echo $row['category']; ?>"
						data-id="<?php echo $row['id']; ?>"	 
						 class="btn btn-sm btn-danger delete_cat">
					  <i class="fas fa-trash"></i>
					</button>
				</td>
			</tr>
		<?php
		} 

		?>		
		</table>
		
	</div>
  
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">       
      		<div class="form-group">
      			<label for="category_name">Category Name</label>
      			<input type="text" class="form-control" name="category_name" id="category_name" placeholder="">
      			<input type="hidden" class="form-control" name="cat_id" id="cat_id" placeholder="">
      		</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="update_cat" >Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<?php
}
?> 
</div>

<!-- The Modal -->
<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">       
      		<div class="form-group">
      			<label for="category_name">Category Name</label>
      			<input type="text" class="form-control" id="cat_name" placeholder="">
       		</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="save_cat" name="add" >Add</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
	
<script type="text/javascript">
	$(document).ready(function(){
		$(".edit_cat").click(function() {
			//read value from attribute
			var cat = $(this).attr("data-name");  
			var id = $(this).attr("data-id");  
			//other way to get text $(this).parents("tr").find(".cat_name").text()

			//set value in modal input
			$("#category_name").val( cat );
			$("#cat_id").val( id );
		});

		$("#update_cat").click(function(){
			//to get value entered in the input
			var new_cat = $("#category_name").val();
			var id = $("#cat_id").val()

			//Associative array means object in javascript.
			//created object to send data for to pass the data.
			var data = {
				"name": new_cat,
				"id":id
			};
			// console.log(data);
			//Asynchronus javascript XML
			$.ajax({
				"url":"<?php echo PROJECT_URL ?>/product/update_category.php",
				"type":"POST",
				"data":data,
				// "dataType":"json",//text , html, xml
				"success": function(res){
					console.log(res);
					//to convert JSON string into javascript Object
					var result = JSON.parse(res);
					if(result.status=='success'){
						alert(result.message);
						$("#myModal").modal("hide");
					}
					else{
						alert(result.message);
					}

					// console.log( res);
					// console.log(typeof res);
					// console.log( result);
					// console.log(typeof result);
					// console.log( result.message);
					// console.log("result recieved");

				},
				"error": function(jqXHR, exception){
					console.log(jqXHR);
					console.log(exception);
					console.log("Error function");
				},
				"complete": function(data){
					console.log(data);
					console.log("Complete function");

				}

			});

		});

			$(".delete_cat").click(function(){
				//read value from attribute
				var id_cat = $(this).attr("data-id");
				var dta = {
					"id":id_cat
				};

				$.ajax({
					"url":"<?php echo PROJECT_URL ?>/product/delete_cat.php",
					"type":"GET",
					"data":dta,
					"success":function(dele){
						console.log(dele);
						var rslt = JSON.parse(dele);

						if (rslt.status == "success") 
						{
							console.log("#row-"+id_cat);
							$("#row-"+id_cat).remove();
			
							alert(rslt.message);
						}
						else
						{
							alert(rslt.message);
						}
					},

					"error": function(jqXHR, exception){
						console.log(jqXHR);
						console.log(exception);
						console.log("Error function");
					},
					"complete": function(data){
						console.log(data);
						console.log("Complete function");
					}

				});


			});


			console.log('end');
	

/*
			// array defination. Indexed array
			var jsarr = ["snehal", "vijay", "1", 2, "4"];
			console.log(jsarr[2]);

			//Assosiative array i.e. Named index array
			//but in javascript it is called "object"

			var obj = {
				"name":"vijay",
				"mobile":8796,
				"favnumber":"3",
				"age":32,
				"skills":["PHP","JS","HTML"],
				"address":{
						"city":"Pune"
					},
			};

			//accesssing the object values
			console.log(obj.name);
			console.log(obj['age']);
			console.log(obj.skills);
			console.log(obj.favnumber);

*/

			$('#save_cat').click(function(){
				//to get the value enetred in the input.

				var category = $("#cat_name").val();

			    var d = {
				"name": category
				};
				console.log(d);

				$.ajax({
				"url":"<?php echo PROJECT_URL ?>/product/insertcategory.php",
				"type":"POST",
				"data":d,
				"success":function(add){

					var res = JSON.parse(add);
					if(res.status=='success'){
						alert(res.message);
					}
					else{
						alert(res.message);
					} 

				}

				});//End of AJAX

		});//End of click function

			$("#i_category").addClass("active");


});


</script>