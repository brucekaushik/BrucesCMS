<?php

if (isset($_GET["action"]) && $_GET["action"] == "delete-page-submission") {
	
	// for convinience
	$username = $ses_username; 
	$folder_name = $_SESSION["folder_name"]; 
	$page_name = $_SESSION["page_name"];
	
	// insert into the database
	$query = "DELETE FROM CmsPageContent WHERE folder_name='$folder_name' AND page_name='$page_name'";
	$query_res = mysql_query($query);
	
	if ($query_res) {
		
		echo "Page Deleted.";
		
		$path = "$folder_name/$page_name";
		unlink($path);
		
	}else{
		echo "Page could note be deleted. Please try again!";
	}

}

?>