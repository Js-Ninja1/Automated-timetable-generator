<?php
// Initialize the session
session_start();
 // Store data in session variables
//  $_SESSION["loggedin"] = true;
//  $_SESSION["username"] = $username;
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; padding: 10px; }
        #myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}
.wrapper{
    
            padding: 20px;
            position: absolute;
  
  margin: -25px 0 0 -25px;

}
.page-header{
    float: left;
}
.page-header h1{
    color: white;
    
}
.reset-logout{
    float: right;
    padding-right: 0px;
    margin-right: 100px;
}
    </style>
</head>
<body>
<!-- The video -->
<video autoplay muted loop id="myVideo">
  <source src="images/Cadigal _ Commercial Office Leasing Sydney _ Lease Office Space Sydney.mp4" type="video/mp4">
</video>
<div class = "wrapper">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to timetable generator.</h1>
    
    <div class = "reset-logout">
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    </div>
    </div>
    <div class = "body">
    <div class = "roots">
    <a href="admin/adminpage.php" class="btn btn-warning">Continue as Admin</a>
    <a href="templates/lecturer.php" class="btn btn-warning">Continue as Lecture</a>
    <a href="templates/student.php" class="btn btn-warning">Continue as Student</a>
    </div>
    </div>
    </div>
    <?php

    ?>
</body>
</html>