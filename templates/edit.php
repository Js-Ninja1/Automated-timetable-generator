<?php

//add connect file
require_once "../db_config/connect.php";

if(isset($_GET["courseName"]) && !empty(trim($_GET["courseName"]))){
    // Get URL parameter
    $courseName =  trim($_GET["courseName"]);


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
                        <select name="semester-stage" id="semester-stage">
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
                        </select>
                    </div>
                </div>

                <div class="edit-table">
                    
                    <table>
                        <thead>
                            <tr id="type1">
                            <th>Day/Time</th><th>08 to 10</th><th>10 to 12</th><th>12 to 2</th><th>2 to 4</th><th>4 to 6</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id = "type2">
                                <td>Monday</td>
                                <td>
                                <select id="unit" name="units" class="units">
                            <option disabled selected>--Select unit--</option>
                            <?php 
                            require_once("../db_config/connect.php");

                            //prepare a statement
                            //$sql_query = "SELECT courseName FROM courses";
                            // $records = mysqli_query($link, 
                            $sql = "SELECT unitName FROM courses WHERE courseName = ?";
                            if($stmt = mysqli_prepare($link, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "s", $param_course_name);
                                
                                // Set parameters
                                $param_course_name = $courseName;

                                // Attempt to execute the prepared statement
                            if(mysqli_stmt_execute($stmt)){
                                $result = mysqli_stmt_get_result($stmt);

                                if(mysqli_num_rows($result) >= 1){
                                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                         // Retrieve individual field value
                                    // $unit_name = $row["unitName"];
                                    echo "<option value='". $row['unitName'] ."'>" .$row['unitName'] ."</option>";

                                    }
                                    
                                   
                    
                                } else{
                                    // URL doesn't contain valid id. Redirect to error page
                                    echo "URL does not contain validid";
                                }
                                
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                        
                        
                        // Close statement
                        mysqli_stmt_close($stmt);
                        
                        // Close connection
                        mysqli_close($link);
                    }  else{
                        // URL doesn't contain id parameter.
                        echo "URL does not contain id parameter";
                        
                    }
                    
                            // while($data = mysqli_fetch_array($records)){
                                
                            //     echo "<option value='". $data['courseName'] ."'>" .$data['courseName'] ."</option>";
                            // }
?>
                                </td><td></td><td></td><td></td><td></td>
                            </tr>
                            <tr id="type1">
                                <td>Tuesday</td><td></td><td></td><td></td><td></td><td></td>
                            </tr>
                            <tr id = "type2">
                                <td>Wednesday</td><td></td><td></td><td></td><td></td><td></td>
                            </tr>
                            <tr id="type1">
                                <td>Thursday</td><td></td><td></td><td></td><td></td><td></td>
                            </tr>
                            <tr id = "type2">
                                <td>Friday</td><td></td><td></td><td></td><td></td><td></td>
                            </tr>
                        </tbody>
                    <table>
                   

                </div>

            </div>
        </div>
    </body>
</html>

