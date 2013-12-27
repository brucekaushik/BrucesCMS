<?php 

// get the content from the database
$query = " SELECT * FROM CmsPageContent WHERE folder_name='$folder' AND page_name='$pagetoedit' ";
$res = mysql_query($query);
while ($row = mysql_fetch_array($res)){
	$username = $row["username"];
	$heading = $row["heading"];
	$content = $row["content"];
	$template = $row["template_name"];
}

// open directory
$t = opendir("templates");

// create a new array
$template_names = array();

// read the contents of the directory..
// store the pages in an array
while ($x = readdir($t)){
	$templates[] = $x;
}

closedir($t);

?>

<br><h3>Edit Page Content</h3><br><br>

<form name="add-page-content" id="add-page-content" method="post" action="home.php?action=edit-page-submission">

	<table>
		<tr>
			<td>Page Heading</td>
			<td><input name="heading" id="heading" type="text" value="<?php echo $heading ?>"></td>
		</tr>
		<tr>
			<td>Page Content</td>
			<td><textarea name="content" id="content"><?php echo $content ?></textarea> </td>
		</tr>
		<tr>
			<td>Pick Template</td>
			<td>
				<select name='template_name'>
					<?php 
						foreach ($templates as $x){
							if($x !== "." && $x !== ".."){
								echo "<option value='$x'"; 
								if($template == $x){ echo "selected='selected'"; }
								echo ">$x</option>";	
							}
						}
					?>
				</select>
			</td>
		</tr>
	</table>
	
	<br><br>
	
	<button type="submit">Save Changes</button>

</form>