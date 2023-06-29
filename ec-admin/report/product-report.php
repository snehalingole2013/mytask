<?php  include("../template/header.php"); ?>

<div class="container-fluid">
	<form method="GET">
		<div class="col-md-4">
			<fieldset class="form-group">
				<label for="formGroupExampleInput">Price Min</label>
				<input type="text" class="form-control" name="min" placeholder="Example input">
			</fieldset>
		</div>
		<div class="col-md-4">
			<fieldset class="form-group">
				<label for="formGroupExampleInput2">Price Max</label>
				<input type="text" class="form-control" name="max"  placeholder="Example input">
			</fieldset>
		</div>
		<div class="col-md-4">
			<fieldset class="form-group">
				<?php
				//Dbconn object is not useful, beacuse it contains only connection 
				//creating object of Report_model class because it will contain all required methods
		
				$report_model = new Report_model(); 
				$categry = $report_model->getCatagories(); 
				?>
				<label for="formGroupExampleInput2">Categories</label>
				<select name="cat">
					<option value="">Select Category</option>
					<?php
					foreach ($categry as $val) 
					{
						echo "<option value =" .$val['id']. ">" .$val['category']."</option>";
					}

					?>
				</select>
			</fieldset>
		</div>
		<div class="col-md-4">
			<fieldset class="form-group">
				<label for="formGroupExampleInput2">Status:-</label>
				<div class="form-check">
					<label class="form-check-label" for="radio1"> 
						<input type="radio" name="status" value="A" class="form-check-input" id="radio1">Active
				    </label>
				</div>

				<div class="form-check">
				    <label class="form-check-label" for="radio2"> 
						<input type="radio" name="status" value="I" class="form-check-input" id="radio2">Inactive
				    </label>
				</div>
			</fieldset>
		<button type="submit" class="btn btn-primary">Search</button>
	</form>
</div>

<div class="container-fluid">
	<?php 
	// $list = 
	$list = array();
	if(isset($_GET['min']) && isset($_GET['max']) && isset($_GET['cat']) && isset($_GET['status'])){
		$min = $_GET['min'];
		$max = $_GET['max'];
		$cat = $_GET['cat'];
		$status = $_GET['status'];
		
		if (($min >= 0) && ($max >= 0) || ($cat > 0)) 
		{

			$list = $report_model->getProducts($min, $max, $cat, $status);

		}
		
	}

	?>
	<table class="table table-striped table-bordered"><tr>
			<th>Sr. No.</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Category</th>
		</tr>
	   <?php
			//output data of each row
			$i = 0;
			foreach ($list as $index => $row)
			{
				echo "<tr>
						<td>" . ($index + 1) . "</td>
						<td>" . $row["name"] . "</td>
						<td>" . $row["quantity"] . "</td>
						<td>" . $row["price"] ."</td>
						<td>" .$row["category"]. "</td>
					</tr>";
					

			}

			if (empty($list)) 
			{
				echo "<tr><td colspan = 5> No Records </td></tr>";
			}
		echo "</table>";
	?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#i_product_report").addClass("active");
	});
</script>

<?php include "../template/footer.php"; ?>