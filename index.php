<?php

session_start();

$_SESSION['verify_back_to'] = "../BrucesCMS/index2.php";
$_SESSION['app_name'] = "Bruce's CMS";

// redirect to home page
header ("Location: ../BrucesAdminArea/index.php?action=VerifyLogin");


?>