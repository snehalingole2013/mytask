<?php

class Customer_model extends Dbconnect
{
	public function addCustomer($data)
	{
		$keys = array_keys($data);
		$keys_str = implode(', ', $keys);

		$values_str = implode("', '", $data);

		$sql = "INSERT INTO consumers (".$keys_str.")
				VALUES('".$values_str."')";

		if ($this->conn->query($sql)) 
		{
			return "success";
		}
		else
		{
			return "error";
		}
	}

	public function getCustomer()
	{
		$sql = "SELECT id, name, items, quantity, status, price, GST, total_price
				FROM consumers";
		$return = $this->getCustRecords($sql);
		return $return;
	}

	public function getCustomerById($id)
	{
		$sql = "SELECT id, name, items, quantity, status, price, GST, total_price
				FROM consumers
				WHERE id = $id";

		$return = $this->getCustRecords($sql);
		return $return;
	}

	public function updateCustomer($data, $where)
	{
		$table = "consumers";
		$response = $this->updateRecords($data, $where, $table);
		return $response;
	}
}



























?>