<?php

/**
 * 
 */
class Dbconn 
{
	protected $conn;

	public function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ecommerce";

		//create connectiton
		$this->conn = new mysqli($servername, $username, $password, $dbname);

		//check connection
		if($this->conn->connect_error)
		{
			die("Connection Failed : " . $conn->connect_error);
		}
	}

	public function getRecords($sql_query)
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
			// 			name = 'Swati kirkire'
			$set[] = "$field_name = '$db_value'"; //variable can be used only in double quotes ""
		}

		$str = implode(', ', $set);
		$sql = "UPDATE ".$table_name." SET ".$str." where ".implode(' AND ', $condition);
		//echo $sql;
	    if ($this->conn->query($sql) === TRUE) 
	    {
	    	return true;
	    }
	    else
	    {
	    	return "Error : " . $sql . "</br>" . $this->conn->error;
	    }
	}

	public function test($sql)
	{
		if ($this->conn->query($sql) === TRUE) 
	    {
	    	return true;
	    }
	    else
	    {
	    	return "Error : " . $sql . "</br>" . $this->conn->error;
	    }
	}
   
	function __destruct()
	{
		$this->conn->close();
	}
}
include_once "Report_model.php";
include_once "Cart_model.php";
include_once "Product_model.php";
include_once "User_model.php";

?>