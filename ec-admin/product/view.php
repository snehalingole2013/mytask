<?php

include ("../template/header.php");
 ?>

<div class="container">
	<h2>Product Details</h2>
</div>	

<?php

$id = $_GET['id'];

$product_model = new Product_model();

$row = $product_model->getProductById($id);

// $sql = "SELECT name, quantity, price, status 
// 		FROM product
// 		WHERE id = $id";
// $result = $conn->query($sql);

if ($row) 
{

?>

<div class="container">
	<p>Name :- <?php echo $row[0]['name'] ?> </p>
	<p>Quantity :- <?php echo $row[0]['quantity'] ?> </p>
	<p>Price :- <?php echo $row[0]['price'] ?> </p>
	<p>Status :- <?php echo $row[0]['status']== "A" ? "Active" : "Inactive" ?> </p>
	<p>Category :- <?php echo $row[0]['category_id'] ?> </p>
	<p>Image :- <?php echo $row[0]['image'] ?> </p>

	<img src = "fileuploads/<?php echo $row[0]['image'] ?>" width = '300'><br>

 	<a href= "edit.php?id=<?php echo $row[0]['id'] ?>" class= "btn btn-success">Edit</a>
</div>



<?php
}
else
{
	echo "0 results.";
}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#i_product").addClass("active");
	});
</script>

<?php
include("../template/footer.php");


?>