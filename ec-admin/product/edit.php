<?php
include ("../template/header.php");
// if (!isset($_SESSION['user'])) 
// {
//  	header('location:'.PROJECT_URL.'/user/userlogin/login.php');
// } 
?>

<div class="container">
	<h2>Edit Product Details</h2>
</div>	

<?php
$id = $_GET['id'];

		$product_model = new Product_model();
		$row = $product_model->getProductById($id);
		$prod_cate = $product_model->getCatagories();

		// echo "<pre>";
		// print_r($prod_cate);
		// echo "</pre>";

       // print_r($_GET);
        //print_r($row);
 //$result = $this->conn->query($sql);

 // if($result->num_rows > 0)
 // {
	//$row = $result->fetch_assoc();
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
?>
			<form action="update.php" method="POST" class="container" enctype="multipart/form-data">
				<input type="hidden" name="id" value ="<?php echo $row[0]["id"] ?>"></br>
				Name :-<input type="text" name="name" value = "<?php echo $row[0]["name"] ?>"></br></br>
				Quantity :-<input type="text" name="quantity" value = "<?php echo $row[0]["quantity"] ?>"></br><br>
				Price :-<input type="text" name="price" value = "<?php echo $row[0]["price"] ?>"></br></br>
				Status :-</br></br>
				<input type="radio" name="status" value = "A" <?php echo $active ?> > Active 
				<input type="radio" name="status" value = "I" <?php echo $inactive ?> >  Inactive</br><br>

				Categories :-<select id="category" name="category">
					<div class="container-fluid">
						<?php 
							foreach ($prod_cate as $category) 
							{
								echo "<option value ='" .$category['id']. "' ".($row[0]["category_id"]== $category['id'] ? 
									"Selected" : "" ). " >";
								echo $category['category'];
								echo "</option>";
								
							}
						?>
					</div>
					</select><br><br>
					Image:-<input type="file" name="fileToUpload" size=10>
					<br><br>
					<img src = "fileuploads/<?php echo $row[0]['image'] ?>" width = '300'>
					<input type="submit" name="submit" value="Update Product" class="btn btn-success">
			</form>
	
<?php
		}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#i_product").addClass("active");
	});
</script>

<?php
include("../template/footer.php");

// }



?>