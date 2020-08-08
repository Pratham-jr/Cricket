<?php ob_start(); ?>

<?php
//set the page title
$page_title = null;
$page_title = 'Saving Cricket';
//embed the header
require_once('header.php');
// access the current session


?>
<?php

// save form inputs into variables
// store the cricket_id if we are editing.  if we are adding, this value will be empty (which is ok)
$cricket_id = $_POST['cricket_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$numbers = $_POST['numbers'];
$position = $_POST['position'];
$ok = true;
$photo = null;

 //process photo upload if there is one
 if(!empty($_FILES['photo'])) {
    $photo = $_FILES['photo']['name'];

    if ($_FILES['photo']['type'] != 'image/jpeg') {
    echo 'Invalid photo type <br />';
    $ok = false;
    
}
else {
    //valid photo
    session_start();

    $final_name = session_id() . '_' . $photo;
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/$final_name");
    $ok=true;
    echo 'photo saved :)';
}

}


// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($firstname)) {
    // notify the user
    echo 'First Name is required<br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}

// check each value
if (empty($lastname)) {
    // notify the user
    echo 'Last Name is required<br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($numbers)) {
    // notify the user
    echo 'Number is required<br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}
elseif (is_numeric($numbers) == false) {
    echo 'Number is invalid<br />';
    $ok = false;
}

if (empty($position)) {
    // notify the user
    echo 'Position is required<br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}

// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

if ($ok == true) {

   // move all the save code we wrote last week in here, starting with the database connection and ending with the disconnect command
try{
// connect to the database. Again check your email / credentials for proper values
require_once('db.php');

 // set up the SQL INSERT command
 if (empty($cricket_id)) {
    // set up the SQL INSERT command
    $sql = "INSERT INTO cricketS (firstname, lastname, numbers, position, photo) VALUES (:firstname, :lastname, :numbers, :position, :photo)";
}
else {
    // set up the SQL UPDATE command to modify the existing cricket form
    $sql = "UPDATE cricketS SET firstname = :firstname, lastname = :lastname, numbers = :numbers, position = :position, photo = :photo 
     WHERE cricket_id = :cricket_id";
}
// create a command object and fill the parameters with the form values
$cmd = $conn->prepare($sql);
$cmd->bindParam(':firstname', $firstname, PDO::PARAM_STR, 50);
$cmd->bindParam(':lastname', $lastname, PDO::PARAM_STR, 50);
$cmd->bindParam(':numbers', $numbers, PDO::PARAM_INT);
$cmd->bindParam(':position', $position, PDO::PARAM_STR, 15);
$cmd->bindParam(':photo', $final_name, PDO::PARAM_STR, 100);
 // fill the cricket_id if we have one
 if (!empty($cricket_id)) {
    $cmd->bindParam(':cricket_id', $cricket_id, PDO::PARAM_INT);
}
// execute the command
$cmd->execute();

// disconnect from the database
$conn = null;

// show confirmation
//echo "cricket form Saved";

header('location:cricket.php');
exit();
}
catch (Exception $e) 
{
 
  header('location:error.php');
  exit();
}
}


?>

<?php 
 //embed footer code
 require_once('footer.php');
 ?>

<?php ob_flush(); ?>