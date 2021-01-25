<?php

$courseName;
$sem_stage;

 //Craete array for time frames;
 $time_frames = array("07am-10am", "08am-11am", "10am-1pm", "11am-2pm", "1pm-4pm", "2pm-5pm");

 //create days of the week array
 $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");

 

 //create an array so that i can push units into it while looping
 $units_array = array();

 //Create an array to store rooms;
 $rooms_array = array();
                            

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
                            <th>Day/Time</th><th><?php echo $time_frames[0]; ?></th><th><?php echo $time_frames[1]; ?></th><th><?php echo $time_frames[2]; ?></th><th><?php echo $time_frames[3]; ?></th><th><?php echo $time_frames[4]; ?></th><th><?php echo $time_frames[5]; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            <?php

                            //add connect file
                            require_once "../db_config/connect.php";



                           //calling units of a particular course
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
                                        //append array units_array with new units;
                                        array_push($units_array, $row['unitName']);
                                        
                                    }
                                    }else{
                                        echo "Nothing was found";
                                    }
                                    
                                }else{
                                    echo "Did not execute";
                                }
                                $rand_index = array_rand($units_array);
                                echo "<h2>" .$units_array[0] ."</h2>";
                                $unit = $units_array[$rand_index];
                                echo "<h2>" .$unit ."</h2>";
                                                             // Close statement
                            mysqli_stmt_close($stmt);
            
                            }else{
                                echo "Something went wrong";
                            }

                            


                            //Calling rooms
                            $rooms = mysqli_query($link, "SELECT room FROM rooms");
                            while($room = mysqli_fetch_array($rooms)){
                                
                               echo "<td value='". $room['room'] ."'>" .$room['room'] ."</td>";
                               //append array units_array with new units;
                               array_push($rooms_array, $room['room']);
                            }
                            $rand_index = array_rand($rooms_array);
                            //room selected randomly
                            $roomR = $rooms_array[$rand_index];
                            echo "<h3>". $roomR ."</h3>";


                            


                            //create & write into generate table 
                            //initialize empty variables
                            $courseNameG = $courseName;
                            $sem_stageG = $sem_stage;
                            $unit_selected_rand = $unit;
                            echo $unit;
                            $roomG = $roomR;
                            echo $roomG;

                            //Select a day randomly
                            $rand_index = array_rand($days);
                            $dayG = $days[$rand_index];
                            echo "<h4>". $dayG ."</h4>";

                            //select a time frame randomly for the first allcation
                            $rand_index = array_rand($time_frames);
                            $time_frame_G = $time_frames[$rand_index];
                            echo "<h3>". $time_frame_G ."</h3>";

                            //Prepare statement here
                            $sqlG = "INSERT INTO generate (courseName, semStage, unitName, room, day, time_frame) VALUES (?, ?, ?, ?, ?, ?)";
                            if($stmtG = mysqli_prepare($link, $sqlG)){
                                //bind params
                                mysqli_stmt_bind_param($stmtG, "ssssss", $param_course_G, $param_sem_G, $param_unit_G, $param_room, $param_day_G, $param_time_frame_G);
                                //set parameters
                                $param_course_G = $courseNameG;
                                $param_sem_G = $sem_stageG;
                                $param_unit_G = $unit;
                                $param_room = $roomG;
                                $param_day_G = $dayG;
                                $param_time_frame_G = $time_frame_G;

                                //attempt to execute
                                if(mysqli_stmt_execute($stmtG)){
                                    //success
                                }else{
                                    echo "Something went wrong while writing first elements to generate table";
                                }




                            }
                            mysqli_stmt_close($stmtG);



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

