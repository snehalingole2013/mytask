<?php 
include ("../template/header.php");

?>	

<section class="my-5">
	<div class="py-5">
		<h2 class="text-center">Add New Product</h2>
	</div> 

	<div class="w-50 m-auto">
		<form action="insertprod.php" method="POST" enctype="multipart/form-data" id="f_addproduct">
			<div class="form-group">
				<label>Name <span class="text-danger">*</span> :</label>
				<input type="text" name="name" class="form-control" id="prod_name" >
				<span id="prod_n" style="color:red;"></span>		
			</div>
			<div class="form-group">
				<label>Quantity <span class="text-danger">*</span>  :</label>
				<input type="number" name="quantity" class="form-control" id="prod_quantity">
				<span id="prod_qerror" style="color:red;"></span>
			</div>
			<div class="form-group">
				<label>Price <span class="text-danger">*</span>  :</label>
				<input type="number" name="price" class="form-control" id="prod_price">
				<span id="prod_priceerror" style="color:red;"></span>
			</div>

			<label>Status :</label><br>
			<div class="form-check">
				<label class="form-check-label" for="radio1"> 
				<input type="radio" name="status" value="A" checked class="form-check-input" id="radio1">Active
				</label>	
			</div>
			<div class="form-check">
				<label class="form-check-label" for="radio2">
				<input type="radio" name="status" value="I" class="form-check-input" id="radio2">Inactive
				</label>
			</div><br>			

			<?php 
			$product_model = new Product_model();
			$prod_cate = $product_model->getCatagories();
			?>
			<label>Categories :</label>
			<select id="category" name="category" >
				<option value="">Select Category</option>
				<?php
				foreach ($prod_cate as $category) 
				{
					echo "<option value=" .$category['id']. ">" .$category['category']. "</option>";
				}
				?>
			</select>
				<span id="category_error" style="color:red;"></span>

			<div class="form-group">
				<label>Image :</label>
				<input type="file" name="fileToUpload" size=10 id="fileToUpload">
				<span id="prodfile_error" style="color:red;"></span>
			</div>
			
			<input type="submit" name="submit" value="Add Product" class="btn btn-success">
		</form>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$("#i_product").addClass("active");

		$("#f_addproduct").submit(function(){

			// return true;
			$('#prod_n').text("");//to set the empty value in input
			$("#prod_qerror").text("");
			$("#prod_priceerror").text("");
			$("#category_error").text('');
			$("#prodfile_error").text('');


			//value read from input using val()
			var n = $("#prod_name").val();
			// console.log(n);
			if (n=='') 
			{
				$('#prod_n').text("Please fill field name");
				return false;
			}
			var quantity = parseInt($("#prod_quantity").val());
			var re = /^\d+$/;
			 // console.log(quantity);
			 // console.log(typeof quantity);
			 // console.log(re.test(quantity));
			 // console.log(!re.test(quantity));
			if (quantity == "" || !re.test(quantity)) {
				$("#prod_qerror").text("Please fill field value");
				return false;
			}
			var price = parseInt($('#prod_price').val());
			var pr = /^\d+$/;
			console.log(price);
			console.log(typeof price);
			console.log(pr.test(price));
			console.log(!pr.test(price));
			
			if(price == "" || !pr.test(price)){
				$("#prod_priceerror").text("Please fill price field");
				return false;
			}
			var cat = $("#category").val();
			 // console.log(cat);
			 // console.log(cat=='');
			if (cat=='') {
				$("#category_error").text("Please Select Category");
				return false;
			}

			var img = $("#fileToUpload").val();
			// console.log(img);
			if (img == '') {
				$("#prodfile_error").text("Please Select File");
			return false; // do not allow to load next page.
			}

		});
	})


</script>

<?php include "../template/footer.php"; ?>