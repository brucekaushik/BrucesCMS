<?php

// directory path
$dir = "pages";

// handle variables
$ses_username = $_SESSION['username'];
$ses_user_level = $_SESSION['user_level'];

// get the page names from the database
if($ses_user_level == "reg"){
	$query = " SELECT page_name FROM CmsPageContent WHERE username='$ses_username' ";
}elseif($ses_user_level == "admin" || $ses_user_level == "root"){
	$query = " SELECT page_name FROM CmsPageContent ";
}


$res = mysql_query($query) or die("died");
while ($row = mysql_fetch_array($res)){
	$pagenames[] = $row["page_name"];
}

@$no_of_pages = count($pagenames);

if (!$no_of_pages) {
	echo "no pages available";
}else{
	foreach ($pagenames as $x){
	
		if ($x != "." && $x != ".." && $x != ".php") {
			echo $x . " => <a href='home.php?action=edit-page&pagetoedit=$x'>edit</a> - "
			. " <a href='pages/$x'>view</a>";
			echo "<br>";
		}
	
	}
}



?>