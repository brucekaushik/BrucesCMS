<?php

// start a session
session_start();

// include the required files
require '../BrucesAdminArea/includes/dbConnect.inc.php';

/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//*/

// handle variables
$ses_user_level = $_SESSION['user_level'];

?>

<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
	<title>CMS</title>
	<link type="text/css" rel="stylesheet" href="css/styles.css">
	<script type="text/javascript" src="js/scripts.js"></script>
</head>
<body>
<div class="wrapper">

<?php

if($ses_user_level == "reg" || $ses_user_level == "admin" || $ses_user_level == "root"){
	
	// for convinience
	
	include 'includes/topnav.php';
	
	echo "<div class='content'>";
	
	if (isset($_GET["action"])) {
		$action = $_GET["action"];
	}else{
		$action = "none";
	}
		
	switch ($action){
		
		case "create-page":
			
			include 'includes/create-page.php';
			
		break;
			
		case "create-page-submission":
			
			include 'includes/create-page-submission.php';
			
		break;
		
		case "add-page-content":
			
			echo "page creation successful";
			
			include 'includes/add-page-content.php';
			
		break;
		
		case "add-page-content-submission":
		
			include 'includes/add-page-content-submission.php';
		
		break;
		
		case "edit-pages-list":
				
			include 'includes/edit-pages-list.php';
				
		break;
				
		case "edit-page":
				
			include 'includes/edit-page.php';
				
		break;
		
		case "edit-page-submission":
				
			include 'includes/edit-page-submission.php';
				
		break;
		
		case "delete-pages-list":
		
			include 'includes/delete-pages-list.php';
		
		break;
		
		case "delete-page-submission":
		
			include 'includes/delete-page-submission.php';
		
		break;
	}
	
	echo "</div>";
	
}else{
	
	// redirect to index page
	header ("Location: index.php");
	
}

?>

</div>
</body>