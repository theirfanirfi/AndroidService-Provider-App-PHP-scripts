<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$response['error'] = true;


	$jid = $_POST['job_id'];

	$SQLDELETE = "DELETE FROM jobs_tbl WHERE job_id = '$jid' LIMIT 1";
	$Q = mysqli_query($connection,$SQLDELETE);
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