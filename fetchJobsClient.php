<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$job_id = array();
	$job_title = array();
	$job_desc = array();
	$job_location = array();
	$cat_name = array();
	$response['job_id'] = "";
	$response['job_title'] = "";
	$response['cat_name'] = "";
	$response['job_location'] = "";
	$response['job_desc'] = "";
	$response['isFound'] = false;

	$SQLINSERT = "SELECT * FROM jobs_tbl ORDER BY job_id DESC";
	$query = mysqli_query($connection,$SQLINSERT);
	$count = mysqli_num_rows($query);
	if($count > 0){
	while($row = mysqli_fetch_object($query))
	{
			$job_id[] = $row->job_id;
			$cat_name[] = $row->cat_name;
			$job_title[] = $row->job_title;
			$job_desc[] = $row->job_description;
			$job_location[] = $row->job_location;
	}

	$response['job_id'] = $job_id;
	$response['job_title'] = $job_title;
	$response['cat_name'] = $cat_name;
	$response['job_location'] = $job_location;
	$response['job_desc'] = $job_desc;
	$response['isFound'] = true;

}else
{
	$response['isFound'] = false;
	$response['message'] = "No jobs Found";

}
	
}

echo json_encode($response);


?>