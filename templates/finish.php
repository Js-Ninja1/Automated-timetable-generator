<?php


session_start();

 require_once __DIR__ . '../../vendor/autoload.php';




 $mpdf = new \Mpdf\Mpdf();

 $data = '';

 $data .= '<h2>'. $_SESSION['timetable'] .'</h2>';
 $data .= 'Course name:';
 $data .= $_SESSION['courseName'];
 $data .= 'Semester stage:';
 $data .= $_SESSION['semester_stage'];
 $data .= '<table>';
 $data .= '<tr><th>Day/Time</th><th>'. $_SESSION['time0'] .'</th><th>'. $_SESSION['time1'].'</th><th>'.$_SESSION['time2'].'</th><th>'.$_SESSION['time3'].'</th><th>'.$_SESSION['time4'].'</th><th>'.$_SESSION['time5']. '</th></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons0'].'<br><p>'. $_SESSION['select_lec0'].'</p><br><p>'.$_SESSION['check_room0'].'</p></td><td>'.$_SESSION['lessons1'].'<br><p>'. $_SESSION['select_lec1'].'</p><br><p>'.$_SESSION['check_room1'].'</p></td><td>'.$_SESSION['lessons2'].'<br><p>'. $_SESSION['select_lec2'].'</p><br><p>'.$_SESSION['check_room2'].'</p></td><td>'.$_SESSION['lessons3'].'<br><p>'. $_SESSION['select_lec3'].'</p><br><p>'.$_SESSION['check_room3'].'</p></td><td>'.$_SESSION['lessons4'].'<br><p>'. $_SESSION['select_lec4'].'</p><br><p>'.$_SESSION['check_room4'].'</p></td><td>'.$_SESSION['lessons5'].'<br><p>'. $_SESSION['select_lec5'].'</p><br><p>'.$_SESSION['check_room5'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons10'].'<br><p>'. $_SESSION['select_lec10'].'</p><br><p>'.$_SESSION['check_room10'].'</p></td><td>'.$_SESSION['lessons11'].'<br><p>'. $_SESSION['select_lec11'].'</p><br><p>'.$_SESSION['check_room11'].'</p></td><td>'.$_SESSION['lessons12'].'<br><p>'. $_SESSION['select_lec12'].'</p><br><p>'.$_SESSION['check_room12'].'</p></td><td>'.$_SESSION['lessons13'].'<br><p>'. $_SESSION['select_lec13'].'</p><br><p>'.$_SESSION['check_room13'].'</p></td><td>'.$_SESSION['lessons14'].'<br><p>'. $_SESSION['select_lec14'].'</p><br><p>'.$_SESSION['check_room14'].'</p></td><td>'.$_SESSION['lessons15'].'<br><p>'. $_SESSION['select_lec15'].'</p><br><p>'.$_SESSION['check_room15'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons20'].'<br><p>'. $_SESSION['select_lec20'].'</p><br><p>'.$_SESSION['check_room20'].'</p></td><td>'.$_SESSION['lessons21'].'<br><p>'. $_SESSION['select_lec21'].'</p><br><p>'.$_SESSION['check_room21'].'</p></td><td>'.$_SESSION['lessons22'].'<br><p>'. $_SESSION['select_lec22'].'</p><br><p>'.$_SESSION['check_room22'].'</p></td><td>'.$_SESSION['lessons23'].'<br><p>'. $_SESSION['select_lec23'].'</p><br><p>'.$_SESSION['check_room23'].'</p></td><td>'.$_SESSION['lessons24'].'<br><p>'. $_SESSION['select_lec24'].'</p><br><p>'.$_SESSION['check_room24'].'</p></td><td>'.$_SESSION['lessons25'].'<br><p>'. $_SESSION['select_lec25'].'</p><br><p>'.$_SESSION['check_room25'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons30'].'<br><p>'. $_SESSION['select_lec30'].'</p><br><p>'.$_SESSION['check_room30'].'</p></td><td>'.$_SESSION['lessons31'].'<br><p>'. $_SESSION['select_lec31'].'</p><br><p>'.$_SESSION['check_room31'].'</p></td><td>'.$_SESSION['lessons32'].'<br><p>'. $_SESSION['select_lec32'].'</p><br><p>'.$_SESSION['check_room32'].'</p></td><td>'.$_SESSION['lessons33'].'<br><p>'. $_SESSION['select_lec33'].'</p><br><p>'.$_SESSION['check_room33'].'</p></td><td>'.$_SESSION['lessons34'].'<br><p>'. $_SESSION['select_lec34'].'</p><br><p>'.$_SESSION['check_room34'].'</p></td><td>'.$_SESSION['lessons35'].'<br><p>'. $_SESSION['select_lec35'].'</p><br><p>'.$_SESSION['check_room35'].'</p></td></tr>';
 $data .= '<tr><td>'.$_SESSION['lessons40'].'<br><p>'. $_SESSION['select_lec40'].'</p><br><p>'.$_SESSION['check_room40'].'</p></td><td>'.$_SESSION['lessons41'].'<br><p>'. $_SESSION['select_lec41'].'</p><br><p>'.$_SESSION['check_room41'].'</p></td><td>'.$_SESSION['lessons42'].'<br><p>'. $_SESSION['select_lec42'].'</p><br><p>'.$_SESSION['check_room42'].'</p></td><td>'.$_SESSION['lessons43'].'<br><p>'. $_SESSION['select_lec43'].'</p><br><p>'.$_SESSION['check_room43'].'</p></td><td>'.$_SESSION['lessons44'].'<br><p>'. $_SESSION['select_lec44'].'</p><br><p>'.$_SESSION['check_room44'].'</p></td><td>'.$_SESSION['lessons45'].'<br><p>'. $_SESSION['select_lec45'].'</p><br><p>'.$_SESSION['check_room45'].'</p></td></tr>';
 $data .= '</table>';


  $timetable_name = $_SESSION['courseName'];
  $timetable_name .= $_SESSION['semester_stage'];
  $timetable_name .= ".pdf";

 $mpdf->WriteHTML($data);

 //save in folder
//$this->m_pdf->pdf->Output("../pdf/".$pdfFilePath, "F");
 $mpdf->Output('../pdf/'. $timetable_name, 'F');

//create  lecurers tables to db
//include connect file
require_once "../db_config/connect.php";

$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");


if($_SESSION['lessons0'] && $_SESSION['select_lec0'] && $_SESSION['check_room0']){
// Prepare an insert statement
$sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";

if($stmt = mysqli_prepare($link, $sql)){
    //bind variables to prepared statement
    mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
    //set params
    $param_name = $_SESSION['select_lec0'];
    $param_course = $_SESSION['courseName'];
    $param_day = $days[0];
    $param_unit = $_SESSION['lessons0'];
    $param_time = $_SESSION['time0'];
    $param_room = $_SESSION['check_room0'];

    //attempt to execute
    if(mysqli_stmt_execute($stmt)){
        //success
    }else{
        echo "Something went wrong";
    }
    // Close statement
mysqli_stmt_close($stmt);
}

}


if($_SESSION['lessons1'] && $_SESSION['select_lec1'] && $_SESSION['check_room1']){
    // Prepare an insert statement
    $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
    
    if($stmt = mysqli_prepare($link, $sql)){
        //bind variables to prepared statement
        mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
        //set params
        $param_name = $_SESSION['select_lec1'];
        $param_course = $_SESSION['courseName'];
        $param_day = $days[0];
        $param_unit = $_SESSION['lessons1'];
        $param_time = $_SESSION['time1'];
        $param_room = $_SESSION['check_room1'];
    
        //attempt to execute
        if(mysqli_stmt_execute($stmt)){
            //success
        }else{
            echo "Something went wrong";
        }
        // Close statement
    mysqli_stmt_close($stmt);
    }
    
    }


    if($_SESSION['lessons2'] && $_SESSION['select_lec2'] && $_SESSION['check_room2']){
        // Prepare an insert statement
        $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            //bind variables to prepared statement
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
            //set params
            $param_name = $_SESSION['select_lec2'];
            $param_course = $_SESSION['courseName'];
            $param_day = $days[0];
            $param_unit = $_SESSION['lessons2'];
            $param_time = $_SESSION['time2'];
            $param_room = $_SESSION['check_room2'];
        
            //attempt to execute
            if(mysqli_stmt_execute($stmt)){
                //success
            }else{
                echo "Something went wrong";
            }
            // Close statement
        mysqli_stmt_close($stmt);
        }
        
        }


        if($_SESSION['lessons3'] && $_SESSION['select_lec3'] && $_SESSION['check_room3']){
            // Prepare an insert statement
            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                //bind variables to prepared statement
                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                //set params
                $param_name = $_SESSION['select_lec3'];
                $param_course = $_SESSION['courseName'];
                $param_day = $days[0];
                $param_unit = $_SESSION['lessons3'];
                $param_time = $_SESSION['time3'];
                $param_room = $_SESSION['check_room3'];
            
                //attempt to execute
                if(mysqli_stmt_execute($stmt)){
                    //success
                }else{
                    echo "Something went wrong";
                }
                // Close statement
            mysqli_stmt_close($stmt);
            }
            
            }


            if($_SESSION['lessons4'] && $_SESSION['select_lec4'] && $_SESSION['check_room4']){
                // Prepare an insert statement
                $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                
                if($stmt = mysqli_prepare($link, $sql)){
                    //bind variables to prepared statement
                    mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                    //set params
                    $param_name = $_SESSION['select_lec4'];
                    $param_course = $_SESSION['courseName'];
                    $param_day = $days[0];
                    $param_unit = $_SESSION['lessons4'];
                    $param_time = $_SESSION['time4'];
                    $param_room = $_SESSION['check_room4'];
                
                    //attempt to execute
                    if(mysqli_stmt_execute($stmt)){
                        //success
                    }else{
                        echo "Something went wrong";
                    }
                    // Close statement
                mysqli_stmt_close($stmt);
                }
                
                }


                if($_SESSION['lessons5'] && $_SESSION['select_lec5'] && $_SESSION['check_room5']){
                    // Prepare an insert statement
                    $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                    
                    if($stmt = mysqli_prepare($link, $sql)){
                        //bind variables to prepared statement
                        mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                        //set params
                        $param_name = $_SESSION['select_lec5'];
                        $param_course = $_SESSION['courseName'];
                        $param_day = $days[0];
                        $param_unit = $_SESSION['lessons5'];
                        $param_time = $_SESSION['time5'];
                        $param_room = $_SESSION['check_room5'];
                    
                        //attempt to execute
                        if(mysqli_stmt_execute($stmt)){
                            //success
                        }else{
                            echo "Something went wrong";
                        }
                        // Close statement
                    mysqli_stmt_close($stmt);
                    }
                    
                    }

                    if($_SESSION['lessons10'] && $_SESSION['select_lec10'] && $_SESSION['check_room10']){
                        // Prepare an insert statement
                        $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                        
                        if($stmt = mysqli_prepare($link, $sql)){
                            //bind variables to prepared statement
                            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                            //set params
                            $param_name = $_SESSION['select_lec10'];
                            $param_course = $_SESSION['courseName'];
                            $param_day = $days[1];
                            $param_unit = $_SESSION['lessons10'];
                            $param_time = $_SESSION['time0'];
                            $param_room = $_SESSION['check_room10'];
                        
                            //attempt to execute
                            if(mysqli_stmt_execute($stmt)){
                                //success
                            }else{
                                echo "Something went wrong";
                            }
                            // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }
                    
                    
                        if($_SESSION['lessons11'] && $_SESSION['select_lec11'] && $_SESSION['check_room11']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec11'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[1];
                                $param_unit = $_SESSION['lessons11'];
                                $param_time = $_SESSION['time1'];
                                $param_room = $_SESSION['check_room11'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                                // Close statement
                            mysqli_stmt_close($stmt);
                            }
                            }


                            if($_SESSION['lessons12'] && $_SESSION['select_lec12'] && $_SESSION['check_room12']){
                                // Prepare an insert statement
                                $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                                
                                if($stmt = mysqli_prepare($link, $sql)){
                                    //bind variables to prepared statement
                                    mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                    //set params
                                    $param_name = $_SESSION['select_lec12'];
                                    $param_course = $_SESSION['courseName'];
                                    $param_day = $days[1];
                                    $param_unit = $_SESSION['lessons12'];
                                    $param_time = $_SESSION['time2'];
                                    $param_room = $_SESSION['check_room12'];
                                
                                    //attempt to execute
                                    if(mysqli_stmt_execute($stmt)){
                                        //success
                                    }else{
                                        echo "Something went wrong";
                                    }
                                    // Close statement
                                mysqli_stmt_close($stmt);
                                }
                                }

                            
                                if($_SESSION['lessons13'] && $_SESSION['select_lec13'] && $_SESSION['check_room13']){
                                    // Prepare an insert statement
                                    $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                                    
                                    if($stmt = mysqli_prepare($link, $sql)){
                                        //bind variables to prepared statement
                                        mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                        //set params
                                        $param_name = $_SESSION['select_lec13'];
                                        $param_course = $_SESSION['courseName'];
                                        $param_day = $days[1];
                                        $param_unit = $_SESSION['lessons13'];
                                        $param_time = $_SESSION['time3'];
                                        $param_room = $_SESSION['check_room13'];
                                    
                                        //attempt to execute
                                        if(mysqli_stmt_execute($stmt)){
                                            //success
                                        }else{
                                            echo "Something went wrong";
                                        }
                                        // Close statement
                                    mysqli_stmt_close($stmt);
                                    }
                                    }


                                    if($_SESSION['lessons14'] && $_SESSION['select_lec14'] && $_SESSION['check_room14']){
                                        // Prepare an insert statement
                                        $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                                        
                                        if($stmt = mysqli_prepare($link, $sql)){
                                            //bind variables to prepared statement
                                            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                            //set params
                                            $param_name = $_SESSION['select_lec14'];
                                            $param_course = $_SESSION['courseName'];
                                            $param_day = $days[1];
                                            $param_unit = $_SESSION['lessons14'];
                                            $param_time = $_SESSION['time4'];
                                            $param_room = $_SESSION['check_room14'];
                                        
                                            //attempt to execute
                                            if(mysqli_stmt_execute($stmt)){
                                                //success
                                            }else{
                                                echo "Something went wrong";
                                            }
                                            // Close statement
                                        mysqli_stmt_close($stmt);
                                        }
                                        }

                                        if($_SESSION['lessons15'] && $_SESSION['select_lec15'] && $_SESSION['check_room15']){
                                            // Prepare an insert statement
                                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                                            
                                            if($stmt = mysqli_prepare($link, $sql)){
                                                //bind variables to prepared statement
                                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                                //set params
                                                $param_name = $_SESSION['select_lec15'];
                                                $param_course = $_SESSION['courseName'];
                                                $param_day = $days[1];
                                                $param_unit = $_SESSION['lessons15'];
                                                $param_time = $_SESSION['time5'];
                                                $param_room = $_SESSION['check_room15'];
                                            
                                                //attempt to execute
                                                if(mysqli_stmt_execute($stmt)){
                                                    //success
                                                }else{
                                                    echo "Something went wrong";
                                                }
                                                // Close statement
                                            mysqli_stmt_close($stmt);
                                            }
                                            }

                        if($_SESSION['lessons20'] && $_SESSION['select_lec20'] && $_SESSION['check_room20']){
                                            // Prepare an insert statement
                                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                                            
                                            if($stmt = mysqli_prepare($link, $sql)){
                                                //bind variables to prepared statement
                                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                                //set params
                                                $param_name = $_SESSION['select_lec20'];
                                                $param_course = $_SESSION['courseName'];
                                                $param_day = $days[2];
                                                $param_unit = $_SESSION['lessons20'];
                                                $param_time = $_SESSION['time0'];
                                                $param_room = $_SESSION['check_room20'];
                                            
                                                //attempt to execute
                                                if(mysqli_stmt_execute($stmt)){
                                                    //success
                                                }else{
                                                    echo "Something went wrong";
                                                }
                         // Close statement
                         mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons21'] && $_SESSION['select_lec21'] && $_SESSION['check_room21']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec21'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[2];
                                $param_unit = $_SESSION['lessons21'];
                                $param_time = $_SESSION['time1'];
                                $param_room = $_SESSION['check_room21'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons22'] && $_SESSION['select_lec22'] && $_SESSION['check_room22']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec22'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[2];
                                $param_unit = $_SESSION['lessons22'];
                                $param_time = $_SESSION['time2'];
                                $param_room = $_SESSION['check_room22'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons23'] && $_SESSION['select_lec23'] && $_SESSION['check_room23']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec23'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[2];
                                $param_unit = $_SESSION['lessons23'];
                                $param_time = $_SESSION['time3'];
                                $param_room = $_SESSION['check_room23'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons24'] && $_SESSION['select_lec24'] && $_SESSION['check_room24']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec24'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[2];
                                $param_unit = $_SESSION['lessons24'];
                                $param_time = $_SESSION['time4'];
                                $param_room = $_SESSION['check_room24'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }

                        if($_SESSION['lessons25'] && $_SESSION['select_lec25'] && $_SESSION['check_room25']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec25'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[2];
                                $param_unit = $_SESSION['lessons25'];
                                $param_time = $_SESSION['time5'];
                                $param_room = $_SESSION['check_room25'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }

                        if($_SESSION['lessons30'] && $_SESSION['select_lec30'] && $_SESSION['check_room30']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec30'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[3];
                                $param_unit = $_SESSION['lessons30'];
                                $param_time = $_SESSION['time0'];
                                $param_room = $_SESSION['check_room30'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }

                        if($_SESSION['lessons31'] && $_SESSION['select_lec31'] && $_SESSION['check_room31']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec31'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[3];
                                $param_unit = $_SESSION['lessons31'];
                                $param_time = $_SESSION['time1'];
                                $param_room = $_SESSION['check_room31'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }

                        if($_SESSION['lessons32'] && $_SESSION['select_lec32'] && $_SESSION['check_room32']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec32'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[3];
                                $param_unit = $_SESSION['lessons32'];
                                $param_time = $_SESSION['time2'];
                                $param_room = $_SESSION['check_room32'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }

                        if($_SESSION['lessons33'] && $_SESSION['select_lec33'] && $_SESSION['check_room33']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec33'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[3];
                                $param_unit = $_SESSION['lessons33'];
                                $param_time = $_SESSION['time3'];
                                $param_room = $_SESSION['check_room33'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons34'] && $_SESSION['select_lec34'] && $_SESSION['check_room34']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec34'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[3];
                                $param_unit = $_SESSION['lessons34'];
                                $param_time = $_SESSION['time4'];
                                $param_room = $_SESSION['check_room34'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }

                        if($_SESSION['lessons35'] && $_SESSION['select_lec35'] && $_SESSION['check_room35']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec35'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[3];
                                $param_unit = $_SESSION['lessons35'];
                                $param_time = $_SESSION['time5'];
                                $param_room = $_SESSION['check_room35'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons40'] && $_SESSION['select_lec40'] && $_SESSION['check_room40']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec40'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[4];
                                $param_unit = $_SESSION['lessons40'];
                                $param_time = $_SESSION['time0'];
                                $param_room = $_SESSION['check_room40'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons41'] && $_SESSION['select_lec41'] && $_SESSION['check_room41']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec41'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[4];
                                $param_unit = $_SESSION['lessons41'];
                                $param_time = $_SESSION['time1'];
                                $param_room = $_SESSION['check_room41'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }

                        if($_SESSION['lessons42'] && $_SESSION['select_lec42'] && $_SESSION['check_room42']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec42'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[4];
                                $param_unit = $_SESSION['lessons42'];
                                $param_time = $_SESSION['time2'];
                                $param_room = $_SESSION['check_room42'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }

                        if($_SESSION['lessons43'] && $_SESSION['select_lec43'] && $_SESSION['check_room43']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec43'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[4];
                                $param_unit = $_SESSION['lessons43'];
                                $param_time = $_SESSION['time3'];
                                $param_room = $_SESSION['check_room43'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons44'] && $_SESSION['select_lec44'] && $_SESSION['check_room44']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec44'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[4];
                                $param_unit = $_SESSION['lessons44'];
                                $param_time = $_SESSION['time4'];
                                $param_room = $_SESSION['check_room44'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }


                        if($_SESSION['lessons45'] && $_SESSION['select_lec45'] && $_SESSION['check_room45']){
                            // Prepare an insert statement
                            $sql = "INSERT INTO lecturer_timetable (name, course, day, unitName, time, room) VALUES (?, ?, ?, ?, ?, ?)";
                            
                            if($stmt = mysqli_prepare($link, $sql)){
                                //bind variables to prepared statement
                                mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_course, $param_day, $param_unit, $param_time, $param_room);
                                //set params
                                $param_name = $_SESSION['select_lec45'];
                                $param_course = $_SESSION['courseName'];
                                $param_day = $days[4];
                                $param_unit = $_SESSION['lessons45'];
                                $param_time = $_SESSION['time5'];
                                $param_room = $_SESSION['check_room45'];
                            
                                //attempt to execute
                                if(mysqli_stmt_execute($stmt)){
                                    //success
                                }else{
                                    echo "Something went wrong";
                                }
                        // Close statement
                        mysqli_stmt_close($stmt);
                        }
                        }







            
                                
                                           
  // Close connection
  mysqli_close($link);
  header("location: ../admin/adminpage.php");
?>



 