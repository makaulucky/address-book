
<!DOCTYPE html>
<html lang="en">
<?php 
include_once './include/head.php';
?>

<body>
    <div>
        <section class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Signup Here</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="register.php" method="post">
<?php
include 'dbconfig.php';
if (isset($_POST['users']))
{
    $Fname= mysqli_real_escape_string($con,$_POST['Fname']);
    $Lname= mysqli_real_escape_string($con,$_POST['Lname']);
    $Username= mysqli_real_escape_string($con,$_POST['Username']);
    $Email= mysqli_real_escape_string($con,$_POST['Email']);
    $Passwordk= mysqli_real_escape_string($con,$_POST['Passwordk']);
    $Confirm_Password= mysqli_real_escape_string($con,$_POST['Confirm_Password']);

    $Salt= "#76#Secure?";
    $Passwordk= md5($Passwordk.$Salt);
    $Confirm_Password= md5($Confirm_Password.$Salt);

   $sql="INSERT INTO users
    (Fname,Lname,Username,Email,Passwordk,Confirm_Password) 
    
    VALUES('$Fname','$Lname','$Username','$Email','$Passwordk','$Confirm_Password')";

       if(mysqli_query($con,$sql))
        {
            echo "<div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Success!</strong> You have registered successfully.
            return to <a href='login.php'>Login</a>
            </div>";
        }
        else
        {
            echo "<div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Error!</strong> You have not registered successfully.


            <a href='register.php'>Try Again</a>

            </div>";
        }

}

?>
                        <div class="form-group">
                            <label for="Fname">First Name</label>
                            <input required autocomplete="off" type="text" class="form-control" id="Fname" name="Fname" placeholder="Fname">
                        </div>
                        <div class="form-group">
                            <label for="Lname">Last Name</label>
                            <input required autocomplete="off" type="text" class="form-control" id="Lname" name="Lname" placeholder="Lname">
                        </div>
                        <div class="form-group ">
                            <label for="username">Username</label>
                            <input required autocomplete="off" type="text" class="form-control" id="Username" name="Username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input required autocomplete="off" type="Email" class="form-control" id="Email" name="Email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required autocomplete="off" type="password" class="form-control" id="Passwordk" name="Passwordk" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input required autocomplete="off" type="password" class="form-control" id="Confirm_Password" name="Confirm_Password" placeholder="Confirm Password">
                        </div>
                        <button type="submit" name="users" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>
</html>













