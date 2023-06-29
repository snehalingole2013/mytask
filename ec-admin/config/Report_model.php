<?php

class Report_model extends Dbconn{

	public function getProducts($min, $max, $cat_id, $status)
	{
		$sql = "SELECT p.id, name, quantity, price, c.category, status 
				FROM product p
				INNER JOIN category c ON p.category_id = c.id
				WHERE  p.status='$status' ";

		if ($min && $max) 
		{
			$sql = $sql."AND price BETWEEN '$min' AND '$max'";
		}
			
		if ($cat_id) 
		{
			$sql = $sql."AND c.id='$cat_id'";
		}
			print_r($sql);

		$result = $this->conn->query($sql); 

		$return = array();
		if ($result->num_rows > 0)
		{
			while ($row = $result->fetch_assoc()) 
			{
				$return[] = $row;
			}
		}
		return $return;

	}

	public function getCatagories()
	{
		$sql = "SELECT id, category FROM category";
						
		$result = $this->conn->query($sql);
		$return = array();
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc())
			{
				$return[] = $row;
			}
		}
		return $return;
	}

} 