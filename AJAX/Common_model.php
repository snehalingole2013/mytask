<?php

class Common_model
{
	protected $conn; 
	public function __construct()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dronee_bk";

		$this->conn = new mysqli($servername, $username, $password, $dbname);
		if ($this->conn->connect_error) 
		{
			die("Connection Failed : ". $this->conn->connect_error);
		}
	}

	public function getStates()
	{
		$sql = "SELECT id, name, state_code, country_id, code
				FROM states";
		$result = $this->conn->query($sql);
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

	public function getCities($where)
	{
		$sql = "SELECT id, name, state_id, country_id, delete_flag
				FROM city 
				WHERE state_id =" .$where['id'];
				// echo $sql;

		$result = $this->conn->query($sql);
		$response = array();
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc())
			{
				$response[] = $row;
			}
		}
		return $response;
	}
}







?>