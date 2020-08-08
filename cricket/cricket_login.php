<?php ob_start(); ?>
<?php
//set the page title
$page_title = null;
$page_title = 'Login';
//embed the header
require_once('header.php');
?>
    <body class="container">

    <h1> Login </h1>
    <form method="post" action="cricket_validate.php">
        <fieldset class="form-group">
            <label for="username" class="col-sm-2">Email:*</label>
            <input name="username" id="username" type="email" required />
        </fieldset>
        
        <fieldset class="form-group">
            <label for="password" class="col-sm-2">Password:*</label>
            <input name="password"  id="password" type= "password" required  />
        </fieldset>
        <button class="btn btn-success col-sm-offset-2">Login</button>
    </form>
  
    <?php 
 //embed footer code
 require_once('footer.php');
 ?>
 <?php ob_flush(); ?>