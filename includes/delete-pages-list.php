<?php

// directory path
$dir = "pages";

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
			echo $x . " => <a href='home.php?action=delete-page-submission&&pagetodelete=$x'>delete</a><br>";
		}
	
	}
}



?>