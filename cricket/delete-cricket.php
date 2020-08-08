<?php ob_start(); ?>

<?php
//authentication check
require_once('auth.php');
// access the current session

?>


   <?php 
// capture the selected movie_id from the url and store it in a variable with the same name
$cricket_id = $_GET['cricket_id'];

// connect
require_once('db.php');

// set up the SQL command
$sql = "DELETE FROM crickets WHERE cricket_id = :cricket_id";

// create a command object so we can populate the movie_id value, the run the deletion
$cmd = $conn->prepare($sql);
$cmd->bindParam(':cricket_id', $cricket_id, PDO::PARAM_INT);
$cmd->execute();

//disconnect
$conn = null;
header('location:cricket.php')

?>
<?php 
 //embed footer code
 require_once('footer.php');
 ?>

<?php ob_flush(); ?>


