<?php ob_start(); ?>

<?php
//set the page title
$page_title = null;
$page_title = 'Saving Information';
//embed the header
require_once('header.php');
// access the current session

?>
    <?php
    //get the form inputs
$username = $_POST["username"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];
$ok = true;

    //validate the inputs
if (empty($username))
{
    echo 'Username is required </br>';
    $ok = false;
}

if (empty($password))
{
    echo 'password is required </br>';
    $ok = false;
}

if ($password != $confirm)
{
    echo 'Password donot match </br>';
    $ok = false;
}


if($ok)
{
    //hash the passwords
$password = password_hash($password, PASSWORD_DEFAULT);

    //setup and execute the insert command
    require_once('db.php');

//for execution
$sql ="INSERT INTO user (username,password) VALUES (:username,:password)";  

$cmd = $conn->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
$cmd->execute();
$user =$cmd->fetch();

    //disconnect
$conn = null;

    //show a message to the user
    //echo 'Registration Saved Successfully :)';
    header("Location:cricket_login.php");
}
?>
 <?php
//embed footer code
require_once('footer.php');
?>

<?php ob_flush(); ?>