<?php
session_start();
error_reporting(0);
ob_start();

if (!isset($_SESSION['Username']))
{
    header("location:login.php");
}
$Username = $_SESSION['Username'];

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--add bootstrap css here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Address Book</title>
    <body>
        <? include_once './include/nav.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Address Book</h1>
                    <h2>
                    Welcome <?php echo $Username; ?>
                    </h2>                   
                    <!--logout button align to right-->
                    <a href="logout.php" class="btn btn-danger pull-right">Logout</a>  <br>              
                   
                    <a type="button" class="btn btn-primary" href="add.php">Add New Contact</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include_once 'dbconfig.php';
                    $sql = "SELECT * FROM new_record";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table class='table table-striped'>";
                        echo "<thead>";

                        echo "<tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                            <td>" . $row["Id"] . "</td><td>" . $row["Fname"] . "</td><td>" . $row["Lname"] . "</td><td>" . $row["Email_"] . "</td><td>" . $row["Phone_"] . "</td><td>" . $row["Address_"] . "</td><td>" . $row["City_"] . "</td><td>" . $row["State_"] . "</td><td>" . $row["Zip_"] . "</td><td>" . $row["Country_"] . "</td><td><a href='edit.php?Id=" . $row["Id"] . " '>Edit</a> | <a href='delete.php?Id=" . $row["Id"] . "'>Delete</a></td>
                            </tr>";
                        }
                        echo "</thead>";
                        echo "</table>";
                    } else {
                        echo "0 results";
                    }
                    $con->close();
                    ?>
                </div>
            </div>
        </div>
        <? include_once './include/footer.php'; ?>

   
  



</body>
<!--add jquery scripts here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--add datatable scripts here -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="js/script.js"></script>



</html>