<?php

$folder = "pages";
$pagetoedit = $_GET['pagetoedit'];
$_SESSION["page_name"] = $pagetoedit;

echo "You are editing => $pagetoedit";

include 'includes/edit-page-content.php';


?>