<?php

//authentication
session_start();

// check if there is a user identity stored in the session object
if (empty($_SESSION['user_id'])) {
   // if there is no user_id in the session, redirect the user to the login page
   header('location:cricket_login.php');
   exit();
}

?>