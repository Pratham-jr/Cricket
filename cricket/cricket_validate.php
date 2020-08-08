<?php ob_start(); ?>


<?php
session_start();

//set the page title
$page_title = null;
$page_title = 'Validation';
// access the current session



// store the inputs & hash the password
$username = $_POST['username'];
$password = $_POST['password'];


// connect to db
require_once('db.php');
// write the query
$sql = "SELECT * FROM user WHERE username = :username";

// create the command, run the query and store the result
$cmd = $conn->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();
$user = $cmd->fetch();



// if count is 1, we found a matching username in the database.  Now check the password


if (password_verify($password, $user['password'])) {
    // user found
    $_SESSION['user_id'] = $user['user_id'];
} else {
    // user not found
    header('location:cricket_login.php?invalid=true');
    exit();
}


$conn = null;
header('location:cricket_menu.php');

?>
<?php ob_flush(); ?>