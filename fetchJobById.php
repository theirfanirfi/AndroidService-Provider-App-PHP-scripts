<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$USER_ID = $_POST['user_id'];

	$response['user_id'] = "";
	$response['username'] = "";
	$response['cat_name'] = "";
	$response['address'] = "";
	$response['contact'] = "";
	$response['isFound'] = false;
	$sum = 0;
	$x = 0;

	$SQLFETCH = "SELECT * FROM users_tbl WHERE user_id = {$USER_ID} LIMIT 1";
	$query = mysqli_query($connection,$SQLFETCH);
	$u= mysqli_fetch_object($query);

	$SQLRATING = "SELECT * FROM rating_tbl WHERE user_id = '$USER_ID'";
	$q = mysqli_query($connection,$SQLRATING);
	$rows = mysqli_num_rows($q);
	if($rows > 0){
	while($r = mysqli_fetch_object($q))
	{
		$x++;
		$sum = $sum + $r->ratings;
	}
	$sum = $sum/$x;
}

	$response['user_id'] = $u->user_id;
	$response['username'] = $u->username;
	$response['cat_name'] = $u->cat_name;
	$response['address'] = $u->address;
	$response['contact'] = $u->contact;
	$response['rating'] = substr($sum,0,3);

	$response['isFound'] = true;

	
}

echo json_encode($response);


?>