<?php
error_reporting();
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <!--add bootstrap css here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <title>Address Book</title>
</head>


<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="content-area">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-title">
                            <h1>Add Address</h1> <br>
                            <!--back button-->
                            <a href="index.php" class="btn btn-primary">View Addresses</a>
                        </div>
                        
                            <hr>
                             
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-body">
                            <?php
                            //include database connection
                            include 'dbconfig.php';
                            //check if form is submitted
                            if (isset($_POST['submit'])) {

                                $Fname = mysqli_real_escape_string($con, $_POST['Fname']);
                                $Lname = mysqli_real_escape_string($con, $_POST['Lname']);
                                $Email_ = mysqli_real_escape_string($con, $_POST['Email_']);
                                $Phone_ = mysqli_real_escape_string($con, $_POST['Phone_']);
                                $Address_ = mysqli_real_escape_string($con, $_POST['Address_']);
                                $Country_ = mysqli_real_escape_string($con, $_POST['Country_']);
                                $City_ = mysqli_real_escape_string($con, $_POST['City_']);
                                $State_ = mysqli_real_escape_string($con, $_POST['State_']);
                                $Zip_ = mysqli_real_escape_string($con, $_POST['Zip_']);

                                //insert data to database
                               $sql = "INSERT INTO `new_record` (`Fname`, `Lname`, `Email_`, `Phone_`, `Address_`,`Country_`, `City_`, `State_`, `Zip_`) 
                                VALUES ('$Fname','$Lname','$Email_','$Phone_','$Address_','$Country_','$City_','$State_','$Zip_')";
                                $result = mysqli_query($con, $sql);
                                
                                //display success message                                
                                if ($result) {
                                    echo '<div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Success!</strong> New record has been added.
                                    </div>';
                                } else {
                                    echo '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Error!</strong> There was a problem adding the record. <a href="add.php">Try again</a> 
                                    </div>';
                                }
                            }

                            ?>
                            <form action="add.php" method="post">
                                <div class="form-group">
                                    <label for="Fname">First Name</label>
                                    <input required autocomplete="off" type="text" name="Fname" class="form-control" id="Fname" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label for="Lname">Last Name</label>
                                    <input required autocomplete="off" type="text" name="Lname" class="form-control" id="Lname" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="Email_">Email</label>
                                    <input required autocomplete="off" type="email" name="Email_" class="form-control" id="Email_" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="Phone">Phone</label>
                                    <input required autocomplete="off" type="tel" name="Phone_" class="form-control" id="Phone_" placeholder="Enter Phone">
                                </div>
                                <div class="form-group">
                                    <label for="Address">Address</label>
                                    <input required autocomplete="off" type="text" name="Address_" class="form-control" id="Address_" placeholder="Enter Address">
                                </div>
                                <div class="form-group">
                                    <label for="Country">Country</label>
                                    <input required autocomplete="off" type="text" name="Country_" class="form-control" id="Country_" placeholder="Enter City">
                                </div>
                                <div class="form-group">
                                    <label for="City">City</label>
                                    <input required autocomplete="off" type="text" name="City_" class="form-control" id="City_" placeholder="Enter City">
                                </div>
                                <div class="form-group">
                                    <label for="State">State</label>
                                    <input required autocomplete="off" type="text" name="State_" class="form-control" id="State_" placeholder="Enter State">
                                </div>
                                <div class="form-group">
                                    <label for="Zip">Zip</label>
                                    <input required autocomplete="off" type="text" name="Zip_" class="form-control" id="Zip_" placeholder="Enter Zip">
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
</body>
<!--add jquery scripts here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--add datatable scripts here -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="js/script.js"></script>

</html>