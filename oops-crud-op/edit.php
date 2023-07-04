<?php
include("config/dbconn.php");
?>

<div class="container">
	<a href="addform.php">Add New Customer</a>
</div>

<div>
	<h2>Edit Customer Details</h2>
</div>

<?php

$id = $_GET['id'];

$customer_model = new Customer_model();
$row = $customer_model->getCustomerById($id);

$active = "";
$inactive = "";
if ($row[0]['status'] == "A") 
{
	$active ="checked";
}
else
{
	$inactive = "checked";
}


if ($row) 
{
?>
		<form action="update.php" method="POST" class="container">
			<input type="hidden" name="id" value="<?php echo $row[0]['id'] ?>"><br>
			Name :- <input type="text" name="name" value="<?php echo $row[0]['name'] ?>"><br>
			Items:- <select name="items">
						<option value="paneerbhuna" <?php echo $row[0]['items']== "paneerbhuna" ? "Selected" : "" ?> >Paneer Bhuna</option>
					    <option value="vegmaratha" <?php echo $row[0]['items']== "vegmaratha" ? "Selected" :
					        "" ?> >Veg Maratha</option>
					    <option value="mixedveg" <?php echo $row[0]['items']== "mixedveg" ? "Selected" : "" 
							?> >Mixed Veg </option>
					    <option value="paneerbuttermasala" <?php echo $row[0]['items']== "paneerbuttermasala" ? "Selected" : "" ?> >Paneer Butter Masala</option>
					    <option value="manchurian" <?php echo $row[0]['items']== "manchurian" ? "Selected" : "" ?> >Manchurian</option>
					    <option value="noodles" <?php echo $row[0]['items']== "noodles" ? "Selected" : "" ?> >  	Noodles</option>
					    <option value="sandwitch" <?php echo $row[0]['items']== "sandwitch" ? "Selected" : ""  	?> >Sandwitch</option>
					    <option value="paratha" <?php echo $row[0]['items']== "paratha" ? "Selected" : "" ?> >     Paratha</option>
					    <option value="biriyani" <?php echo $row[0]['items']== "biriyani" ? "Selected" : "" ?>     >Biriyani</option>
					    <option value="roti" <?php echo $row[0]['items']== "roti" ? "Selected" : "" ?> >Roti  </option>
					    <option value="dalkhichadi" <?php echo $row[0]['items']== "dalkhichadi" ? "Selected" : "" ?> >Dal Khichadi</option>
					</select><br><br>
			Quantity :- <input type="number" name="quantity" value="<?php echo $row[0]['quantity'] ?>"><br>
			Status :- <br>
			<input type="radio" name="status" value="A" <?php echo $active ?> > Active
			<input type="radio" name="status" value="I" <?php echo $inactive ?> > Inactive <br>
			Price :- <input type="text" name="price" value="<?php echo $row[0]['price'] ?>"><br>
			GST :- <input type="text" name="GST" value="<?php echo $row[0]['GST'] ?>"><br>
			Total Price:- <input type="text" name="total_price" value="<?php echo $row[0]['total_price'] ?>">
			<br>
			<input type="submit" name="submit" value="Update Customer">	
		</form>

<?php
}




?>