<?php 
require_once 'connection.php';

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$cat_id = array();
	$cat_name = array();
	$response['cat_id'] = "";
	$response['cat_name'] = "";
	$cat = $_POST['cat_name'];
	$SQLINSERT = "SELECT * FROM categories_tbl WHERE cat_name = '$cat'";
	$query = mysqli_query($connection,$SQLINSERT);
	while($row = mysqli_fetch_object($query))
	{
			$cat_id[] = $row->cat_id;
			$cat_name[] = $row->cat_name;
	}

	$response['cat_id'] = $cat_id;
	$response['cat_name'] = $cat_name;
	
}

echo json_encode($response);


?>