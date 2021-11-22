<?php 
$con = @mysqli_connect("localhost","root","","address_book");
if (!$con)
  {
    die(mysqli_error());
  }
  mysqli_select_db($con,"address_book");

?>
