
<?php 
session_start();
$_SESSION["loginID"] = false;
session_unset();
session_destroy();
header("location: index.php");
?>
