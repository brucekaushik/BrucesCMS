<?php

if (isset($_GET["action"]) && $_GET["action"] == "edit-page-submission") {
	
	// for convinience
	$username = $ses_username; 
	$heading = $_POST["heading"]; 
	$content = $_POST["content"]; 
	$folder_name = $_SESSION["folder_name"]; 
	$page_name = $_SESSION["page_name"]; 
	$template = $_POST["template_name"]; 
	
	// insert into the database
	$query = "UPDATE CmsPageContent SET username='$username', heading='$heading', content='$content', template_name='$template' WHERE folder_name='$folder_name' AND page_name='$page_name'";
	$query_res = mysql_query($query);
	
	if ($query_res) {
		
		echo "Saved changes to the page.";
		
		copy("templates/$template","pages/$page_name");
		
	}else{
		echo "Your changes could not be saved. Please try again!";
	}

}

?>