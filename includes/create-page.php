<?php

// store directory path
$_SESSION["folder_name"] = "pages";

// open directory 
// $d,$t will be a resource id's
$d = opendir("pages");
$t = opendir("templates");

// create a new array
$pagenames = array();
$template_names = array();

// read the contents of the directory..
// store the pages in an array
while ($file = readdir($d)){
	$pagenames[] = $file;
}

while ($file = readdir($t)){
	$templates[] = $file;
}

closedir($d);
closedir($t);

// json encode the array, store in a variable 
// pass the json encoded variable to javascript
$pagenames_json = json_encode($pagenames);
$pagenames_text = serialize($pagenames);

?>

<script type="text/javascript">
var o = <?php echo $pagenames_json ?>;
console.log(typeof o);
</script>

<div class="form">
	<form name="page_create"  id="page_create" method="post" action="home.php?action=create-page-submission" onsubmit="return verifyPageName()">
		<input name="pagenames" type="hidden" value='<?php echo $pagenames_text ?>' >
		Page Name: 
		<input name="page_name" id="page_name" type="text"> <span>.php</span><br><br>
		Pick Template: <select name='template_name'>
			<?php 
				foreach ($templates as $template){
					if($template !== "." && $template !== ".."){
						echo "<option value='$template'>$template</option>";	
					}
				}
			?>
		</select><br><br>
		<button type="submit">Create Page</button>
	</form>
</div>