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
    <? include_once './include/head.php'; ?>
<body>
   <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.png" alt=""></a>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-content">
                        <h1>Welcome to Address Book</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui. 


                        </p>
                        <a href="add.php" class="btn btn-primary">Add New Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-area">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-title">
                                    <h2>Contact List</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-table">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once 'dbconfig.php';
                                            $sql = "SELECT * FROM `Users`";
                                            $result = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['Fname']; ?></td>
                                                    <td><?php echo $row['Email']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td>
                                                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    






</body>
<?php
include_once './include/scripts.php';?>
</html>