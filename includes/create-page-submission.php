<?php

if (isset($_GET["action"]) && $_GET["action"] == "create-page-submission") {

	$page_name = $_POST["page_name"];
	$pagenames = $_POST["pagenames"];
	$pagenames = unserialize($pagenames);
	$template_name = $_POST["template_name"];
		
	foreach ($pagenames as $x){
		
		if($x == $page_name){
			$page_status =  "the page name already exists, try using a different name";
			break;
		}
		
	}
	
	if(isset($page_status)){
		
		echo $page_status;
		
	}else{
				
		if ( !copy("templates/$template_name", "pages/$page_name.php") ) {
			$message = "Page creation failed.";
			echo $message;
		} else {	
			$_SESSION["page_name"] = $page_name . ".php";
			$_SESSION["template_name"] = $template_name;
			echo "<script>window.location='home.php?action=add-page-content'</script>";
		}
		
	}
			
}

?>