<?php

//set_time_limit(1000);
//ini_set("memory_limit","50M");
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


require_once "../db_config/connect.php";
// Check existence of id parameter before processing further
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 // require_once "config.php";
  
  // Prepare a select statement
  $sql = "SELECT DISTINCT * FROM lecturer_timetable WHERE name = ?";
  
  if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_name);
      
      // Set parameters
      $param_name = trim($_POST["search-lecture"]);
      
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          $result = mysqli_stmt_get_result($stmt);

          if(mysqli_num_rows($result) > 0){

            echo '<table>';
            echo '<tr><th> Lecturer Name:'.$_POST["search-lecture"].'</th></tr>';
            echo '<tr><th>DAY</th><th>UNIT NAME</th><th>TIME</th><th>COURSE</th><th>ROOM</th></tr>';
            // Fetch result rows as an associative array
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
              //echo "<p>" . $row["name"] . "</p>";

    
              
              // Retrieve individual field value
              $id = $row["id"];
              $name = $row["name"];
              $course = $row["course"];
              $day = $row['day'];
              $unitName = $row['unitName'];
              $time = $row['time'];
              $room = $row['room'];

              // echo $id;
              // echo $name;
              // echo $course;
              // echo $day;
              // echo $unitName;
              // echo $time;

             
              
              echo '<tr><td>'. $day .'</td><td>'.$unitName.'</td><td>'.$time.'</td><td>'.$course.'</td><td>'.$room.'</td></tr>';
             

          } 
          echo '</table>';
      }
     } else{
          echo "Oops! Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  mysqli_stmt_close($stmt);
  
  // Close connection
  mysqli_close($link);
} else{
  
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>logged in as a lecture</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <!--import jquery for the genarate time table name popup-->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="../jQuery/jquery-3.5.1.js"></script>
 
      <script>
  //  document.getElementById("but").addEventListener("click", showSource());

  //   function showSource(){;
  //   var source = "<html>";
  //   source += document.getElementsByTagName('html')[0].innerHTML;
  //   source += "</html>";
  //   //now we need to escape the html special chars, javascript has escape
  //   //but this does not do what we want
  //  console.log(source);
  //   alert(source);

//}  
// $( window ).on( "load", function() {
//      //var pdf = document.body.innerHTML;
//     // window.location="http://localhost/ATG_project/templates/lecturer.php:"+window.location;
//      //console.log(window.location);
//      $.get('lecturer.php', function(data) {
//     console.log(text(data));
// });
// });
    </script>


<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("lecturer-search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

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
  color: black;
}
input[type=text] {
    border: 1px solid #ccc;
    color: black;
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
  background: #1F1F4180;
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
  }s
  .fa fa-search{
      color: #1F1F41;
  }
  .result{
    color: black;
    background-color: #1F1F41;
  }
  .result p{
    color: black;
    
  }

  .search-box .result{
    color: #1F1F41;
  }
    </style>
</head>
<body>
<?php
//require_once __DIR__ . '../../vendor/autoload.php';
 
?>
<img id = "image" src="../images/undraw_professor_8lrt.svg" alt="">

    <div class = "wrapper">
     <div class="page-header">
     <?php $username = htmlspecialchars($_SESSION["username"]); ?>
        <h1>Hi, <b><?php echo $username; ?></b>. Welcome to lectures room.</h1>
       

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="search-lecture">Enter your name here</label>
            <div class= "search-container">
            <div class="search-box">
        <input type="text" name="search-lecture" autocomplete="off" placeholder="Search...">
        <div class="result"></div>
        </div>
        <button type="submit" id="but"><i class="fa fa-search"></i></button>
        
        </div>
        </form>
    
    
     </div>
    </div>
    <?php
   
    ?>
</body>
</html>