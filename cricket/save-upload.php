
<?php

// name
$name = $_FILES['upload']['name'];
echo "Name $name<br >";

// size
$size = $_FILES['upload']['size'];
echo "Size $size<br />";

// type
$type = $_FILES['upload']['type'];
echo "Type $type<br />";

// get the temp location
$tmp_name = $_FILES['upload']['tmp_name'];
echo "Tmp Name $tmp_name<br />";

//get current working directory
echo getcwd() . '<br>';

//print_r($_FILES);

// copy file to the uploads folder where it will stay permanently
//$photo_path = "images/" . $name; //this works on only local server but not on remote server.

$photo_path = getcwd() . "/uploads/" . $name;
echo $photo_path . '<br>';
echo move_uploaded_file($tmp_name, $photo_path);
?>
