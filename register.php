<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$fname = $_POST['fname'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$response['error'] = true;
	$response['message'] = "";

	$SQLINSERT = "INSERT INTO users_tbl(username,fathername,address,contact,password,email) VALUES('$name','$fname','$address','$contact','$email','$password')";
	$query = mysqli_query($connection,$SQLINSERT);
	if($query)
	{
	$response['error'] = false;
	$response['message'] = "Registeration Successfull. Continue to Login";
	}
	else
	{
		$response['error'] = true;
		$response['message'] = "Error Occurred. Please try again.";
	}
}

echo json_encode($response);


?>