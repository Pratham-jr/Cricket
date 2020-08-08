<?php ob_start(); ?>

<?php
//authentication check
require_once('auth.php');
//set the page title
$page_title = null;
$page_title = 'Gallery';
//embed the header
require_once('header.php');
// access the current session

// connect
require_once('db.php');

// write the sql query
$sql = "SELECT cricket_id, photo FROM crickets WHERE photo IS NOT NULL";

// execute the query and store the results
$cmd = $conn->prepare($sql);
$cmd->execute();
$cricketS = $cmd->fetchAll();

echo  '<h1>Cricket Player Pictures</h1><main class="container"><div style="display: flex; flex-wrap:wrap;">' ;

foreach (crickets as $player) {
    echo '<div class="col-sm-3 col-md-4">
    <a href="player.php?cricket_id= ' . $player['cricket_id'] . '" cricket_id="Player Details">
    <img class="thumbnail" src="uploads/' . $player['photo'] . '"cricket_id="' . $player['cricket_id'] .'" />
        </a> </div>';
}

echo  '</div></main>' ; 

$conn = null;

?>

<?php
//embed footer code
require_once('footer.php');
?>

<?php ob_flush(); ?>