<?php ob_start(); ?>

<?php

//access the existing session
session_start();

//remove all session variables
session_unset();

//destroy the user session_start
session_destroy();

//redirect to login page
header("Location: cricket_login.php");

?>
<?php ob_flush(); ?>