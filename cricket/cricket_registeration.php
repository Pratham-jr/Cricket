  
<?php
//set the page title
$page_title = null;
$page_title = 'Registration';
//embed the header
require_once('header.php');
?>
    <body class="container">

    <h1> Team Player Registration </h1>

    <form method="post" action="save-cricket_registeration.php">
        <fieldset class="form-group">
            <label for="username" class="col-sm-2">Email:*</label>
            <input name="username" id="username" required type="email"/>
        </fieldset>
        
        <fieldset class="form-group">
            <label for="password" class="col-sm-2">Password:*</label>
            <input name="password" id="password" required type= "password" />
        </fieldset>

        <fieldset class="form-group" >
            <label for="confirm" class="col-sm-2">Confirm Password:*</label>
            <input name="confirm" id="confirm" required type="password" />
        </fieldset>
        <button class="btn btn-success col-sm-offset-2">Register</button>
    </form>
       
 <?php 
 //embed footer code
 require_once('footer.php');
 ?>