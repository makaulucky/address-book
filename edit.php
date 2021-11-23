<?php
error_reporting(0);
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--add bootstrap css here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit Address Book</title>

 
    
    <div class="main-container-body"> 
        <div class="main-content">
            <div class="main-content-header">
                <h3>Edit Contact</h3>
            </div>
            <?php
            include "dbconfig.php";
            $Id = $_GET['Id'];
            $query = "SELECT * FROM new_record WHERE Id = '$Id'";
            $result = $con->query($query);
            while ($row=mysqli_fetch_array($result)) {
                $Id = $row['Id'];
                $Fname = mysqli_real_escape_string($con, $row['Fname']);
                $Lname = mysqli_real_escape_string($con, $row['Lname']);
                $Email_ = mysqli_real_escape_string($con, $row['Email_']);
                $Phone_ = mysqli_real_escape_string($con, $row['Phone_']);
                $Address_ = mysqli_real_escape_string($con, $row['Address_']);
                $City_ = mysqli_real_escape_string($con, $row['City_']);
                $State_ = mysqli_real_escape_string($con, $row['State_']);
                $Zip_ = mysqli_real_escape_string($con, $row['Zip_']);
                $Country_ = mysqli_real_escape_string($con, $row['Country_']);
                
            }
            ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit | You are about to edit <?php echo "$Fname 's details"?></li>
                </ol>
            </nav>
            <div class="wizard-content">
                <?php
                include 'dbconfig.php';
                if(isset($_POST['Submit'])){
                   
                    $Fname = mysqli_real_escape_string($con, $_POST['Fname']);
                    $Lname = mysqli_real_escape_string($con, $_POST['Lname']);
                    $Email_ = mysqli_real_escape_string($con, $_POST['Email_']);
                    $Phone_ = mysqli_real_escape_string($con, $_POST['Phone_']);
                    $Address_ = mysqli_real_escape_string($con, $_POST['Address_']);
                    $City_ = mysqli_real_escape_string($con, $_POST['City_']);
                    $State_ = mysqli_real_escape_string($con, $_POST['State_']);
                    $Zip_ = mysqli_real_escape_string($con, $_POST['Zip_']);
                    $Country_ = mysqli_real_escape_string($con, $_POST['Country_']);
                    
                   $query = "UPDATE new_record SET Fname = '$Fname', Lname = '$Lname', Email_ = '$Email_', Phone_ = '$Phone_', Address_ = '$Address_', City_ = '$City_', State_ = '$State_', Zip_ = '$Zip_', Country_ = '$Country_' WHERE Id = '$Id'";
                    if(mysqli_query($con, $query)) {
                        echo "
                        <div class=\"alert alert-success\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                    <strong>Success!</strong> Record has been updated.
                                    </div>
                            <a href=\"index.php\">Go to Home</a>
                        ";
                        
                    } else {
                        echo "
                        <div class=\"alert alert-danger\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                                    <strong>Error!</strong> There was a problem updating the record. <a href=\"edit.php?Id=$Id\">Try again</a> 
                                    </div>
                          
                        ";
                    }
                }
                
                ?>
            <form method="POST" class="">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Fname">First Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Fname" name="Fname" value="<?php echo $Fname; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Lname">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Lname" name="Lname" value="<?php echo $Lname; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Email_">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="Email_" name="Email_" value="<?php echo $Email_; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Phone_">Phone:</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="Phone_" name="Phone_" value="<?php echo $Phone_; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Address_">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Address_" name="Address_" value="<?php echo $Address_; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="City_">City:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="City_" name="City_" value="<?php echo $City_; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="State_">State:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="State_" name="State_" value="<?php echo $State_; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Zip_">Zip:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Zip_" name="Zip_" value="<?php echo $Zip_; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Country_">Country:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Country_" name="Country_" value="<?php echo $Country_; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



            