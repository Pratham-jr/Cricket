<?php ob_start();?>
<?php
//set the page title
$page_title = null;
$page_title = 'COMP1006 App - Yikes!';
//embed the header
require_once('header.php');
// access the current session
?>

<main class="container">

     <h1>We're Sorry!</h1>

     <p class="jumbotron">Something unexpected just happened.  Our support team has been notified and will get right on it.</p>
</main>

<?php 
 //embed footer code
 require_once('footer.php');
 ?>

 <?php ob_flush(); ?>
