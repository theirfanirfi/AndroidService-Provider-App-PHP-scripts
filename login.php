<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$email = $_POST['email'];
	$password = $_POST['pass'];

	
	$response['error'] = true;
	$response['message'] = "";
	$response['username'] = "";
	$response['user_id'] = "";
	$response['email'] = "";
	$response['password'] = "";
	$response['fathername'] = "";
	$response['cat_name'] = "";
	$response['address'] = "";
	$response['contact'] = "";

	$SQLINSERT = "SELECT * FROM users_tbl WHERE email = '$email' AND password = '$password' LIMIT 1";
	$query = mysqli_query($connection,$SQLINSERT);
	$rows = mysqli_num_rows($query);
	if($rows > 0){
	$user = mysqli_fetch_object($query);
	$response['error'] = false;
	$response['message'] = "Login Successfull";
	$response['username'] = $user->username;
	$response['user_id'] = $user->user_id;
	$response['email'] = $user->email;
	$response['password'] = $user->password;
	$response['fathername'] = $user->fathername;
	$response['cat_name'] = $user->cat_name;
	$response['address'] = $user->address;
	$response['contact'] = $user->contact;

	
}else
{
	$response['error'] = true;
		$response['message'] = "Username/Password is Incorrect.";
}
}

echo json_encode($response);


?>