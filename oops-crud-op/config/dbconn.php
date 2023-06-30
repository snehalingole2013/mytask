<?php

class Dbconnect
{
	protected $conn;

	public function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel_management";

		$this->conn = new mysqli($servername, $username, $password, $dbname);
		if ($this->conn->connect_error) 
		{
			die("Connection Failed: " .$conn->connect_error);
		}
	}

	public function getCustRecords($sql_query)
	{
		$result = $this->conn->query($sql_query);
		$response = array();
		if ($result->num_rows > 0) 
		{
			while ($row = $result->fetch_assoc()) 
			{
				$response[] = $row;
			}
		}
		return $response;
	}

	public function updateRecords($data, $where, $table_name)
	{
		$condition = array();
		foreach ($where as $field_name => $value) 
		{
			$condition[] = "$field_name = '$value' ";
		}

		$set = array();
		foreach ($data as $field_name => $db_value) 
		{
			$set[] = "$field_name = '$db_value' ";
		}

		$str = implode(', ', $set);
		$sql = "UPDATE ".$table_name. " SET ".$str." WHERE ".implode(' AND', $condition);
		echo $sql;

		if ($this->conn->query($sql) === TRUE) 
		{
			return true;
		}
		else
		{
			return "Error : ".$sql. "<br>" .$this->conn->error;
		}
	}
}


include_once("customer_model.php");


?>