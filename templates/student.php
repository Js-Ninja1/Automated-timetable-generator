<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}



//scan pdf directory

$dir = "../pdf/";
$scanner = scandir($dir,1);

//print_r($scanner);
//echo $scanner[0];

if ($scanner) {
  foreach($scanner as $key => $value) {
        if ($value == "." || $value == "..") {
           unset($key);
        }
  }
}
   echo "<ul style = 'padding: 20px; list-style: none'>";
foreach($scanner as $k => $v) {
 echo "<li style = 'padding: 20px'><a target = '_blank' href=\"$dir/" . $v . "\" download>". $scanner[$k] ."</a></li>";
}
   echo "</ul>";


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>logged in as a student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; 
            padding: 10px;
            color: white;
        /*background-image: url(../images/lecture.jpg);*/
        /* background-image: url("../images/undraw_professor_8lrt.svg"); */

  /* Full height */
  height: 100%;
  width: 100%;
background-color: #1F1F41;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
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
#image{
    position: fixed;
  right: 0;
  bottom: 0;
  width: 80%;
  height: 80%;
}
form{
    padding-top: 100px;
    margin-left: 5px;
}
label{
    font-size: 20px;
}
input[type=text] {
  float: left;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}
input[type=text] {
    border: 1px solid #ccc;
  }
  .search-container {
  float: right;
}
.search-container button {
  float: left;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #1F1F41;
  font-size: 17px;
  border: none;
  cursor: pointer;
}
.search-container button:hover {
  background: #1F1F4110;
}
@media screen and (max-width: 600px) {
  .search-container {
    float: none;
  }
  input[type=text], .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .fa fa-search{
      color: #1F1F41;
  }
  ul li{
    padding: 30px;
  }
  </style>
    
    
  
</head>
<body>
<img id = "image" src="../images/undraw_Reading_book_re_kqpk.svg" alt="">

    <div class = "wrapper">
     <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to students room.</h1>

       
    
     </div>
    </div>
</body>
</html>