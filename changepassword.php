<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$response['error'] = true;


	$user_id = $_POST['user_id'];
	$new_pass = $_POST['new_pass'];
	$SQLCHANGE = "UPDATE users_tbl SET password = '$new_pass' WHERE user_id = '$user_id' LIMIT 1";
	$Q = mysqli_query($connection,$SQLCHANGE);
	if($Q)
	{

	$response['error'] = false;
	}
	else
	{

	$response['error'] = true;
	}
	
}

echo json_encode($response);


?>