<?php 

// TODO: currently, adding page content is compulsory if its not added the page won't be visible, and therefore can't be edited/deleted/re-created fix this bug

?>

<br><h3>Add Content To Your Page</h3><br><br>

<form name="add-page-content" id="add-page-content" method="post" action="home.php?action=add-page-content-submission">

	<table>
		<tr>
			<td>Page Heading</td>
			<td><input name="heading" id="heading" type="text"></td>
		</tr>
		<tr>
			<td>Page Content</td>
			<td><textarea name="content" id="content" value=""></textarea> </td>
		</tr>
	</table>
	 
	<button type="submit">Add Content</button>

</form>