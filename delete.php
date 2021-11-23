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
?>
<?php

    if (isset($_POST['submit']))

    {
        // get the 'id' value:
        $Id = $_POST['submit'];
        // delete the record from the database:
        require 'dbconfig.php';
    } 
        echo $query = "DELETE FROM new_record WHERE Id ='$Id'";
        $result = mysqli_query($dbc, $query);
        if ($result)
        {
            //echo deleted record successfully and redirect to the main page:
            echo "<script>alert('Record deleted successfully!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
        else
        
        {
            echo '<p style="color: red;">The user could not be deleted due to a system error.</p>';
        }
    }  
else

{

$Id=$_GET['Id'];

    echo "
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <h1>Address Book</h1>
                <form action=\"\" method=\"post\">
                    <p>Are you sure you want to delete this user?</p>
                    <input type=\"text\" name=\"Id\" value=\"$Id\" />
                    <input type=\"submit\" name=\"submit\" value=\"Yes Delete\" />
                </form>
            </div>
        </div>
        <a href=\"index.php\">Cancel</a>
    ";
}
?>
