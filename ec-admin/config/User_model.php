<?php 

class User_model extends Dbconn
{
	
	public function addUser($data)
	{
		/* INSERT INTO user (name, skills, emailid, role, status)
				VALUES('Vijay Thakare', '2,3,4', 'vj@123.com', '2', 'A');
		*/
		$keys = array_keys($data) ; //return output
		$keys_str = implode(',' , $keys);

		 // $values =  array_values($data);
		 $values_str = implode("', '", $data);

		$sql = "INSERT INTO user (".$keys_str.")
				VALUES('".$values_str."')";
 		// echo "<pre>";
		// print_r($keys_str);
 		// echo "</pre>";
 		// exit;

		if ($this->conn->query($sql) === TRUE) 
		{
			return "Success";
		}
		else
		{
			return "error";
		}
	}

	public function getUser()
	{
		$sql = "SELECT user.id, user.name, role.name as role_name, emailid, role, user.status 
				FROM user
				INNER JOIN role on role.id = user.role";

			$return = $this->getRecords($sql);
			return $return;
	}

	public function getRoles()
	{
		$sql = "SELECT id, name, shortcode, status FROM role";
		
		$return = $this->getRecords($sql);
		return $return;
	}

	public function getSkills()
	{
		$sql = "SELECT id, skillname FROM skills";

		$return = $this->getRecords($sql);
		return $return;
	}

	public function updateUser($data, $where)
	{
		// $sql = "UPDATE user
		// 		SET name ='". $data['name'] ."', emailid ='". $data['emailid'] ."', role ='". $data['role'] . "', 
		// 		skills ='". $data['skills'] ."', status ='" . $data['status']."'
		// 	    WHERE id = '$id'";

		//   	UPDATE user SET name = 'Swati kirkire', emailid = 'sw@123gmail.com', role = '2', skills = '4', status = 'A' 
		// 		where id=2$condition = array();

		$table = "user";
		$response = $this->updateRecords($data, $where, $table);
		return $response;	
	}

	public function updateSkills($data, $where)
	{
		$table = "skills";
		$response = $this->updateRecords($data, $where, $table);
		return $response;
	}

	public function deleteUser($id)
	{
		$sql = "DELETE FROM user WHERE id = $id";

		if ($this->conn->query($sql) === TRUE) 
		{
			echo "Record Deleted Successfully.";
		}
		else
		{
			echo "Error :" .$sql. "<br>" . $this->conn->error;
		}
	}

	public function getUserById($id)
	{
		$sql = "SELECT u.*, (select GROUP_CONCAT(skillname) from skills s where find_in_set(s.id, u.skills) ) as u_skills 
				FROM user u WHERE u.id = $id";

		$return = $this->getRecords($sql);
		return $return;
	}

}

?>