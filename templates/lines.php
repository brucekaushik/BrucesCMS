<?php

// start a session
session_start();

// include the required files
require '../../BrucesAdminArea/includes/dbConnect.inc.php';

// get the current page url
$url = $_SERVER["REQUEST_URI"];

// get the folder and page name
$split_url = explode("/", $url);
$count = count($split_url) - 1;
$folder = $split_url[$count - 1];
$page = $split_url[$count];


// get the content from the database
$query = " SELECT * FROM CmsPageContent WHERE folder_name='$folder' AND page_name='$page' ";
$res = mysql_query($query);
while ($row = mysql_fetch_array($res)){
	$username = $row["username"];
	$heading = $row["heading"];
	$content = $row["content"];
}

?>

<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>User Create CMS Page</title>
</head>
<body class="cms-page">
	Heading is <?php echo $heading ?>
	<br>----------------------------------------<br>
	username is <?php echo $username ?>
	<br>----------------------------------------<br>
	content is <?php echo $content ?>
</body>
</html>
