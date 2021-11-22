<?php 
error_reporting();
ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="en">
 <?php include_once './include/head.php'; ?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Login</h1>
            </div>
        </div>
    </div>
</header>
<body class="body">

<!--login form starts here-->

<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="register.php" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">


                            <?php
if (isset($_POST['Submit'])) 
 {
     include_once 'dbconfig.php';
        $Username = $_POST['Username'];
        $Passwordk = $_POST['Passwordk'];

        $Salt="#76#Secure?";
        $Passwordk =md5($Passwordk.$Salt);
      

        $query = mysqli_query($con,"SELECT * FROM users WHERE Username='$Username' AND Passwordk='$Passwordk'");
        if (mysqli_num_rows($query) >= 1) 
        {
            //storing session data
            $_SESSION["Username"] = "$Username";
            header("location:index.php");
        }
        else
        {
            echo "
            <div class='alert alert-danger'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Error!</strong> Username or Password is incorrect.
            </div>
            
            ";
        }
}

?>

                                <form method="POST" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="Username" id="Username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="Passwordk" id="Passwordk" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div>
                                        <button type="Submit" name="Submit" class="btn btn-primary btn-lg btn-block">Login</button>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--login form ends here-->
    

    
</body>
</html>































