<?php

include ("../template/header.php");	
?>

<div class="container">
<a href='addform.php' class="btn btn-info">Add New Product</a>
</div>


<?php  

echo "<br><br>";

$product_model = new Product_model();

$result = $product_model->getProducts();

				if ($result)
				{

?>
					<div class="container">
					<table class="table table-striped table-bordered"><tr>
							<th>Sr. No.</th>
							<th>Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Status</th>
							<th>Category</th>
							<th colspan=3>Action</th>
						</tr>
				   <?php
						//output data of each row

						// while ($row = $result->fetch_assoc()) 
						$i = 0;
						foreach ($result as $index => $row)
						{

						echo "<tr>
								<td>" . (++$index) . "</td>
								<td>" . $row["name"] . "</td>
								<td>" . $row["quantity"] . "</td>
								<td>" . $row["price"] ."</td>
								<td>" . ($row["status"]== "A" ? "Active" : "Inactive"). "</td>
								<td>" .$row["category"]. "</td>
								<td><a href = 'edit.php?id=" . $row["id"] . "' > Edit </a></td>
								<td><a href = 'view.php?id=" . $row["id"] . "' > View </a></td>
								<td><a href = 'delete.php?id=" . $row["id"] . "' > Delete </a></td>

							</tr>";
							

						}
					echo "</table>";
					echo "</div>";

				}
				else
				{
					echo "0 result";
				}

?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#i_product").addClass("active");
	});
</script>

<?php
include '../template/footer.php';

?>



