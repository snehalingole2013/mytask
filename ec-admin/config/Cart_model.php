<?php

class Cart_model extends Dbconn{

	public function getProducts($filter)
	{
		$sql = "SELECT p.id, name, quantity, price,  status 
				FROM product p
				WHERE  p.status='A' and p.category_id=".$filter['id'];

		$return = $this->getRecords($sql);
		return $return;

	}

	public function getCatagories()
	{
		$sql = "SELECT id, category FROM category";
		$return = $this->getRecords($sql);
		return $return;
	}

} 