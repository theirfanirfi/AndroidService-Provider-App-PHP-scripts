<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$response['error'] = true;
	$response['username'] = '';
	$response['fathername'] = '';
	$response['cat_name'] = '';
	$response['address'] = '';
	$response['contact'] = '';
	$response['password'] = '';
	$response['email'] = '';

	$user_id = $_POST['user_id'];
	$SQL= "SELECT * FROM users_tbl WHERE user_id = '$user_id' LIMIT 1";
	$Q = mysqli_query($connection,$SQL);
	if($row = mysqli_fetch_object($Q))
	{
	$response['username'] = $row->username;
	$response['fathername'] = $row->fathername;
	$response['cat_name'] = $row->cat_name;
	$response['address'] = $row->address;
	$response['contact'] = $row->contact;
	$response['password'] = $row->username;
	$response['email'] = $row->email;
	$response['error'] = false;
	}
	else
	{

	$response['error'] = true;
	}
	
}

echo json_encode($response);


?>