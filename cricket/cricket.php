<?php ob_start(); ?>

<?php
session_start();

//set the page title
$page_title = null;
$page_title = 'Cricket Players Listing';
//embed the header
require_once('header.php');
?>

<h1> Players </h1>

<?php

try {

//connect to the db
require_once('db.php');

//set up the sql query
$sql = "SELECT * FROM crickets";

//run the query and store the results
$cmd = $conn->prepare($sql);
$cmd->execute();
$crickets = $cmd->fetchAll();

//start our grid
//table head is head of table and tbody = tablebody
echo '<table class="table table-striped table-hover"> <thead><th>Cricket ID</th><th>First Name</th><th>Last Name</th><th>Number</th><th>Position</th></thead></tbody>';

//loop through the query results and display each record on our page
//tr = table row and td = table data
foreach ($crickets as $cricket) {
    echo '<tr><td>' . $cricket['cricket_id'] . '</td><td>' . $cricket['firstname'] . '</td><td>' . $cricket['lastname'] . '</td><td>' . $cricket['numbers'] . '</td><td>' . $cricket['position'] . '</td><td>';

    //helps prevent manipulation of data from outsiders
    //hide edit nad delete.
    //authentication check
    //authentication check

    if (!empty($_SESSION['user_id'])) {
        echo '<td>' .
            '<a href="player.php?cricket_id=' . $cricket['cricket_id'] . '"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="0.88em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 14 16"><path fill-rule="evenodd" d="M0 12v3h3l8-8l-3-3l-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6L9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z" fill="#FF0000"/></svg></a>' . '</td><td>' . ' <a href="delete-cricket.php?cricket_id=' . $cricket['cricket_id'] . '" <a onclick="return confirm(\'Are you sure you want to delete this cricket form?\');"</a> 
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 48 48"><path fill="#FF8A65" d="M24 21.3L12.7 10L26 1.7L38.3 10z"/><path fill="#FFAB91" d="M24 21.3L12.7 10L17 4.7L38.3 10z"/><path fill="#B39DDB" d="M30.6 44H17.4c-2 0-3.7-1.4-4-3.4L9 11h30l-4.5 29.6c-.3 2-2 3.4-3.9 3.4z"/><path fill="#7E57C2" d="M38 13H10c-1.1 0-2-.9-2-2s.9-2 2-2h28c1.1 0 2 .9 2 2s-.9 2-2 2z"/></svg></a> ' . '</td>';
    }
    echo '</tr>';
}


//close the grid
echo '</tbody></table>';


//disconnect
$conn = null;
}

catch (Exception $e) 
{
 
  header('location:error.php');
  exit();
}

?>

<?php
//embed footer code
require_once('footer.php');
?>

<?php ob_flush(); ?>