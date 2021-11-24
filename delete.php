<?php
error_reporting(0);
ob_start();
session_start();
?>
<?php
if (!isset($_SESSION['Username']))
{
    header("location:login.php");

$Username = $_SESSION['Username'];
}
?>
<?php

include 'dbconfig.php';
   // get the 'Id' value from the URL:
    $Id = $_GET['Id'];
    
    $query = "DELETE FROM new_record WHERE Id = '$Id'";
    if (mysqli_query($con, $query))
    {
        echo "Record deleted successfully";
    }
    else
    {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
    header("location:index.php");
    
?>
