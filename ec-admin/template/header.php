<?php 
session_start();
define("PROJECT_URL", "http://localhost/mytask/ec-admin"); 
$root_path = $_SERVER['DOCUMENT_ROOT']."/mytask/ec-admin"; 

if (!isset($_SESSION['user'])) 
{
  header('location:'.PROJECT_URL.'/user/userlogin/login.php');
} 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ec-Admin</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="d-flex flex-column min-vh-100">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">SVTechno</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php 
  if(file_exists("dbconn.php")){
    include ("dbconn.php"); 
  }
  else{
    include ($root_path."/config/dbconnection.php"); 
  }

  ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php include("menu.php"); ?>
  </div>
</nav>
<?php 
if(isset($_SESSION['success_msg'])){ ?>
  <div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?php echo $_SESSION['success_msg'];  ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
<?php 
  unset($_SESSION['success_msg']);
}
if(isset($_SESSION['error_msg'])){ ?>
  <div class="container">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo $_SESSION['error_msg'];  ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
<?php 
  unset($_SESSION['error_msg']);
}