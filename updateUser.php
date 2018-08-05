<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$response['error'] = true;
	$response['message'] = "";

$JOB_CATEGORY = $_POST['job_cat'];
$JOB_LOCATION = $_POST['job_loc'];
$JOB_CONTACT = $_POST['job_contact'];
$USER_ID = $_POST['user_id'];
date_default_timezone_set('Asia/Karachi');
   $DATE = date('jS \of F Y');

$SQL = "UPDATE users_tbl  SET cat_name = '$JOB_CATEGORY', address = '$JOB_LOCATION', contact = '$JOB_CONTACT' WHERE user_id = '$USER_ID' LIMIT 1";
$Q = mysqli_query($connection,$SQL);
if($Q)
{
	$response['error'] = false;
	$response['message'] = "profile Updated.";
}
else
{
	$response['error'] = true;
	$response['message'] = "Error Occurred. Please try again.";
}
	
}

echo json_encode($response);


?>