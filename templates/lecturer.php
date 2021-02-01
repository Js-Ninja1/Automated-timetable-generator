<?php
// Initialize the session
session_start();
 
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
    <title>logged in as a lecture</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; padding: 10px; }
       
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

    <div class = "wrapper">
     <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to timetable generator.</h1>
    
    
     </div>
    </div>
</body>
</html>