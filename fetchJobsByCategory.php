<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$user_id = array();
	$username = array();
	$fathername = array();
	$address = array();
	$cat_name = array();
	$contact = array();
	$email = array();
	$ratings = array();

	$response['user_id'] = "";
	$response['username'] = "";
	$response['fathername'] = "";
	$response['cat_name'] = "";
	$response['address'] = "";
	$response['contact'] = "";
	$response['email'] = "";
	$response['ratings'] = "";
	$response['isFound'] = false;
	$sum = 0;
	$x = 0;

	$cat = $_POST['cat_name'];

	$SQLINSERT = "SELECT * FROM users_tbl WHERE cat_name = '$cat' ORDER BY user_id DESC";
	$query = mysqli_query($connection,$SQLINSERT);
	$count = mysqli_num_rows($query);
	if($count > 0){
	while($row = mysqli_fetch_object($query))
	{
		$SQLR = "SELECT * FROM rating_tbl WHERE user_id = '$row->user_id'";
		$qR = mysqli_query($connection,$SQLR);
		$rcount = mysqli_num_rows($qR);
		if($rcount > 0){
		while($rr = mysqli_fetch_object($qR))
		{
			$x++;
			$sum = $sum + $rr->ratings;
		}
		$sum = $sum/$x;
		$ratings[] =substr($sum, 0,3);
		}
		else 
		{
			$ratings[] = $sum;
		}

			$user_id[] = $row->user_id;
			$username[] = $row->username;
			$fathername[] = $row->fathername;
			$address[] = $row->address;
			$cat_name[] = $row->cat_name;
			$contact[] = $row->contact;
			$email[] = $row->email;
			$ratings[] =substr($sum, 0,3);
	}

	$response['user_id'] = $user_id;
	$response['username'] = $username;
	$response['fathername'] =$fathername;
	$response['cat_name'] = $cat_name;
	$response['address'] = $address;
	$response['contact'] = $contact;
	$response['email'] = $email;
	$response['ratings'] = $ratings;
	$response['isFound'] = true;

}else
{
	$response['isFound'] = false;
	$response['message'] = "No jobs Found";

}
	
}

echo json_encode($response);


?>