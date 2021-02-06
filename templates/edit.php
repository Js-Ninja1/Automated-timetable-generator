<?php
set_time_limit(1000);
ini_set("memory_limit","50M");
//starting a session
session_start();

//storing session data
$_SESSION['myname'] = 'Gilbert';


$_SESSION['lessons0'] = '';
$_SESSION['select_lec0'] = '';
$_SESSION['check_room0']= '';
$_SESSION['lessons1'] = '';
$_SESSION['select_lec1'] = '';
$_SESSION['check_room1']= '';
$_SESSION['lessons2'] = '';
$_SESSION['select_lec2'] = '';
$_SESSION['check_room2']= '';
$_SESSION['lessons3'] = '';
$_SESSION['select_lec3'] = '';
$_SESSION['check_room3']= '';
$_SESSION['lessons4'] = '';
$_SESSION['select_lec4'] = '';
$_SESSION['check_room4']= '';
$_SESSION['lessons5'] = '';
$_SESSION['select_lec5'] = '';
$_SESSION['check_room5']= '';

$_SESSION['lessons10'] = '';
$_SESSION['select_lec10'] = '';
$_SESSION['check_room10'] = '';
$_SESSION['lessons11'] = '';
$_SESSION['select_lec11'] = '';
$_SESSION['check_room11'] = '';
$_SESSION['lessons12'] = '';
$_SESSION['select_lec12'] = '';
$_SESSION['check_room12'] = '';
$_SESSION['lessons13'] = '';
$_SESSION['select_lec13'] = '';
$_SESSION['check_room13'] = '';
$_SESSION['lessons14'] = '';
$_SESSION['select_lec14'] = '';
$_SESSION['check_room14'] = '';
$_SESSION['lessons15'] = '';
$_SESSION['select_lec15'] = '';
$_SESSION['check_room15'] = '';

$_SESSION['lessons20'] = '';
$_SESSION['select_lec20'] = '';
$_SESSION['check_room20'] = '';
$_SESSION['lessons21'] = '';
$_SESSION['select_lec21'] = '';
$_SESSION['check_room21'] = '';
$_SESSION['lessons22'] = '';
$_SESSION['select_lec22'] = '';
$_SESSION['check_room22'] = '';
$_SESSION['lessons23'] = '';
$_SESSION['select_lec23'] = '';
$_SESSION['check_room23'] = '';
$_SESSION['lessons24'] = '';
$_SESSION['select_lec24'] = '';
$_SESSION['check_room24'] = '';
$_SESSION['lessons25'] = '';
$_SESSION['select_lec25'] = '';
$_SESSION['check_room25'] = '';

$_SESSION['lessons30'] = '';
$_SESSION['select_lec30'] = '';
$_SESSION['check_room30'] = '';
$_SESSION['lessons31'] = '';
$_SESSION['select_lec31'] = '';
$_SESSION['check_room31'] = '';
$_SESSION['lessons32'] = '';
$_SESSION['select_lec32'] = '';
$_SESSION['check_room32'] = '';
$_SESSION['lessons33'] = '';
$_SESSION['select_lec33'] = '';
$_SESSION['check_room33'] = '';
$_SESSION['lessons34'] = '';
$_SESSION['select_lec34'] = '';
$_SESSION['check_room34'] = '';
$_SESSION['lessons35'] = '';
$_SESSION['select_lec35'] = '';
$_SESSION['check_room35'] = '';

$_SESSION['lessons40'] = '';
$_SESSION['select_lec40'] = '';
$_SESSION['check_room40'] = '';
$_SESSION['lessons41'] = '';
$_SESSION['select_lec41'] = '';
$_SESSION['check_room41'] = '';
$_SESSION['lessons42'] = '';
$_SESSION['select_lec42'] = '';
$_SESSION['check_room42'] = '';
$_SESSION['lessons43'] = '';
$_SESSION['select_lec43'] = '';
$_SESSION['check_room43'] = '';
$_SESSION['lessons44'] = '';
$_SESSION['select_lec44'] = '';
$_SESSION['check_room44'] = '';
$_SESSION['lessons45'] = '';
$_SESSION['select_lec45'] = '';
$_SESSION['check_room45'] = '';








$courseName;
$sem_stage;

 //Create array for time frames;
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

         <!--import jquery for the genarate time table name popup-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="../jQuery/jquery-3.5.1.js"></script>
        <script>

//  $( window ).on( "load", function() {
//      var pdf = document.body.innerHTML;
//      //window.location="view-source:"+window.location
//     //var pdf = $("body");
  
//   $.ajax(
//      {
//      url: "finish.php",
//      type: "POST",

//      data: { pdf: pdf},
//      success: function (result) {
//              alert('success');

//      }
//  });     
//     });
    



</script>

<style>
.bttons h3{
color: yellow;
padding: 10px;
float: right;
}
</style>
    </head>
    <body >


        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>

        <!-- <div class="se-pre-con"></div> -->

        <?php
        // ob_start();
        // ob_end_flush();

        // require_once __DIR__ . '../../vendor/autoload.php';

        // $mpdf = new \Mpdf\Mpdf();

        //$data = '';
       // $data .= '<h2>Time table</h2>';

?>

        <div class="edit-wrapper">
            <div class="header">
            <h2>Time table</h2>
            <?php $_SESSION['timetable'] = 'Time table'; ?>
            <div class= "bttons">
            <h3><a href="edit.php">Refresh</a></h3>
            <h3><a href="finish.php">Finish</a></h3>
            <h3><a href="../admin/adminpage.php">Dashboard</a></h3>
            </div>
            </div>
            <div class = "edit-class">
                <div class="block">
                    <div class="semi-block">
                        <label for="course">Course:</label>
                        <h4><?php echo $courseName;
                        $_SESSION['courseName']= $courseName;
                        ?></h4>
                    </div>
                   
                    <div class="semi-block">
                        <label for="semester-stage">Semester stage:</label>
                        <h4><?php echo $sem_stage;
                        $_SESSION['semester_stage'] = $sem_stage; ?></h4>
                        
                    </div>
                    <?php  //$data .= '<h4>Semester stage:</h4>'. $sem_stage; ?>
                </div>

                <div class="edit-table">
                    
                    <table>
                        <thead>
                            <tr id="type1">
                            <th>Day/Time</th><th><?php echo $time_frames[0]; $_SESSION['time0'] = $time_frames[0]; ?></th><th><?php echo $time_frames[1]; $_SESSION['time1'] = $time_frames[1]; ?></th><th><?php echo $time_frames[2]; $_SESSION['time2'] = $time_frames[2]; ?></th><th><?php echo $time_frames[3]; $_SESSION['time3'] = $time_frames[3]; ?></th><th><?php echo $time_frames[4]; $_SESSION['time4'] = $time_frames[4]; ?></th><th><?php echo $time_frames[5]; $_SESSION['time5'] = $time_frames[5]; ?></th>
                            </tr>
                            
                            <style>
                            #type2 input[type=text] {
                                border: none;
                                background-color: #7268e530;
                                border-radius: 5px;
                                
                                }
                            #type1 input[type=text] {
                                border: none;
                                background-color: #ffdc8290;
                                
                                }
                            #type1 input[type=text]:focus{
                                    outline: none;
                                    background-color: #ffdc8290;
                                }
                                #type2 input[type=text]:focus{
                                    outline: none;
                                    background-color: #7268e580;
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


                            
                            //echo implode(', ', $units_array);
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
  
                            //PUSH lectures to this array
                            $lecture_array = array();

                            //Select lectures from the db...
                            //foreach($units_array as $unit_lec){



                        function select_lecture($unit_lec){
                             //add connect file
                            //require_once "../db_config/connect.php";
                            /* Database credentials. Assuming you are running MySQL
                                server with default setting (user 'root' with no password) */
                                // define('DB_SERVER', 'localhost');
                                // define('DB_USERNAME', 'root');
                                // define('DB_PASSWORD', '');
                                // define('DB_NAME', 'timetable_generator');
                                
                                /* Attempt to connect to MySQL database */
                                $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                                
                                // Check connection
                                if($link === false){
                                    die("ERROR: Could not connect. " . mysqli_connect_error());
                                }

                            $sql_lec = "SELECT lectureName FROM lecturer WHERE unitName = ?";
                            $lec_name = "";
                            if($stmt = mysqli_prepare($link, $sql_lec)){
                                //bind variables to p.s
                                mysqli_stmt_bind_param($stmt, "s", $param_unit_name);

                                //set params
                                $param_unit_name = $unit_lec;

                                //execute
                                if(mysqli_stmt_execute($stmt)){
                                    $result = mysqli_stmt_get_result($stmt);
                                    if(mysqli_num_rows($result) == 1){
                                        /*fetch result as an associative array*/
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                                        //RETRIEVE THE VALUE
                                        $lec_name = $row["lectureName"];
                                       // echo $lec_name;
                                        //array_push($lecture_array, $row["lectureName"]);
                                    }else{
                                        //echo "No results for lecture found or the results are more that one";
                                    }
                                }else{
                                    echo "The select request did not go through well";
                                }
                                 // Close statement
                                mysqli_stmt_close($stmt);
                            }
                            return $lec_name;
                        }
                        
                        // $t = select_lecture("Graphics");
                        // echo $t;
                        //echo select_lecture("Graphics");

                        //create rooms array and push data into it
                        $room_array = array();

                        //function to retrive rooms from the database
                        //function retrieve_rooms(){
                            /* Attempt to connect to MySQL database */
                            //$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                            $room_array = array();
                            // Check connection
                            if($link === false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }

                            $sql_room = "SELECT room FROM rooms";
                            if($result = mysqli_query($link, $sql_room)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        array_push($room_array, $row['room']);
                                    }
                                    // Free result set
                                     mysqli_free_result($result);
                                }else{
                                    echo "No records matching your query were found.";
                                }
                            }else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                            }
                            // Close connection
                            //mysqli_close($link);

                        //}

                        //retrieve_rooms();
                       // echo implode(', ', $room_array);


                        //$lessons = array("", "", "", "", "", "");
                        //$time_frames = array("07am-10am", "08am-11am", "10am-1pm", "11am-2pm", "1pm-4pm", "2pm-5pm");

                        

                        





                            //}
                            //echo implode(', ', $lecture_array);
                            /*
                            function hello($t){
                                
                                $ty = "Hello world". $t;
                                return $ty;

                            };
                            hello("heey");
                            */
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
                            /*
                            $lessons[0] = $units_array[0];
                            $lessons[1] = $units_array[1];
                            $lessons[2] = $units_array[2];
                            $lessons[3] = $units_array[3];
                            $lessons[4] = $units_array[4];
                            $lessons[5] = $units_array[5];
                            */

                               // echo implode(',', $lessons);


                            // foreach($lessons as $lesson){
                            //     echo $lesson;
                            // }

                            //echo implode(', ', $allocated_units);


                            $room_array_allocation = array();
                            $rooms_selected = array();

                            $id = array();

                            function check_room_status($any_lesson){
                                $room_selected = "";
                                global $id;
                            if($any_lesson){
                            /* Attempt to connect to MySQL database */
                            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                            
                            // Check connection
                             if($link === false){
                             die("ERROR: Could not connect. " . mysqli_connect_error());
                             }
                             global $lessons;
                             global $time_frames;
                             global $room_array;
                             $t = false;
                             foreach($lessons as $lesson){
                                 foreach($time_frames as $time_frame){
                                     foreach($room_array as $room){
                             if($any_lesson = $lesson){
                                //echo "<h1>". $any_lesson . "</h1>";
                                //$rand_index = array_rand($room_array);
                                //$room_s = $room_array[$rand_index];

                                $sql = "INSERT INTO room_status (room, time, status) VALUES (?, ?, ?)";
                                if($stmt = mysqli_prepare($link, $sql)){
                                    //bind params
                                    mysqli_stmt_bind_param($stmt, "ssi", $param_room, $param_time, $param_status);

                                    //set params
                                    
                                    $param_room = $room;
                                    $param_time = $time_frame;
                                    $param_status = $t;

                                    //execute
                                    if(mysqli_stmt_execute($stmt)){
                                        //success
                                    }else{
                                        echo "Something went wrong. Please try again later.";
                                    }
                                }
                                    // Close statement
                                    mysqli_stmt_close($stmt);

                             }
                            }
                        }
                        }
                            
                            //select and return

                            $sql_select = "SELECT id, room FROM room_status WHERE time = ? && status = ? LIMIT 3";

                            if($stmt1 = mysqli_prepare($link, $sql_select)){
                                //bind variables
                                mysqli_stmt_bind_param($stmt1, "si", $param_time, $param_status);

                                //set
                                $param_time = $time_frame;
                                $param_status = $t;

                                //execute
                                if(mysqli_stmt_execute($stmt1)){
                                    $result1 = mysqli_stmt_get_result($stmt1);

                                    if(mysqli_num_rows($result1) >= 1){
                                        $row = mysqli_fetch_array($result1);

                                        //RETRIEVE INDIVIDUAL VALUES INTO AN ARRAY
                                       // while ($row) {
                                            # code...
                                            // $id = array();
                                             //array_push($id, $row['id']);
                                            // global $rooms_selected;
                                            // array_push($rooms_selected, $row['room']);
                                            //$id = $row['id'];
                                            $id_selected = $row['id'];
                                            $room_selected = $row['room'];
                                            //echo $row['id'];
                                            //echo $row['room'];
                                            
                                        //}
                                    }else{
                                        echo "Zero results found";
                                    }
                                }else{
                                    echo "Did not execute";
                                }
                                 // Close statement
                                    mysqli_stmt_close($stmt1);
                            }else{
                                echo "Nothing is happening here";
                            }


                            
                             //update selected
                             $status = true;
                             $sql_update = "UPDATE room_status SET status = ? WHERE id = ?";
  
                             if($stmt = mysqli_prepare($link, $sql_update)){
                                 //bind
                                 mysqli_stmt_bind_param($stmt, "ii", $param_stat, $param_id);
                                 //set
                                 $param_stat = $status;
                                 $param_id = $id_selected;
  
                                 //execute
                                 if(mysqli_stmt_execute($stmt)){
                                     //success
                                 }else{
                                  echo "Something went wrong. Please try again later.";
                              }
                              } 
                               // Close statement
                                  mysqli_stmt_close($stmt);
                       
                            }
                            

                            return $room_selected;
                            
                            }


                            function check_room_status1($any_lesson){
                                $room_selected = "";
                                global $id;
                            if($any_lesson){
                            /* Attempt to connect to MySQL database */
                            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                            
                            // Check connection
                             if($link === false){
                             die("ERROR: Could not connect. " . mysqli_connect_error());
                             }
                             global $lessons1;
                             global $time_frames;
                             global $room_array;
                             $t = false;
                             foreach($lessons1 as $lesson){
                                 foreach($time_frames as $time_frame){
                                     foreach($room_array as $room){
                             if($any_lesson = $lesson){
                                //echo "<h1>". $any_lesson . "</h1>";
                                //$rand_index = array_rand($room_array);
                                //$room_s = $room_array[$rand_index];

                                $sql = "INSERT INTO room_status (room, time, status) VALUES (?, ?, ?)";
                                if($stmt = mysqli_prepare($link, $sql)){
                                    //bind params
                                    mysqli_stmt_bind_param($stmt, "ssi", $param_room, $param_time, $param_status);

                                    //set params
                                    
                                    $param_room = $room;
                                    $param_time = $time_frame;
                                    $param_status = $t;

                                    //execute
                                    if(mysqli_stmt_execute($stmt)){
                                        //success
                                    }else{
                                        echo "Something went wrong. Please try again later.";
                                    }
                                }
                                    // Close statement
                                    mysqli_stmt_close($stmt);

                             }
                            }
                        }
                        }
                            
                            //select and return

                            $sql_select = "SELECT id, room FROM room_status WHERE time = ? && status = ? LIMIT 3";

                            if($stmt1 = mysqli_prepare($link, $sql_select)){
                                //bind variables
                                mysqli_stmt_bind_param($stmt1, "si", $param_time, $param_status);

                                //set
                                $param_time = $time_frame;
                                $param_status = $t;

                                //execute
                                if(mysqli_stmt_execute($stmt1)){
                                    $result1 = mysqli_stmt_get_result($stmt1);

                                    if(mysqli_num_rows($result1) >= 1){
                                        $row = mysqli_fetch_array($result1);

                                        //RETRIEVE INDIVIDUAL VALUES INTO AN ARRAY
                                       // while ($row) {
                                            # code...
                                            // $id = array();
                                             //array_push($id, $row['id']);
                                            // global $rooms_selected;
                                            // array_push($rooms_selected, $row['room']);
                                            //$id = $row['id'];
                                            $id_selected = $row['id'];
                                            $room_selected = $row['room'];
                                            // echo $row['id'];
                                            // echo $row['room'];
                                            //return $room_selected;
                                        //}
                                    }else{
                                        echo "Zero results found";
                                    }
                                }else{
                                    echo "Did not execute";
                                }
                                 // Close statement
                                    mysqli_stmt_close($stmt1);
                            }else{
                                echo "Nothing is happening here";
                            }


                            
                             //update selected
                             $status = true;
                             $sql_update = "UPDATE room_status SET status = ? WHERE id = ?";
  
                             if($stmt = mysqli_prepare($link, $sql_update)){
                                 //bind
                                 mysqli_stmt_bind_param($stmt, "ii", $param_stat, $param_id);
                                 //set
                                 $param_stat = $status;
                                 $param_id = $id_selected;
  
                                 //execute
                                 if(mysqli_stmt_execute($stmt)){
                                     //success
                                 }else{
                                  echo "Something went wrong. Please try again later.";
                              }
                              } 
                               // Close statement
                                  mysqli_stmt_close($stmt);
                       
                            }
                            return $room_selected;
                            }

                            function check_room_status2($any_lesson){
                                $room_selected = "";
                                global $id;
                            if($any_lesson){
                            /* Attempt to connect to MySQL database */
                            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                            
                            // Check connection
                             if($link === false){
                             die("ERROR: Could not connect. " . mysqli_connect_error());
                             }
                             global $lessons2;
                             global $time_frames;
                             global $room_array;
                             $t = false;
                             foreach($lessons2 as $lesson){
                                 foreach($time_frames as $time_frame){
                                     foreach($room_array as $room){
                             if($any_lesson = $lesson){
                                //echo "<h1>". $any_lesson . "</h1>";
                                //$rand_index = array_rand($room_array);
                                //$room_s = $room_array[$rand_index];

                                $sql = "INSERT INTO room_status (room, time, status) VALUES (?, ?, ?)";
                                if($stmt = mysqli_prepare($link, $sql)){
                                    //bind params
                                    mysqli_stmt_bind_param($stmt, "ssi", $param_room, $param_time, $param_status);

                                    //set params
                                    
                                    $param_room = $room;
                                    $param_time = $time_frame;
                                    $param_status = $t;

                                    //execute
                                    if(mysqli_stmt_execute($stmt)){
                                        //success
                                    }else{
                                        echo "Something went wrong. Please try again later.";
                                    }
                                }
                                    // Close statement
                                    mysqli_stmt_close($stmt);

                             }
                            }
                        }
                        }
                            
                            //select and return

                            $sql_select = "SELECT id, room FROM room_status WHERE time = ? && status = ? LIMIT 3";

                            if($stmt1 = mysqli_prepare($link, $sql_select)){
                                //bind variables
                                mysqli_stmt_bind_param($stmt1, "si", $param_time, $param_status);

                                //set
                                $param_time = $time_frame;
                                $param_status = $t;

                                //execute
                                if(mysqli_stmt_execute($stmt1)){
                                    $result1 = mysqli_stmt_get_result($stmt1);

                                    if(mysqli_num_rows($result1) >= 1){
                                        $row = mysqli_fetch_array($result1);

                                        //RETRIEVE INDIVIDUAL VALUES INTO AN ARRAY
                                       // while ($row) {
                                            # code...
                                            // $id = array();
                                             //array_push($id, $row['id']);
                                            // global $rooms_selected;
                                            // array_push($rooms_selected, $row['room']);
                                            //$id = $row['id'];
                                            $id_selected = $row['id'];
                                            $room_selected = $row['room'];
                                            //echo $row['id'];
                                            //echo $row['room'];
                                            //return $room_selected;
                                        //}
                                    }else{
                                        echo "Zero results found";
                                    }
                                }else{
                                    echo "Did not execute";
                                }
                                 // Close statement
                                    mysqli_stmt_close($stmt1);
                            }else{
                                echo "Nothing is happening here";
                            }


                            
                             //update selected
                             $status = true;
                             $sql_update = "UPDATE room_status SET status = ? WHERE id = ?";
  
                             if($stmt = mysqli_prepare($link, $sql_update)){
                                 //bind
                                 mysqli_stmt_bind_param($stmt, "ii", $param_stat, $param_id);
                                 //set
                                 $param_stat = $status;
                                 $param_id = $id_selected;
  
                                 //execute
                                 if(mysqli_stmt_execute($stmt)){
                                     //success
                                 }else{
                                  echo "Something went wrong. Please try again later.";
                              }
                              } 
                               // Close statement
                                  mysqli_stmt_close($stmt);
                       
                            }
                            return $room_selected;
                            }

                            function check_room_status3($any_lesson){
                                $room_selected = "";
                                global $id;
                            if($any_lesson){
                            /* Attempt to connect to MySQL database */
                            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                            
                            // Check connection
                             if($link === false){
                             die("ERROR: Could not connect. " . mysqli_connect_error());
                             }
                             global $lessons3;
                             global $time_frames;
                             global $room_array;
                             $t = false;
                             foreach($lessons3 as $lesson){
                                 foreach($time_frames as $time_frame){
                                     foreach($room_array as $room){
                             if($any_lesson = $lesson){
                                //echo "<h1>". $any_lesson . "</h1>";
                                //$rand_index = array_rand($room_array);
                                //$room_s = $room_array[$rand_index];

                                $sql = "INSERT INTO room_status (room, time, status) VALUES (?, ?, ?)";
                                if($stmt = mysqli_prepare($link, $sql)){
                                    //bind params
                                    mysqli_stmt_bind_param($stmt, "ssi", $param_room, $param_time, $param_status);

                                    //set params
                                    
                                    $param_room = $room;
                                    $param_time = $time_frame;
                                    $param_status = $t;

                                    //execute
                                    if(mysqli_stmt_execute($stmt)){
                                        //success
                                    }else{
                                        echo "Something went wrong. Please try again later.";
                                    }
                                }
                                    // Close statement
                                    mysqli_stmt_close($stmt);

                             }
                            }
                        }
                        }
                            
                            //select and return

                            $sql_select = "SELECT id, room FROM room_status WHERE time = ? && status = ? LIMIT 3";

                            if($stmt1 = mysqli_prepare($link, $sql_select)){
                                //bind variables
                                mysqli_stmt_bind_param($stmt1, "si", $param_time, $param_status);

                                //set
                                $param_time = $time_frame;
                                $param_status = $t;

                                //execute
                                if(mysqli_stmt_execute($stmt1)){
                                    $result1 = mysqli_stmt_get_result($stmt1);

                                    if(mysqli_num_rows($result1) >= 1){
                                        $row = mysqli_fetch_array($result1);

                                        //RETRIEVE INDIVIDUAL VALUES INTO AN ARRAY
                                       // while ($row) {
                                            # code...
                                            // $id = array();
                                             //array_push($id, $row['id']);
                                            // global $rooms_selected;
                                            // array_push($rooms_selected, $row['room']);
                                            //$id = $row['id'];
                                            $id_selected = $row['id'];
                                            $room_selected = $row['room'];
                                            //echo $id_selected;
                                            //echo $room_selected;
                                            //return $room_selected;
                                        //}
                                    }else{
                                        echo "Zero results found";
                                    }
                                }else{
                                    echo "Did not execute";
                                }
                                 // Close statement
                                    mysqli_stmt_close($stmt1);
                            }else{
                                echo "Nothing is happening here";
                            }

                             //update selected
                             $status = true;
                             $sql_update = "UPDATE room_status SET status = ? WHERE id = ?";
  
                             if($stmt = mysqli_prepare($link, $sql_update)){
                                 //bind
                                 mysqli_stmt_bind_param($stmt, "ii", $param_stat, $param_id);
                                 //set
                                 $param_stat = $status;
                                 $param_id = $id_selected;
  
                                 //execute
                                 if(mysqli_stmt_execute($stmt)){
                                     //success
                                 }else{
                                  echo "Something went wrong. Please try again later.";
                              }
                              } 
                               // Close statement
                                  mysqli_stmt_close($stmt);
                       
                            }
                            return $room_selected;
                            }


                            function check_room_status4($any_lesson){
                                $room_selected = "";
                                global $id;
                            if($any_lesson){
                            /* Attempt to connect to MySQL database */
                            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                            
                            // Check connection
                             if($link === false){
                             die("ERROR: Could not connect. " . mysqli_connect_error());
                             }
                             global $lessons4;
                             global $time_frames;
                             global $room_array;
                             $t = false;
                             foreach($lessons4 as $lesson){
                                 foreach($time_frames as $time_frame){
                                     foreach($room_array as $room){
                             if($any_lesson = $lesson){
                                //echo "<h1>". $any_lesson . "</h1>";
                                //$rand_index = array_rand($room_array);
                                //$room_s = $room_array[$rand_index];

                                $sql = "INSERT INTO room_status (room, time, status) VALUES (?, ?, ?)";
                                if($stmt = mysqli_prepare($link, $sql)){
                                    //bind params
                                    mysqli_stmt_bind_param($stmt, "ssi", $param_room, $param_time, $param_status);

                                    //set params
                                    
                                    $param_room = $room;
                                    $param_time = $time_frame;
                                    $param_status = $t;

                                    //execute
                                    if(mysqli_stmt_execute($stmt)){
                                        //success
                                    }else{
                                        echo "Something went wrong. Please try again later.";
                                    }
                                }
                                    // Close statement
                                    mysqli_stmt_close($stmt);

                             }
                            }
                        }
                        }
                            
                            //select and return

                            $sql_select = "SELECT id, room FROM room_status WHERE time = ? && status = ? LIMIT 3";

                            if($stmt1 = mysqli_prepare($link, $sql_select)){
                                //bind variables
                                mysqli_stmt_bind_param($stmt1, "si", $param_time, $param_status);

                                //set
                                $param_time = $time_frame;
                                $param_status = $t;

                                //execute
                                if(mysqli_stmt_execute($stmt1)){
                                    $result1 = mysqli_stmt_get_result($stmt1);

                                    if(mysqli_num_rows($result1) >= 1){
                                        $row = mysqli_fetch_array($result1);

                                        //RETRIEVE INDIVIDUAL VALUES INTO AN ARRAY
                                       // while ($row) {
                                            # code...
                                            // $id = array();
                                             //array_push($id, $row['id']);
                                            // global $rooms_selected;
                                            // array_push($rooms_selected, $row['room']);
                                            //$id = $row['id'];
                                            $id_selected = $row['id'];
                                            $room_selected = $row['room'];
                                            //echo $id_selected;
                                            //echo $room_selected;
                                            //return $room_selected;
                                        //}
                                    }else{
                                        echo "Zero results found";
                                    }
                                }else{
                                    echo "Did not execute";
                                }
                                 // Close statement
                                    mysqli_stmt_close($stmt1);
                            }else{
                                echo "Nothing is happening here";
                            }
                            


                            //update selected
                            $status = true;
                           $sql_update = "UPDATE room_status SET status = ? WHERE id = ?";

                           if($stmt = mysqli_prepare($link, $sql_update)){
                               //bind
                               mysqli_stmt_bind_param($stmt, "ii", $param_stat, $param_id);
                               //set
                               $param_stat = $status;
                               $param_id = $id_selected;

                               //execute
                               if(mysqli_stmt_execute($stmt)){
                                   //success
                               }else{
                                echo "Something went wrong. Please try again later.";
                            }
                            } 
                             // Close statement
                                mysqli_stmt_close($stmt);
                           }
                           return $room_selected;
                            }
                            
                            

                            // check_room_status($lessons[0]);
                            // check_room_status1($lessons1[1]);
                            // check_room_status2($lessons2[2]);
                            // check_room_status3($lessons3[3]);
                            // check_room_status4($lessons4[4]);
                            
                            //echo implode(',', $id);


                           
                           


                            echo "<table class='generate-table'>";
                            echo "<tbody>";

                            echo "<tr id='type2'>";
                            echo "<td>". $days[0] ."</td>";
                            //if(sizeof($lessons) <= 3){
                                // if($lessons[0] || $lessons[1]){
                                //     echo "<h1>". $lessons[0] ."</h1>";
                                //     echo "<h1>". $lessons[1] ."</h1>";
                                // }
                                if($lessons[0] && $lessons[1] && $lessons[2] && $lessons[3] && $lessons[4] && $lessons[5]){
                                    $_SESSION['lessons0'] = $lessons[0];
                                    $select_lec0 = select_lecture($lessons[0]);
                                    $_SESSION['select_lec0'] = $select_lec0;
                                    $check_room0 = check_room_status($lessons[0]);
                                    $_SESSION['check_room0'] = $check_room0;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= ". $lessons[0] .">"."<br>"."<p>". $select_lec0 . "<br>" . "<p>". $check_room0 . "</p>" ."</p>"."</td>";
                                    // echo "<td>". $lessons[1] ."<br>". $roomG ."</td>";
                                    // echo "<td>". $lessons[2]. "</td>";
                                    // echo "<td>". $lessons[3]. "</td>";
                                    // echo "<td>". $lessons[4]. "</td>";
                                    // echo "<td>". $lessons[5]. "</td>";
                                    $_SESSION['lessons1'] = $lessons[1];
                                    $select_lec1 = select_lecture($lessons[1]);
                                    $_SESSION['select_lec1'] = $select_lec1;
                                    $check_room1 = check_room_status($lessons[1]);
                                    $_SESSION['check_room1'] = $check_room1;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[1] ."\">"."<br>"."<p>". $select_lec1. "<br>" . "<p>". $check_room1 . "Hello world". "</p>" ."</p>"."</td>";
                                    $_SESSION['lessons2'] = $lessons[2];
                                    $select_lec2 = select_lecture($lessons[2]);
                                    $_SESSION['select_lec2'] = $select_lec2;
                                    $check_room2 = check_room_status($lessons[2]);
                                    $_SESSION['check_room2'] = $check_room2;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[2] ."\">"."<br>"."<p>". $select_lec2. "<br>" . "<p>". $check_room2 . "</p>" ."</p>"."</td>";
                                    $_SESSION['lessons3'] = $lessons[3];
                                    $select_lec3 = select_lecture($lessons[3]);
                                    $_SESSION['select_lec3'] = $select_lec3;
                                    $check_room3 = check_room_status($lessons[3]);
                                    $_SESSION['check_room3'] = $check_room3;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[3] ."\">"."<br>"."<p>". $select_lec3. "<br>" . "<p>". $check_room3 . "</p>" ."</p>"."</td>";
                                    $_SESSION['lessons4'] = $lessons[4];
                                    $select_lec4 = select_lecture($lessons[4]);
                                    $_SESSION['select_lec4'] = $select_lec4;
                                    $check_room4 = check_room_status($lessons[4]);
                                    $_SESSION['check_room4'] = $check_room4;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[4] ."\">"."<br>"."<p>". $select_lec4. "<br>" . "<p>". $check_room4 . "</p>" ."</p>"."</td>";
                                    $_SESSION['lessons5'] = $lessons[5];
                                    $select_lec5 = select_lecture($lessons[5]);
                                    $_SESSION['select_lec5'] = $select_lec5;
                                    $check_room5 = check_room_status($lessons[5]);
                                    $_SESSION['check_room5'] = $check_room5;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[5] ."\">"."<br>"."<p>". $select_lec5. "<br>" . "<p>". $check_room5 . "</p>" ."</p>"."</td>";

                                }elseif($lessons[0] && $lessons[2]){
                                    $_SESSION['lessons0'] = $lessons[0];
                                    $select_lec0 = select_lecture($lessons[0]);
                                    $_SESSION['select_lec0'] = $select_lec0;
                                    $check_room0 = check_room_status($lessons[0]);
                                    $_SESSION['check_room0'] = $check_room0;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[0] ."\">"."<br>"."<p>". $select_lec0 . "<br>" . "<p>". $check_room0. "</p>" . "</p>"."</td>";
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons2'] = $lessons[2];
                                    $select_lec2 = select_lecture($lessons[2]);
                                    $_SESSION['select_lec2'] = $select_lec2;
                                    $check_room2 = check_room_status($lessons[2]);
                                    $_SESSION['check_room2'] = $check_room2;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[2] ."\">" . "<br>"."<p>". $select_lec2. "<br>" . "<p>". $check_room2 . "</p>" ."</p>"."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[0] && $lessons[3]){
                                    $_SESSION['lessons0'] = $lessons[0];
                                    $select_lec0 = select_lecture($lessons[0]);
                                    $_SESSION['select_lec0'] = $select_lec0;
                                    $check_room0 = check_room_status($lessons[0]);
                                    $_SESSION['check_room0'] = $check_room0;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[0] ."\">"."<br>"."<p>". $select_lec0. "<br>" . "<p>". $check_room0 . "</p>" ."</p>"."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons3'] = $lessons[3];
                                    $select_lec3 = select_lecture($lessons[3]);
                                    $_SESSION['select_lec3'] = $select_lec3;
                                    $check_room3 = check_room_status($lessons[3]);
                                    $_SESSION['check_room3'] = $check_room3;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[3] ."\">"."<br>"."<p>". $select_lec3. "<br>" . "<p>". $check_room3 . "</p>" ."</p>"."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[1] || $lessons[4]){
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons1'] = $lessons[1];
                                    $select_lec1 = select_lecture($lessons[1]);
                                    $_SESSION['select_lec1'] = $select_lec1;
                                    $check_room1 = check_room_status($lessons[1]);
                                    $_SESSION['check_room1'] = $check_room1;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[1] ."\">"."<br>"."<p>". $select_lec1. "<br>" . "<p>". $check_room1 . "</p>" ."</p>"."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons4'] = $lessons[4];
                                    $select_lec4 = select_lecture($lessons[4]);
                                    $_SESSION['select_lec4'] = $select_lec4;
                                    $check_room4 = check_room_status($lessons[4]);
                                    $_SESSION['check_room4'] = $check_room4;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[4] ."\">"."<br>"."<p>". $select_lec4. "<br>" . "<p>". $check_room4 . "</p>" ."</p>"."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[1]){
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons1'] = $lessons[1];
                                    $select_lec1 = select_lecture($lessons[1]);
                                    $_SESSION['select_lec1'] = $select_lec1;
                                    $check_room1 = check_room_status($lessons[1]);
                                    $_SESSION['check_room1'] = $check_room1;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[1] ."\">"."<br>"."<p>". $select_lec1. "<br>" . "<p>". $check_room1 . "</p>" ."</p>"."</td>";
                                    echo "<td>". "</td>";
                                    echo "<td>". "</td>";
                                    echo "<td>". "</td>";
                                    echo "<td>". "</td>";
                                }elseif($lessons[2]){
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons2'] = $lessons[2];
                                    $select_lec2 = select_lecture($lessons[2]);
                                    $_SESSION['select_lec2'] = $select_lec2;
                                    $check_room2 = check_room_status($lessons[2]);
                                    $_SESSION['check_room2'] = $check_room2;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[2] ."\">"."<br>"."<p>". $select_lec2. "<br>" . "<p>". $check_room2 . "</p>" ."</p>"."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[3]){
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons3'] = $lessons[3];
                                    $select_lec3 = select_lecture($lessons[3]);
                                    $_SESSION['select_lec3'] = $select_lec3;
                                    $check_room3 = check_room_status($lessons[3]);
                                    $_SESSION['check_room3'] = $check_room3;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[3] ."\">"."<br>"."<p>". $select_lec3. "<br>" . "<p>". $check_room3 . "</p>" ."</p>"."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[4]){
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons4'] = $lessons[4];
                                    $select_lec4 = select_lecture($lessons[4]);
                                    $_SESSION['select_lec4'] = $select_lec4;
                                    $check_room4 = check_room_status($lessons[4]);
                                    $_SESSION['check_room4'] = $check_room4;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[4] ."\">"."<br>"."<p>". $select_lec4. "<br>" . "<p>". $check_room4 . "</p>" ."</p>"."</td>";
                                    echo "<td>" ."</td>";
                                }elseif($lessons[5]){
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    echo "<td>" ."</td>";
                                    $_SESSION['lessons5'] = $lessons[5];
                                    $select_lec5 = select_lecture($lessons[5]);
                                    $_SESSION['select_lec5'] = $select_lec5;
                                    $check_room5 = check_room_status($lessons[5]);
                                    $_SESSION['check_room5'] = $check_room5;
                                    echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons[5] ."\">"."<br>"."<p>". $select_lec5. "<br>" . "<p>". $check_room5. "</p>" ."</p>"."</td>";
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
                                echo "<td>" ."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                $_SESSION['lessons14'] = $lessons1[4];
                                $select_lec14 = select_lecture($lessons1[4]);
                                $_SESSION['select_lec14'] = $select_lec14;
                                $check_room14 = check_room_status($lessons1[4]);
                                $_SESSION['check_room14'] = $check_room14;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[4] ."\">"."<br>"."<p>". $select_lec14. "<br>" . "<p>". $check_room14 . "</p>" ."</p>"."</td>";
                                $_SESSION['lessons15'] = $lessons1[5];
                                $select_lec15 = select_lecture($lessons1[5]);
                                $_SESSION['select_lec15'] = $select_lec15;
                                $check_room15 = check_room_status($lessons1[5]);
                                $_SESSION['check_room15'] = $check_room15;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[5] ."\">"."<br>"."<p>". $select_lec15. "<br>" . "<p>". $check_room15 . "</p>" ."</p>"."</td>";

                            }elseif($lessons1[0] || $lessons1[2]){
                                $_SESSION['lessons10'] = $lessons1[0];
                                $select_lec10 = select_lecture($lessons1[0]);
                                $_SESSION['select_lec10'] = $select_lec10;
                                $check_room10 = check_room_status($lessons1[0]);
                                $_SESSION['check_room10'] = $check_room10;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[0] ."\">"."<br>"."<p>". $select_lec10. "<br>" . "<p>". $check_room10 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons12'] = $lessons1[2];
                                $select_lec12 = select_lecture($lessons1[2]);
                                $_SESSION['select_lec12'] = $select_lec12;
                                $check_room12 = check_room_status($lessons1[2]);
                                $_SESSION['check_room12'] = $check_room12;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[2] ."\">"."<br>"."<p>". $select_lec12. "<br>" . "<p>". $check_room12 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[0] || $lessons1[3]){
                                $_SESSION['lessons10'] = $lessons1[0];
                                $select_lec10 = select_lecture($lessons1[0]);
                                $_SESSION['select_lec10'] = $select_lec10;
                                $check_room10 = check_room_status($lessons1[0]);
                                $_SESSION['check_room10'] = $check_room10;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[0] ."\">"."<br>"."<p>". $select_lec10. "<br>" . "<p>". $check_room10 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons13'] = $lessons1[3];
                                $select_lec13 = select_lecture($lessons1[3]);
                                $_SESSION['select_lec13'] = $select_lec13;
                                $check_room13 = check_room_status($lessons1[3]);
                                $_SESSION['check_room13'] = $check_room13;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[3] ."\">"."<br>"."<p>". $select_lec13. "<br>" . "<p>". $check_room13 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[1] && $lessons1[4]){
                                echo "<td>" ."</td>";
                                $_SESSION['lessons11'] = $lessons1[1];
                                $select_lec11 = select_lecture($lessons1[1]);
                                $_SESSION['select_lec11'] = $select_lec11;
                                $check_room11 = check_room_status($lessons1[1]);
                                $_SESSION['check_room11'] = $check_room11;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[1] ."\">"."<br>"."<p>". $select_lec11. "<br>" . "<p>". $check_room11 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons14'] = $lessons1[4];
                                $select_lec14 = select_lecture($lessons1[4]);
                                $_SESSION['select_lec14'] = $select_lec14;
                                $check_room14 = check_room_status($lessons1[4]);
                                $_SESSION['check_room14'] = $check_room14;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[4] ."\">"."<br>"."<p>". $select_lec14. "<br>" . "<p>". $check_room14 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[1]){
                                echo "<td>" ."</td>";
                                $_SESSION['lessons11'] = $lessons1[1];
                                $select_lec11 = select_lecture($lessons1[1]);
                                $_SESSION['select_lec11'] = $select_lec11;
                                $check_room11 = check_room_status($lessons1[1]);
                                $_SESSION['check_room11'] = $check_room11;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[1] ."\">"."<br>"."<p>". $select_lec11. "<br>" . "<p>". $check_room11 . "</p>" ."</p>"."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                            }elseif($lessons1[2]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons12'] = $lessons1[2];
                                $select_lec12 = select_lecture($lessons1[2]);
                                $_SESSION['select_lec12'] = $select_lec12;
                                $check_room12 = check_room_status($lessons1[2]);
                                $_SESSION['check_room12'] = $check_room12;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[2] ."\">"."<br>"."<p>". $select_lec12. "<br>" . "<p>". $check_room12 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[3]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons13'] = $lessons1[3];
                                $select_lec13 = select_lecture($lessons1[3]);
                                $_SESSION['select_lec13'] = $select_lec13;
                                $check_room13 = check_room_status($lessons1[3]);
                                $_SESSION['check_room13'] = $check_room13;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[3] ."\">"."<br>"."<p>". $select_lec13. "<br>" . "<p>". $check_room13 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[4]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons14'] = $lessons1[4];
                                $select_lec14 = select_lecture($lessons1[4]);
                                $_SESSION['select_lec14'] = $select_lec14;
                                $check_room14 = check_room_status($lessons1[4]);
                                $_SESSION['check_room14'] = $check_room14;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[4] ."\">"."<br>"."<p>". $select_lec14. "<br>" . "<p>". $check_room14 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons1[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons15'] = $lessons1[5];
                                $select_lec15 = select_lecture($lessons1[5]);
                                $_SESSION['select_lec15'] = $select_lec15;
                                $check_room15 = check_room_status($lessons1[5]);
                                $_SESSION['check_room15'] = $check_room15;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons1[5] ."\">"."<br>"."<p>". $select_lec15. "<br>" . "<p>". $check_room15 . "</p>" ."</p>"."</td>";
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
                                echo "<td>"."</td>";
                                echo "<td>".  "</td>";
                                echo "<td>".  "</td>";
                                echo "<td>".  "</td>";
                                $_SESSION['lessons25'] = $lessons2[5];
                                $select_lec25 = select_lecture($lessons2[5]);
                                $_SESSION['select_lec25'] = $select_lec25;
                                $check_room25 = check_room_status($lessons2[5]);
                                $_SESSION['check_room25'] = $check_room25;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[5] ."\">"."<br>"."<p>". $select_lec . "<br>" . "<p>". $check_room25 . "</p>" ."</p>"."</td>";

                            }elseif($lessons2[0] && $lessons2[2]){
                                $_SESSION['lessons20'] = $lessons2[0];
                                $select_lec20 = select_lecture($lessons2[0]);
                                $_SESSION['select_lec20'] = $select_lec20;
                                $check_room20 = check_room_status($lessons2[0]);
                                $_SESSION['check_room20'] = $check_room20;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[0] ."\">"."<br>"."<p>". $select_lec20 . "<br>" . "<p>". $check_room20 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons22'] = $lessons2[2];
                                $select_lec22 = select_lecture($lessons2[2]);
                                $_SESSION['select_lec22'] = $select_lec22;
                                $check_room22 = check_room_status($lessons2[2]);
                                $_SESSION['check_room22'] = $check_room22;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[2] ."\">"."<br>"."<p>". $select_lec22. "<br>" . "<p>". $check_room22 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[0] || $lessons2[3]){
                                $_SESSION['lessons20'] = $lessons2[0];
                                $select_lec20 = select_lecture($lessons2[0]);
                                $_SESSION['select_lec20'] = $select_lec20;
                                $check_room20 = check_room_status($lessons2[0]);
                                $_SESSION['check_room20'] = $check_room20;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[0] ."\">"."<br>"."<p>". $select_lec20. "<br>" . "<p>". $check_room20 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons23'] = $lessons2[3];
                                $select_lec23 = select_lecture($lessons2[3]);
                                $_SESSION['select_lec23'] = $select_lec23;
                                $check_room23 = check_room_status($lessons2[3]);
                                $_SESSION['check_room23'] = $check_room23;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[3] ."\">"."<br>"."<p>". $select_lec23. "<br>" . "<p>". $check_room23 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[1] || $lessons2[4]){
                                echo "<td>" ."</td>";
                                $_SESSION['lessons21'] = $lessons2[1];
                                $select_lec21 = select_lecture($lessons2[1]);
                                $_SESSION['select_lec21'] = $select_lec21;
                                $check_room21 = check_room_status($lessons2[1]);
                                $_SESSION['check_room21'] = $check_room21;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[1] ."\">"."<br>"."<p>". $select_lec21. "<br>" . "<p>". $check_room21 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons24'] = $lessons2[4];
                                $select_lec24 = select_lecture($lessons2[4]);
                                $_SESSION['select_lec24'] = $select_lec24;
                                $check_room24 = check_room_status($lessons2[4]);
                                $_SESSION['check_room24'] = $check_room24;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[4] ."\">"."<br>"."<p>". $select_lec24. "<br>" . "<p>". $check_room24 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[1]){
                                echo "<td>" ."</td>";
                                $_SESSION['lessons21'] = $lessons2[1];
                                $select_lec21 = select_lecture($lessons2[1]);
                                $_SESSION['select_lec21'] = $select_lec21;
                                $check_room21 = check_room_status($lessons2[1]);
                                $_SESSION['check_room21'] = $check_room21;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[1] ."\">"."<br>"."<p>". $select_lec21. "<br>" . "<p>". $check_room21 . "</p>" ."</p>"."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                            }elseif($lessons2[2]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons22'] = $lessons2[2];
                                $select_lec22 = select_lecture($lessons2[2]);
                                $_SESSION['select_lec22'] = $select_lec22;
                                $check_room22 = check_room_status($lessons2[2]);
                                $_SESSION['check_room22'] = $check_room22;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[2] ."\">"."<br>"."<p>". $select_lec22. "<br>" . "<p>". $check_room22 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[3]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons23'] = $lessons2[3];
                                $select_lec23 = select_lecture($lessons2[3]);
                                $_SESSION['select_lec23'] = $select_lec23;
                                $check_room23 = check_room_status($lessons2[3]);
                                $_SESSION['check_room23'] = $check_room23;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[3] ."\">"."<br>"."<p>". $select_lec23. "<br>" . "<p>". $check_room23 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[4]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons24'] = $lessons2[4];
                                $select_lec24 = select_lecture($lessons2[4]);
                                $_SESSION['select_lec24'] = $select_lec24;
                                $check_room24 = check_room_status($lessons2[4]);
                                $_SESSION['check_room24'] = $check_room24;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[4] ."\">"."<br>"."<p>". $select_lec24. "<br>" . "<p>". $check_room24 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons2[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons25'] = $lessons2[5];
                                $select_lec25 = select_lecture($lessons2[5]);
                                $_SESSION['select_lec25'] = $select_lec25;
                                $check_room25 = check_room_status($lessons2[5]);
                                $_SESSION['check_room25'] = $check_room25;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons2[5] ."\">"."<br>"."<p>". $select_lec25 . "<br>" . "<p>". $check_room25 . "</p>" ."</p>"."</td>";
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
                                echo "<td>". "</td>";
                                echo "<td>".  "</td>";
                                $_SESSION['lessons33'] = $lessons3[3];
                                $select_lec33 = select_lecture($lessons3[3]);
                                $_SESSION['select_lec33'] = $select_lec33;
                                $check_room33 = check_room_status($lessons3[3]);
                                $_SESSION['check_room33'] = $check_room33;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[3] ."\">"."<br>"."<p>". $select_lec33. "<br>" . "<p>". $check_room33 . "</p>" ."</p>"."</td>";
                                echo "<td>".  "</td>";
                                $_SESSION['lessons35'] = $lessons3[5];
                                $select_lec35 = select_lecture($lessons3[5]);
                                $_SESSION['select_lec35'] = $select_lec35;
                                $check_room35 = check_room_status($lessons3[5]);
                                $_SESSION['check_room35'] = $check_room35;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[5] ."\">"."<br>"."<p>". $select_lec35. "<br>" . "<p>". $check_room35 . "</p>" ."</p>"."</td>";

                            }elseif($lessons3[0] || $lessons3[2]){
                                $_SESSION['lessons30'] = $lessons3[0];
                                $select_lec30 = select_lecture($lessons3[0]);
                                $_SESSION['select_lec30'] = $select_lec30;
                                $check_room30 = check_room_status($lessons3[0]);
                                $_SESSION['check_room30'] = $check_room30;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[0] ."\">"."<br>"."<p>". $select_lec30. "<br>" . "<p>". $check_room30 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons32'] = $lessons3[2];
                                $select_lec32 = select_lecture($lessons3[2]);
                                $_SESSION['select_lec32'] = $select_lec32;
                                $check_room32 = check_room_status($lessons3[2]);
                                $_SESSION['check_room32'] = $check_room32;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[2] ."\">"."<br>"."<p>". $select_lec32. "<br>" . "<p>". $check_room32 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[0] && $lessons3[3]){
                                $_SESSION['lessons30'] = $lessons3[0];
                                $select_lec30 = select_lecture($lessons3[0]);
                                $_SESSION['select_lec30'] = $select_lec30;
                                $check_room30 = check_room_status($lessons3[0]);
                                $_SESSION['check_room30'] = $check_room30;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[0] ."\">"."<br>"."<p>". $select_lec30. "<br>" . "<p>". $check_room30 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons33'] = $lessons3[3];
                                $select_lec33 = select_lecture($lessons3[3]);
                                $_SESSION['select_lec33'] = $select_lec33;
                                $check_room33 = check_room_status($lessons3[3]);
                                $_SESSION['check_room33'] = $check_room33;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[3] ."\">"."<br>"."<p>". $select_lec33. "<br>" . "<p>". $check_room33 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[1] || $lessons3[4]){
                                echo "<td>" ."</td>";
                                $_SESSION['lessons31'] = $lessons3[1];
                                $select_lec31 = select_lecture($lessons3[1]);
                                $_SESSION['select_lec31'] = $select_lec31;
                                $check_room31 = check_room_status($lessons3[1]);
                                $_SESSION['check_room31'] = $check_room31;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[1] ."\">"."<br>"."<p>". $select_lec31 . "<br>" . "<p>". $check_room31 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons34'] = $lessons3[4];
                                $select_lec34 = select_lecture($lessons3[4]);
                                $_SESSION['select_lec34'] = $select_lec34;
                                $check_room34 = check_room_status($lessons3[4]);
                                $_SESSION['check_room34'] = $check_room34;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[4] ."\">"."<br>"."<p>". $select_lec34. "<br>" . "<p>". $check_room34 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[2]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons32'] = $lessons3[2];
                                $select_lec32 = select_lecture($lessons3[2]);
                                $_SESSION['select_lec32'] = $select_lec32;
                                $check_room32 = check_room_status($lessons3[2]);
                                $_SESSION['check_room32'] = $check_room32;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[2] ."\">"."<br>"."<p>". $select_lec32. "<br>" . "<p>". $check_room32 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[1]){
                                echo "<td>" ."</td>";
                                $_SESSION['lessons31'] = $lessons3[1];
                                $select_lec31 = select_lecture($lessons3[1]);
                                $_SESSION['select_lec31'] = $select_lec31;
                                $check_room31 = check_room_status($lessons3[1]);
                                $_SESSION['check_room31'] = $check_room31;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[1] ."\">"."<br>"."<p>". $select_lec31. "<br>" . "<p>". $check_room31 . "</p>" ."</p>"."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                            }elseif($lessons3[3]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons33'] = $lessons3[3];
                                $select_lec33 = select_lecture($lessons3[3]);
                                $_SESSION['select_lec33'] = $select_lec33;
                                $check_room33 = check_room_status($lessons3[3]);
                                $_SESSION['check_room33'] = $check_room33;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[3] ."\">"."<br>"."<p>". $select_lec33. "<br>" . "<p>". $check_room33. "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[4]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[4] ."\">"."<br>"."<p>". select_lecture($lessons3[4]). "<br>" . "<p>". check_room_status3($lessons3[4]) . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons3[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons35'] = $lessons3[5];
                                $select_lec35 = select_lecture($lessons3[5]);
                                $_SESSION['select_lec35'] = $select_lec35;
                                $check_room35 = check_room_status($lessons3[5]);
                                $_SESSION['check_room35'] = $check_room35;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons3[5] ."\">"."<br>"."<p>". $select_lec35. "<br>" . "<p>". $check_room35 . "</p>" ."</p>"."</td>";
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
                                echo "<td>". "<br>"."</td>";
                                $_SESSION['lessons42'] = $lessons4[2];
                                $select_lec42 = select_lecture($lessons4[2]);
                                $_SESSION['select_lec42'] = $select_lec42;
                                $check_room42 = check_room_status($lessons4[2]);
                                $_SESSION['check_room42'] = $check_room42;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[2] ."\">"."<br>"."<p>". $select_lec42. "<br>" . "<p>". $check_room42 . "</p>" ."</p>"."</td>";
                                echo "<td>".  "</td>";
                                echo "<td>".  "</td>";
                                $_SESSION['lessons45'] = $lessons4[5];
                                $select_lec45 = select_lecture($lessons4[5]);
                                $_SESSION['select_lec45'] = $select_lec45;
                                $check_room45 = check_room_status($lessons4[5]);
                                $_SESSION['check_room45'] = $check_room45;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[5] ."\">"."<br>"."<p>". $select_lec45. "<br>" . "<p>". $check_room45 . "</p>" ."</p>"."</td>";

                            }elseif($lessons4[0] && $lessons4[2]){
                                $_SESSION['lessons40'] = $lessons4[0];
                                $select_lec40 = select_lecture($lessons4[0]);
                                $_SESSION['select_lec40'] = $select_lec40;
                                $check_room40 = check_room_status($lessons4[0]);
                                $_SESSION['check_room40'] = $check_room40;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[0] ."\">"."<br>"."<p>". $select_lec40. "<br>" . "<p>". $check_room40 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons42'] = $lessons4[2];
                                $select_lec42 = select_lecture($lessons4[2]);
                                $_SESSION['select_lec42'] = $select_lec42;
                                $check_room42 = check_room_status($lessons4[2]);
                                $_SESSION['check_room42'] = $check_room42;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[2] ."\">"."<br>"."<p>". $select_lec42. "<br>" . "<p>". $check_room42 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[0] || $lessons4[3]){
                                $_SESSION['lessons40'] = $lessons4[0];
                                $select_lec40 = select_lecture($lessons4[0]);
                                $_SESSION['select_lec40'] = $select_lec40;
                                $check_room40 = check_room_status($lessons4[0]);
                                $_SESSION['check_room40'] = $check_room40;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[0] ."\">"."<br>"."<p>". $select_lec40. "<br>" . "<p>". $check_room40 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons43'] = $lessons4[3];
                                $select_lec43 = select_lecture($lessons4[3]);
                                $_SESSION['select_lec43'] = $select_lec43;
                                $check_room43 = check_room_status($lessons4[3]);
                                $_SESSION['check_room43'] = $check_room43;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[3] ."\">"."<br>"."<p>". $select_lec43. "<br>" . "<p>". $check_room43 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[1] && $lessons4[4]){
                                echo "<td>" ."</td>";
                                $_SESSION['lessons41'] = $lessons4[1];
                                $select_lec41 = select_lecture($lessons4[1]);
                                $_SESSION['select_lec41'] = $select_lec41;
                                $check_room41 = check_room_status($lessons4[1]);
                                $_SESSION['check_room41'] = $check_room41;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[1] ."\">"."<br>"."<p>". $select_lec41. "<br>" . "<p>". $check_room41 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons44'] = $lessons4[4];
                                $select_lec44 = select_lecture($lessons4[4]);
                                $_SESSION['select_lec44'] = $select_lec44;
                                $check_room44 = check_room_status($lessons4[4]);
                                $_SESSION['check_room44'] = $check_room44;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[4] ."\">"."<br>"."<p>". $select_lec44. "<br>" . "<p>". $check_room44 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[2]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons42'] = $lessons4[3];
                                $select_lec42 = select_lecture($lessons4[2]);
                                $_SESSION['select_lec42'] = $select_lec42;
                                $check_room42 = check_room_status($lessons4[2]);
                                $_SESSION['check_room42'] = $check_room42;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[2] ."\">"."<br>"."<p>". $select_lec42. "<br>" . "<p>". $check_room42 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[1]){
                                echo "<td>" ."</td>";
                                $_SESSION['lessons41'] = $lessons4[1];
                                $select_lec41 = select_lecture($lessons4[1]);
                                $_SESSION['select_lec41'] = $select_lec41;
                                $check_room41 = check_room_status($lessons4[1]);
                                $_SESSION['check_room41'] = $check_room41;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[1] ."\">"."<br>"."<p>". $select_lec41. "<br>" . "<p>". $check_room41 . "</p>" ."</p>"."</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                                echo "<td>". "</td>";
                            }elseif($lessons4[3]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons43'] = $lessons4[3];
                                $select_lec43 = select_lecture($lessons4[3]);
                                $_SESSION['select_lec43'] = $select_lec43;
                                $check_room43 = check_room_status($lessons4[3]);
                                $_SESSION['check_room43'] = $check_room43;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[3] ."\">"."<br>"."<p>". $select_lec43. "<br>" . "<p>". $check_room43 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[4]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons44'] = $lessons4[4];
                                $select_lec44 = select_lecture($lessons4[4]);
                                $_SESSION['select_lec44'] = $select_lec44;
                                $check_room44 = check_room_status($lessons4[4]);
                                $_SESSION['check_room40'] = $check_room44;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[4] ."\">"."<br>"."<p>". $select_lec44. "<br>" . "<p>". $check_room44 . "</p>" ."</p>"."</td>";
                                echo "<td>" ."</td>";
                            }elseif($lessons4[5]){
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                echo "<td>" ."</td>";
                                $_SESSION['lessons45'] = $lessons4[5];
                                $select_lec45 = select_lecture($lessons4[5]);
                                $_SESSION['select_lec45'] = $select_lec45;
                                $check_room45 = check_room_status($lessons4[5]);
                                $_SESSION['check_room45'] = $check_room45;
                                echo "<td>"."<input type='text' maxlength= 20 size= 20 value= \"". $lessons4[5] ."\">"."<br>"."<p>". $select_lec45. "<br>" . "<p>". $check_room45 . "</p>" ."</p>"."</td>";
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



                           
                           

//  require_once __DIR__ . '../../vendor/autoload.php';

//  $mpdf = new \Mpdf\Mpdf();
//  $mpdf->WriteHTML("");
//  $mpdf->Output('myfile.pdf');


                            
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

