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
                            <style>
                            #type2 input[type=text] {
                                border: none;
                                
                                }
                            #type1 input[type=text] {
                                border: none;
                                
                                }
                            #type1 input[type=text]:focus{
                                    outline: none;
                                }
                                #type2 input[type=text]:focus{
                                    outline: none;
                                }
                                
                            </style>
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
                                        //echo "<h5 value='". $row['unitName'] ."'>" .$row['unitName'] ."</h5>";
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
                               // echo "<h2>" .$units_array[0] ."</h2>";
                                $unit = $units_array[$rand_index];
                                //echo "<h2>" .$unit ."</h2>";
                                                             // Close statement
                            mysqli_stmt_close($stmt);
            
                            }else{
                                echo "Something went wrong";
                            }

                            


                            //Calling rooms
                            $rooms = mysqli_query($link, "SELECT room FROM rooms");
                            while($room = mysqli_fetch_array($rooms)){
                                
                               //echo "<td value='". $room['room'] ."'>" .$room['room'] ."</td>";
                               //append array units_array with new units;
                               array_push($rooms_array, $room['room']);
                            }
                            $rand_index = array_rand($rooms_array);
                            //room selected randomly
                            $roomR = $rooms_array[$rand_index];
                            //echo "<h3>". $roomR ."</h3>";


                            


                            //create & write into generate table 
                            //initialize empty variables
                            $courseNameG = $courseName;
                            $sem_stageG = $sem_stage;
                            // $unit_selected_rand = $unit;
                            //echo $unit;
                            $roomG = $roomR;
                            //echo $roomG;

                            //Select a day randomly
                            //$rand_index = array_rand($days);
                            $dayG = $days[0];
                            //echo "<h4>". $dayG ."</h4>";

                            //select a time frame randomly for the first allcation
                            $rand_index = array_rand($time_frames);
                            $time_frame_G = $time_frames[$rand_index];
                            //echo "<h3>". $time_frame_G ."</h3>";

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

                                }mysqli_stmt_close($stmtG);




                            }


                            
                            echo implode(', ', $units_array);
                            $lessons = array("", "", "", "", "", "");
                            $lessons1 = array("", "", "", "", "", "");
                            $lessons2 = array("", "", "", "", "", "");
                            $lessons3 = array("", "", "", "", "", "");
                            $lessons4 = array("", "", "", "", "", "");
                            // while(sizeof($units_array)){
                            //     $rand_indexu = array_rand($units_array);
                            //     $unit_l = $units_array[$rand_indexu];
                            //     if($unit_l != $unit){
                            //     $rand_indexa = array_rand($lessons);
                            //     $lessons[$rand_indexa] = $unit_l;
                            //     }
                            //     echo "Hello";

                            // }
                            $units_per_day = array(1, 2, 3);
                            //$random_num = array_rand($units_per_day);
                            //$loops = count($units_array);
                            $allocated_units = array();
                            foreach($units_array as $unit_l){
                                
                                if($unit_l != $unit || $unit_l = $unit){
                                   
                               
                                $rand_indexa = array_rand($lessons);
                                //if(in_array($unit_l, $lessons)){
                                $lessons[$rand_indexa] = $unit_l;
                                //}
                                // $unit1_selected1 = $unit_l;
                                // array_push($allocated_units, $unit1_selected1);
                                //echo "<h2>". $unit1_selected ."</h2>";
                                
                                //while($loops <= $units_per_day[$random_num]){

                                $rand_indexa = array_rand($lessons1);
                                $lessons1[$rand_indexa] = $unit_l;
                                //}

                                $rand_indexa = array_rand($lessons2);
                                $lessons2[$rand_indexa] = $unit_l;

                                $rand_indexa = array_rand($lessons3);
                                $lessons3[$rand_indexa] = $unit_l;

                                $rand_indexa = array_rand($lessons4);
                                $lessons4[$rand_indexa] = $unit_l;
                                //$lessons[1] = "";
                                }
                                //else{
                                    //$lessons[$rand_indexa] = "";
                                    // foreach($lessons as $lesson){
                                    //     $lesson = "";
                                    // }
                                //}
                                // if($unit_l = $unit){
                                //     //$unit_l = "";

                                //     $rand_indexa = array_rand($lessons);
                                //     $lessons[$rand_indexa] = "";
                                // }
                            }
                            // foreach($lessons as $lesson){
                            //     echo $lesson;
                            // }

                            //echo implode(', ', $allocated_units);



                            echo "<table class='generate-table'>";
                            echo "<tbody>";

                            echo "<tr id='type2'>";
                            echo "<td>"."<input type='text' value= ". $days[0] .">" . "</td>";
                            //if(sizeof($lessons) <= 3){
                                // if($lessons[0] || $lessons[1]){
                                //     echo "<h1>". $lessons[0] ."</h1>";
                                //     echo "<h1>". $lessons[1] ."</h1>";
                                // }
                                if($lessons[0] && $lessons[1] && $lessons[2] && $lessons[3] && $lessons[4] && $lessons[5]){
                                    echo "<td>". $lessons[0] ."</td>";
                                    echo "<td>". $lessons[1] ."<br>". $roomG ."</td>";
                                    echo "<td>". $lessons[2]. "</td>";
                                    echo "<td>". $lessons[3]. "</td>";
                                    echo "<td>". $lessons[4]. "</td>";
                                    echo "<td>". $lessons[5]. "</td>";

                                }elseif($lessons[0] && $lessons[2]){
                                    echo "<td>"."<input type='text' value= ". $lessons[0] .">" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[2] .">" . "</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[0] && $lessons[3]){
                                    echo "<td>"."<input type='text' value= ". $lessons[0] .">" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[3] .">" . "</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[1] || $lessons[4]){
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[1] .">" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[4] .">" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[1]){
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[1] .">" ."<br>". $roomG ."</td>";
                                    echo "<td>". "</td>";
                                    echo "<td>". "</td>";
                                    echo "<td>". "</td>";
                                    echo "<td>". "</td>";
                                }elseif($lessons[2]){
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[2] .">" . "</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[3]){
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[3] .">" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[4]){
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[4] .">" . "</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[5]){
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>"."<input type='text' value= ". $lessons[5] .">" . "</td>";
                                }else{
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }
                            
                            
                            
                            
                            
                            
                            //}
                            echo "</tr>";

                            echo "<tr id='type1'>";
                            echo "<td>". $days[1] . "</td>";
                            // echo "<td>". $lessons1[0]. "</td>";
                            // echo "<td>". $lessons1[1]. "</td>";
                            // echo "<td>". $lessons1[2]. "</td>";
                            // echo "<td>". $lessons1[3]. "</td>";
                            // echo "<td>". $lessons1[4]. "</td>";
                            // echo "<td>". $lessons1[5]. "</td>";

                            if($lessons1[0] && $lessons1[1] && $lessons1[2] && $lessons1[3] && $lessons1[4] && $lessons1[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."<br>". $roomG ."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[4] .">" . "</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[5] .">" .  "</td>";

                            }elseif($lessons1[0] || $lessons1[2]){
                                echo "<td>"."<input type='text' value= ". $lessons1[0] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[2] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[0] || $lessons1[3]){
                                echo "<td>"."<input type='text' value= ". $lessons1[0] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[3] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[1] && $lessons1[4]){
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[1] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[4] .">" . "</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[1]){
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[1] .">" . "<br>". $roomG ."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                            }elseif($lessons1[2]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[2] .">" .  "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[3]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[3] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[4]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[4] .">" .  "</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons1[5] .">" .  "</td>";
                            }else{
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }
                        
                            echo "</tr>";

                            echo "<tr id='type2'>";
                            echo "<td>". $days[2] . "</td>";
                            // echo "<td>". $lessons2[0]. "</td>";
                            // echo "<td>". $lessons2[1]. "</td>";
                            // echo "<td>". $lessons2[2]. "</td>";
                            // echo "<td>". $lessons2[3]. "</td>";
                            // echo "<td>". $lessons2[4]. "</td>";
                            // echo "<td>". $lessons2[5]. "</td>";

                            if($lessons2[0] && $lessons2[1] && $lessons2[2] && $lessons2[3] && $lessons2[4] && $lessons2[5]){
                                echo "<td>"."</td>";
                                echo "<td>". "<br>". $roomG ."</td>";
                                echo "<td>".  "</td>";
                                echo "<td>".  "</td>";
                                echo "<td>".  "</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[5] .">" . "</td>";

                            }elseif($lessons2[0] && $lessons2[2]){
                                echo "<td>"."<input type='text' value= ". $lessons2[0] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[2] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[0] || $lessons2[3]){
                                echo "<td>"."<input type='text' value= ". $lessons2[0] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[3] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[1] || $lessons2[4]){
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[1] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[4] .">" . "</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[1]){
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[1] .">" . "<br>". $roomG ."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                            }elseif($lessons2[2]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[2] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[3]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[3] .">" .  "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[4]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[4] .">" . "</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons2[5] .">" . "</td>";
                            }else{
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }
                        
                            echo "</tr>";

                            echo "<tr id='type1'>";
                            echo "<td>". $days[3] . "</td>";
                            // echo "<td>". $lessons3[0]. "</td>";
                            // echo "<td>". $lessons3[1]. "</td>";
                            // echo "<td>". $lessons3[2]. "</td>";
                            // echo "<td>". $lessons3[3]. "</td>";
                            // echo "<td>". $lessons3[4]. "</td>";
                            // echo "<td>". $lessons3[5]. "</td>";

                            if($lessons3[0] && $lessons3[1] && $lessons3[2] && $lessons3[3] && $lessons3[4] && $lessons3[5]){
                                echo "<td>". "</td>";
                                echo "<td>". "<br>". $roomG ."</td>";
                                echo "<td>".  "</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[3] .">" . "</td>";
                                echo "<td>".  "</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[5] .">" . "</td>";

                            }elseif($lessons3[0] || $lessons3[2]){
                                echo "<td>"."<input type='text' value= ". $lessons3[0] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[2] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[0] && $lessons3[3]){
                                echo "<td>"."<input type='text' value= ". $lessons3[0] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[3] .">" .  "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[1] || $lessons3[4]){
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[1] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[4] .">" .  "</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[2]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[2] .">" .  "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[1]){
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[1] .">" . "<br>". $roomG ."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                            }elseif($lessons3[3]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[3] .">" .  "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[4]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[4] .">" .  "</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons3[5] .">" .  "</td>";
                            }else{
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }
                        
                            echo "</tr>";

                            echo "<tr id='type2'>";
                            echo "<td>". $days[4] . "</td>";
                            // echo "<td>". $lessons4[0]. "</td>";
                            // echo "<td>". $lessons4[1]. "</td>";
                            // echo "<td>". $lessons4[2]. "</td>";
                            // echo "<td>". $lessons4[3]. "</td>";
                            // echo "<td>". $lessons4[4]. "</td>";
                            // echo "<td>". $lessons4[5]. "</td>";

                            if($lessons4[0] && $lessons4[1] && $lessons4[2] && $lessons4[3] && $lessons4[4] && $lessons4[5]){
                                echo "<td>". "</td>";
                                echo "<td>". "<br>". $roomG ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[2] .">" .  "</td>";
                                echo "<td>".  "</td>";
                                echo "<td>".  "</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[5] .">" . "</td>";

                            }elseif($lessons4[0] && $lessons4[2]){
                                echo "<td>"."<input type='text' value= ". $lessons4[0] .">" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[2] .">" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[0] || $lessons4[3]){
                                echo "<td>"."<input type='text' value= ". $lessons4[0] .">" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[3] .">" . "</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[1] && $lessons4[4]){
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[1] .">" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[4] .">" . "</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[2]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[2] .">" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[1]){
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[1] .">" ."<br>". $roomG ."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                            }elseif($lessons4[3]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."<input type='text' value= ". $lessons4[3] .">" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[4]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[4] .">" . "</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' value= ". $lessons4[5] .">" . "</td>";
                            }else{
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }
                        
                            echo "</tr>";
                            echo "</tbody";
                            echo "</table>";





                            mysqli_close($link);
                            


                            //define variables
                            // $id1 = "";
                            // $unit_name1 = "";
                            // $room1 = "";
                            // $day1 = "";
                            // $time_frame1 = "";

                            //read from db table generate
                            // $sql_read = "SELECT id, unitName, room, day, time_frame FROM generate WHERE courseName = ?, semStage = ?, unitName = ?, day = ?, time_frame = ?";
                            // if($stmt_read = mysqli_prepare($link, $sql_read)){
                            //     // Bind variables to the prepared statement as parameters
                            //     mysqli_stmt_bind_param($stmt_read, "sssss", $param_courseR, $param_sem_R, $param_unit_R, $param_day_R, $param_time_R);
                                
                            //     // Set parameters
                            //     $param_courseR = $courseNameG;
                            //     $param_sem_R = $sem_stageG;
                            //     $param_unit_R = $unit;
                            //     $param_day_R = $dayG;
                            //     $param_time_R = $time_frame_G;
                                
                            //     // Attempt to execute the prepared statement
                            //     if(mysqli_stmt_execute($stmt_read)==1){
                            //         $result = mysqli_stmt_get_result($stmt_read);
                        
                            //         if(mysqli_num_rows($result) >= 1){
                            //             /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                            //             $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        
                            //             // Retrieve individual field value
                            //             $id1 = $row["id"];
                            //             $unit_name1 = $row["unitName"];
                            //             echo $row["unitName"];
                            //             $room1 = $row["room"];
                            //             $day1 = $row["day"];
                            //             $time_frame1 = $row["time_frame"];

                                       
                            //         } else{
                            //             // URL doesn't contain valid id. Redirect to error page
                            //             echo "The result was wrong: contains more that 1 results";
                            //         }
                                    
                            //     } else{
                            //         echo "Oops! Request was not executed as expected.";
                            //     }

                                
                            //     // Close statement
                            //     mysqli_stmt_close($stmt_read);
                               
                            // } echo  "<h1>". $id1 ."</h1>";
                            // echo $unit_name1;
                            // echo $room1;
                            // echo $day1;
                            // echo $time_frame1;
                            // echo "Hello";
                             

                            // $stmt_read = $mysqli -> prepare("SELECT id, unitName, room, day, time_frame FROM generate WHERE courseName = ?, semStage = ?, unitName = ?, day = ?, time_frame = ?");
                            // $stmt_read -> execute();
                            // $result_read = $stmt_read -> get_result();
                            // $row = $result_read -> fetch_assoc();

                            // $id1 = $unit_name1 = $room1 = $day1 = $time_frame1 = "";

                            // $sql_read = "SELECT DISTINCT id, unitName, room, day, time_frame FROM generate WHERE courseName = ?";//, semStage = ?, unitName = ?";
                            // if($stmt_read = mysqli_prepare($link, $sql_read)){
                            //     //bind
                            //     mysqli_stmt_bind_param($stmt_read, "s", $param_courseR);//, $param_sem_R, $param_unit_R);

                            //     //set params
                            //     $param_courseR = $courseName;
                            //     // $param_sem_R = $sem_stage;
                            //     // $param_unit_R = $unit;
                            //     // $param_day_R = $dayG;
                            //     // $param_time_R = $time_frame_G;

                            //     if(mysqli_stmt_execute($stmt_read)){
                            //         $result = mysqli_stmt_get_result($stmt_read);

                            //         if(mysqli_num_rows($result) == 1){
                            //             $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            //             //RETRIEVE
                            //             $id1 = $row["id"];
                            //             $unit_name1 = $row["unitName"];
                            //             $room1 = $row["room"];
                            //             $day1 = $row["day"];
                            //             $time_frame1 = $row["time_frame"];
                            //             //echo $id1;
                            //             echo "<h1>" .$id1."</h1>";
                            //             echo "<h1>" .$unit_name1."</h1>";
                            //             echo "<h1>" .$room1."</h1>";
                            //             echo "<h1>" .$day1."</h1>";
                            //             echo "<h1>" .$time_frame1."</h1>";
                            //             //echo "hello";
                            //         }else{
                            //             echo "Did not fetch any";
                            //         }
                            //     }else{
                            //         echo "Did not execute";
                            //     }
                            //     // Close statement
                            // mysqli_stmt_close($stmt_read);


                            // }else{
                            //     echo "Nothing happened here";
                            // }
                            
                            
                            



                           







                            ?>
                            </tr>
                        </tbody>
                    <table>
                   

                </div>

            </div>
        </div>
    </body>
</html>

