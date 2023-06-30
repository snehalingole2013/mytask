<?php
include("config/dbconn.php");
?>

<div class="container">
	<a href="addform.php">Add New Customer</a>
</div>
<?php
echo "<br>";

$customer_model = new Customer_model();
$res = $customer_model->getCustomer();

if ($res) 
{
?>
	<div class="container">
		<table border="1" cellpadding="10" cellspacing="0"><tr>
			<th>Sr.no</th>
			<th>Name</th>
			<th>Items</th>
			<th>Quantity</th>
			<th>Status</th>
			<th>Price</th>
			<th>GST</th>
			<th>Total Price</th>
			<th colspan="2">Action</th>

<?php
		$i = 0;
		foreach ($res as $key => $row) 
		{
			echo "<tr>
					<td>" . ++$i. "</td>
					<td>" . $row['name'] . "</td>			
					<td>" . $row['items'] . "</td>			
					<td>" . $row['quantity'] . "</td>			
					<td>" . $row['status'] . "</td>			
					<td>" . $row['price'] . "</td>			
					<td>" . $row['GST'] . "</td>			
					<td>" . $row['total_price'] . "</td>
					<td><a href ='edit.php?id=" .$row["id"]. "'>Edit </td>
					<td><a href ='view.php?id=" .$row["id"]. "'> View </td>
				<tr>";			
		}
			
		echo "</table>";
		
	echo "</div>";

}
else
{
	echo "0 results";
}

?>