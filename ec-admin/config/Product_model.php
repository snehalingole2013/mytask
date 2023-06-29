<?php

class Product_model extends Dbconn 
{

	public function getProducts()
	{
		$sql = "SELECT product.id, name, quantity, price, status, category, image FROM product
				LEFT JOIN category on category.id = product.category_id";

		$return = $this->getRecords($sql);
		return $return;

	}

	public function getCatagories()
	{
		$sql = "SELECT p.category_id, c.id, c.category, COUNT(p.id)as total 
				FROM category c LEFT JOIN product p ON p.category_id = c.id
				GROUP BY c.id
				ORDER By c.category";
						
		$return = $this->getRecords($sql);
		return $return;
	}

	public function addProduct( $data )
	{	
		// $data['keyname'];
		// $sql = "INSERT INTO product (name, quantity, price, status, category_id, image)
		// 	   VALUES('". $data['name'] ."', '".$data['quantity']."', '".$data['price']."', '".$data['status']."', 
		// 	   	'".$data['category_id']."', '".$data['image']."')";
		// 	   	echo $sql;

		$keys = array_keys($data) ; //return output
		$keys_str = implode(',' , $keys);

		 // $values =  array_values($data);
		 $values_str = implode("', '", $data);

		$sql = "INSERT INTO product (".$keys_str.")
				VALUES('".$values_str."')";
 		// echo "<pre>";
		// print_r($sql);
 		// echo "</pre>";
 		// exit;


	   if ($this->conn->query($sql) === TRUE) 
	   {
	   		return "success";
	   }
	   else
	   {
	   		return "error";
	   		// return "Error : " . $sql . "<br>" . $conn->error;
	   }
	}

	public function addCategory($data)
	{
		$sql = "INSERT INTO category (category)
				VALUES('".$data['category']."')";

		if ($this->conn->query($sql)=== TRUE) 
		{
			return "success";
		}
		else
		{
			return "error";
		}
	}

	
	public function updateProduct( $data, $where)
	{

		// UPDATE product SET name ='Book ', quantity ='244 ', price ='1100', status ='A', category_id ='1' WHERE id = '1 '

		// $sql = "UPDATE product 
		// 		SET name ='". $data['name'] ."', quantity ='". $data['quantity'] ."', price ='". $data['price'] . "', status ='" . $data['status']."', category_id ='" .$data['category_id']."'";

		// 		if ( $data['image']) 
		// 		{
		// 			$sql = $sql. ",image ='" . $data['image'] ."'";
		// 		}
		// 	$sql = $sql . "WHERE id = '$id'";
		$table = "product";
		$res = $this->updateRecords( $data, $where, $table );
		return $res;
    }

    public function deleteProduct($id)
    {
    	$sql = "DELETE FROM product WHERE id = $id";

    	if ($this->conn->query($sql) === TRUE) 
    	{
    		echo "Record Deleted Successfully.";
    	}
    	else
    	{
    		echo "Error: " .$sql. "</br>" . $this->conn->error;
    	}
    }

    public function deleteCategory($id)
    {
    	$sql = "DELETE FROM category WHERE id = $id";

    	$return = $this->test($sql);
    	return $return;
    }

    public function getProductsByCategory($id)
    {
    	$sql = "SELECT * FROM product 
				WHERE category_id = $id";

		$result = $this->getRecords($sql);
		return $result;
    }


	public function getProductById($id)
	{

		$sql = "SELECT id, name, quantity, price, status, category_id, image 
				FROM product 
				WHERE id = $id";

		$return = $this->getRecords($sql);
		return $return;
	}

	public function updateCategory($data, $where)
	{
		$table = "category";
		$res = $this->updateRecords( $data, $where, $table );
		return $res;
	}

}



?>