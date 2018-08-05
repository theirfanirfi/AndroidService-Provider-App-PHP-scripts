<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$USER_ID = $_POST['user_id'];
	$RATING = $_POST['rating'];
	$response['rated'] = false;

	$SQLFETCH = "INSERT INTO rating_tbl(user_id,ratings) VALUES('$USER_ID','$RATING')";
	$query = mysqli_query($connection,$SQLFETCH);

	if($query)
	{
	$response['rated'] = true;
	}
	else
	{
		$response['rated'] = false;
	}

	
}

echo json_encode($response);


?>