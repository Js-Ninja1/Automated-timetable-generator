<?php

$courseName;
$sem_stage;

if(isset($_GET["courseName"]) && !empty(trim($_GET["courseName"]))){
    // Get URL parameter
    $courseName =  trim($_GET["courseName"]);


}
$sem_stage = false;
if(isset($_GET["sem_stage"]) && !empty(trim($_GET["sem_stage"]))){
    //Get url parameter
    $sem_stage = trim($_GET["sem_stage"]);
}

//select units from table courses where course name and semester stage have been passed here



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
                            <tr>

                            <?php

                            //add connect file
                            require_once "../db_config/connect.php";

                           
                            $sql =  "SELECT unitName FROM courses WHERE courseName = ? AND semStage = ?";
                            if($stmt = mysqli_prepare($link, $sql)){
                                // Bind variables to the prepared statement as parameters
                                mysqli_stmt_bind_param($stmt, "ss", $param_course_name, $param_sem_stage);
                                
                                // Set parameters
                                $param_course_name = $courseName;
                                $param_sem_stage = $sem_stage;

                                 // Attempt to execute the prepared statement
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);

                                    if(mysqli_num_rows($result) >= 1){
                                        /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                                    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    // echo "Hello world";
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        echo "<h5 value='". $row['unitName'] ."'>" .$row['unitName'] ."</h5>";
                                    }
                                    }else{
                                        echo "Nothing was found";
                                    }
                                    
                                }else{
                                    echo "Did not execute";
                                }
                                                             // Close statement
                            mysqli_stmt_close($stmt);
            
                            }else{
                                echo "Something went wrong";
                            }

                            
                            $rooms = mysqli_query($link, "SELECT room FROM rooms");
                            while($room = mysqli_fetch_array($rooms)){
                                
                               echo "<td value='". $room['room'] ."'>" .$room['room'] ."</td>";
                            }


                           

                            mysqli_close($link);


                            ?>
                            </tr>
                        </tbody>
                    <table>
                   

                </div>

            </div>
        </div>
    </body>
</html>

