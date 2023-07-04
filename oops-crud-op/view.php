<?php
include("config/dbconn.php");
?>

<div class="container">
	<a href="addform.php">Add New Customer</a>
</div>

<div class="container">
	<h2>Customer Details</h2>
</div>

<?php
$id = $_GET['id'];

$customer_model = new Customer_model();
$row = $customer_model->getCustomerById($id);

if ($row) 
{
?>
	<div class="container">

		<p>Name:- <?php echo $row[0]['name'] ?> </p>
		<p>Items:- <?php echo $row[0]['items'] ?> </p>
		<p>Quantity:- <?php echo $row[0]['quantity'] ?> </p>
		<p>Status:- <?php echo $row[0]['status']=="A" ? "Active" : "Inactive" ?> </p>
		<p>Price:- <?php echo $row[0]['price'] ?> </p>
		<p>GST:- <?php echo $row[0]['GST'] ?> </p>
		<p>Total Price:- <?php echo $row[0]['total_price'] ?> </p>

		<a href="edit.php?id=<?php echo $row[0]['id'] ?>" class = "btn btn-success">Edit</a>
		
	</div>
<?php		
}
else
{
	echo "0 results";
}















?>