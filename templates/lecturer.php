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
        <?php //$data .= '<h1>Hi, <b>'. $username .'</b>. Welcome to lectures room.</h1>'; ?>

        <form>
            <label for="search-lecture">Enter your name here</label>
            <div class= "search-container">
            <div class="search-box">
        <input type="text" name="search-lecture" autocomplete="off" placeholder="Search..">
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