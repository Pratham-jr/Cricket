<?php ob_start();

//authentication check
require_once('auth.php');

//set the page title
$page_title = null;
$page_title = 'Menu';
//embed the header
require_once('header.php');
// access the current session


?>

<main class="container">

   <h1>Eklavya Cricket Acadmey</h1>
   <img src="img/car2.png" alt="Form">
   <figcaption ><a href="cricket.php" title="cricket">Cricket Team Record</a></figcaption>

</main>
  
 <?php 
 //embed footer code
 require_once('footer.php');
 ?>

 <?php ob_flush(); ?>
