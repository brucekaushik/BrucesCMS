<?php

if (isset($_GET["action"]) && $_GET["action"] == "add-page-content-submission") {
	
	// for convinience
	$username = $_SESSION['username']; 
	$heading = $_POST["heading"]; 
	$content = $_POST["content"]; 
	$folder_name = $_SESSION["folder_name"]; 
	$page_name = $_SESSION["page_name"];
	$template_name = $_SESSION["template_name"];
	// TODO: Sanitize later.. will result in mysql error because of apostrophes
	
	// insert into the database
	$query = " INSERT INTO CmsPageContent SET username='$username', heading='$heading', content='$content', folder_name='$folder_name', page_name='$page_name', template_name='$template_name' ";
	$query_res = mysql_query($query);
	
	if ($query_res) {
		echo "data saved, page created";
	}else{
		echo "data could not be saved";
	}

}

?>