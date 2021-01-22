<?php

//add connect file
require_once "../db_config/connect.php";

if(isset($_GET["courseName"]) && !empty(trim($_GET["courseName"]))){
    // Get URL parameter
    $courseName =  trim($_GET["courseName"]);


}
$sem_stage = false;
if(isset($_GET["sem_stage"]) && !empty(trim($_GET["sem_stage"]))){
    //Get url parameter
    $sem_stage = trim($_GET["sem_stage"]);
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit timetable</title>
        <!--Add a favicon-->
<link rel='icon' href='favicon.ico' type='image/x-icon'/>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="edit.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>

        <div class="edit-wrapper">
            <div class="header">
            <h2>Time table</h2>
            <h3><a href="../admin/adminpage.php">Dashboard</a></h3>
            </div>
            <div class = "edit-class">
                <div class="block">
                    <div class="semi-block">
                        <label for="course">Course:</label>
                        <h4><?php echo $courseName; ?></h4>
                    </div>
                    <div class="semi-block">
                        <label for="semester-stage">Semester stage:</label>
                        <h4><?php echo $sem_stage; ?></h4>
                        <!-- <select name="semester-stage" id="semester-stage">
                        <option value="1.1">1.1</option>
                        <option value="1.2">1.2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.2">2.2</option>
                        <option value="2.1">3.1</option>
                        <option value="2.1">3.2</option>
                        <option value="2.1">4.1</option>
                        <option value="2.1">4.2</option>
                        <option value="2.1">5.1</option>
                        <option value="2.1">5.2</option>
                        </select> -->
                    </div>
                </div>

                <div class="edit-table">
                    
                    <table>
                        <thead>
                            <tr id="type1">
                            <th>Day/Time</th><th>07 to 10</th><th>08 to 11</th><th>10 to 01</th><th>11 to 02</th><th>01 to 04</th><th>02 to 05</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    <table>
                   

                </div>

            </div>
        </div>
    </body>
</html>

