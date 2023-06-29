<?php

include("../template/header.php");

$id = $_GET['id'];

$user_model = new User_model();

$dele = $user_model->deleteUser($id);

header("location:list.php");



?>