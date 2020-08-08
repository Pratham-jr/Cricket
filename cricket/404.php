<?php ob_start(); ?>

<?php
//set the page title
$page_title = null;
$page_title = 'Error-104';
//embed the header
require_once('header.php');
// access the current session

$page_title = 'COMP1006 App - Page Not Found';

?>




<!-- between the header and footer, add the following html: -->
<main class="container">

    


     <p class="jumbotron">Sorry but we can't find the page you requested.  Please try one of the links above instead.</p>

</main>


  
  <?php
 //embed footer code
 require_once('footer.php');
 ?>

 <?php ob_flush(); ?>
