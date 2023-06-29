<?php 

include ("../config/dbconnection.php");
session_start();	
// print_r($_POST);
// exit();


if (isset($_POST['submit'])) 
{
	$ErrMsg = '';
	$name = ($_POST["name"]);  
    if (empty($name) || !preg_match ("/^[ \-\(\)a-zA-z]*$/", $name) ) {  
        $ErrMsg = "Only alphabets and whitespace are allowed.";    
    }
    else if (strlen($name) >=200 ) {  
        $ErrMsg = "Enter charecters less than 200.";    
    }
    else if ($_POST['quantity']<0 || $_POST['quantity']>=1000) {  
        $ErrMsg = "Enter valid quantity less than 1000";  
    }
    else if ($_POST['price'] < 0 ) {  
        $ErrMsg = "Enter valid price";  
    } 

    if($ErrMsg ==''){
		$insert = array(
			'name'		=> $_POST['name'],
			'quantity'	=> $_POST['quantity'],
			'price'		=> $_POST['price'],
			'status'	=> $_POST['status'],
			'category_id' => $_POST['category'],
			'image' => $_FILES['fileToUpload']['name']
		);
		

		//print_r($_POST);

		$product_model = new Product_model();	

		$res = $product_model->addProduct( $insert );

		$target_dir = "fileuploads/";
		$tareget_file = $target_dir.basename($_FILES['fileToUpload']['name']);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $tareget_file);


		if($res=='success'){
			$_SESSION['success_msg'] = "Product added succesfully";
	 		$url = "selectprod.php";
		}
		else{
			$_SESSION['error_msg'] = $res;
	 		$url = "addform.php";
		}

    }else{
		$_SESSION['error_msg'] = $ErrMsg;
	 	$url = "addform.php";
    }

	
}
 header("location:".$url);

?>