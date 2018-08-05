<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$response['error'] = true;
	$response['message'] = "";

$JOB_TITLE = $_POST['job_title'];
$JOB_CATEGORY = $_POST['job_cat'];
$JOB_LOCATION = $_POST['job_loc'];
$JOB_DESCRIPTION = $_POST['job_description'];
$JOB_CONTACT = $_POST['job_contact'];
$USER_ID = $_POST['user_id'];
date_default_timezone_set('Asia/Karachi');
   $DATE = date('jS \of F Y');

$SQL = "INSERT INTO jobs_tbl(job_title,cat_name,job_location,job_description,contact,job_posting_date,user_id) VALUES('$JOB_TITLE','$JOB_CATEGORY','$JOB_LOCATION','$JOB_DESCRIPTION','$JOB_CONTACT','$DATE','$USER_ID')";
$Q = mysqli_query($connection,$SQL);
if($Q)
{
	$response['error'] = false;
	$response['message'] = "JOB POSTED SUCCESSFULLY";
}
else
{
	$response['error'] = true;
	$response['message'] = "Error Occurred. Please try again.";
}
	
}

echo json_encode($response);


?>