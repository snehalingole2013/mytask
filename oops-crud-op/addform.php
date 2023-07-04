<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<title>Khayali Pulav</title>
</head>
<body>
	<div class="w-50 m-auto">

	  <h2>Add Customer Invoice</h2>
		  <form action="insertcust.php" method="POST">
		    <div class="form-group">
		      <label>Name:</label>
		      <input type="text" class="form-control" id="" name="name">
		    </div>
		    <div class="form-group">
		      <label>Items:</label>
		      	<select name="items" id="">
				    <option value="paneerbhuna">Paneer Bhuna</option>
				    <option value="vegmaratha">Veg Maratha</option>
				    <option value="mixedveg">Mixed Veg </option>
				    <option value="paneerbuttermasala">Paneer Butter Masala</option>
				    <option value="manchurian">Manchurian</option>
				    <option value="noodles">Noodles</option>
				    <option value="sandwitch">Sandwitch</option>
				    <option value="paratha">Paratha</option>
				    <option value="biriyani">Biriyani</option>
				    <option value="roti">Roti</option>
				    <option value="dalkhichadi">Dal Khichadi</option>
				</select>

				<div class="form-group">
			      <label>Quantity:</label>
			      <input type="number" class="form-control" id="" name="quantity">
		    	</div>

			       <label>Status:</label>
		    		<div class="form-check">
			       		<label class="form-check-label" for="radio1"> 
						<input type="radio" name="status" value="A" checked class="form-check-input">Active
						</label>	
					</div>
					<div class="form-check">
						<label class="form-check-label" for="radio2">
						<input type="radio" name="status" value="I" class="form-check-input">Inactive
						</label>
			    	</div>

			    	<div class="form-group">
				      <label>Price:</label>
				      <input type="number" class="form-control" id="" name="price">
			    	</div>

			    	<div class="form-group">
				      <label>GST:</label>
				      <input type="text" class="form-control" id="" name="GST">
			    	</div>
			    	<div class="form-group">
				      <label>Total Price:</label>
				      <input type="text" class="form-control" id="" name="total_price">
			    	</div>


		    </div>
		    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		  </form>
	</div>

</body>
</html>