<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin page</title>

<!--Add a favicon-->
<link rel='icon' href='favicon.ico' type='image/x-icon'/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../templates/header.css">

    <!-- Call cream css -->
    <link rel="stylesheet" href="../templates/cream.css">

    <!-- Call admin page css-->
    <link rel="stylesheet" href="../style/adminpage.css">


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> -->

    <!--Timetable nme popup style-->
   <style>
       /* timetable-name
        color: #232323;
    font-size: 0.95em;    
    font-family: arial;
        --> */
    .timetable-name-form{
    width: 350px;
    height: 680px;
    margin: 0px;
    background-color: white;
    font-family: Arial;
    position: relative;
    left: 50%;
    top: 50%;
    margin-left: -210px;
    margin-top: 5px;
    box-shadow: 1px 1px 5px #444444;
    padding: 20px 40px 40px 40px;
       }
    #send{
    background-color: #09F;
    border: 1px solid #1398f1;
    font-family: Arial;
    color: white;
    width: 100%;
    padding: 10px;
    cursor: pointer;
}

    .timetable-name-form h1{
        /* font-weight: normal; */
        font-size: 20px;
    text-align: center;
    /* margin: 10px 0px 20px 0px; */
    }
    .timetable-input-name{
        color: #d30a0a;
    letter-spacing: 2px;
    padding-left: 5px;
    }
    .inputBox {
    width: 100%;
    margin: 5px 0px 15px 0px;
    border: #dedede 1px solid;
    box-sizing: border-box;
    padding: 15px;
}
#timetable-name-form {
    /* position: absolute; */
    /* top: 0px;
    left: 0px; */
    /* height: 100%; */
    /*width: 100%; */
    /* background: rgba(0, 0, 0, 0.5); */
    display: none;
    /* color: #676767; */
} 
.timetable-name{

}

.timetable-name-form label{
    font-size: 20px;
}
   </style>



    <!-- Custom Fonts-->
 
    <link rel='icon' href='../style/favicon.ico' type='image/x-icon'/>

    <!--Custom scrips-->
    <script src="admin.js"></script>
   
   <script src="https://kit.fontawesome.com/c8879970d7.js" crossorigin="anonymous"></script>

   <!--import jquery for the genarate time table name popup-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="../jQuery/jquery-3.5.1.js"></script>

   <!--popup  script-->
   <script>
       $(document).ready(function () {
           $("#generate-btn").click(function (){
               $("#timetable-name-form").show();
               console.log("hello world");
           });

       });
   </script>

   

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="topnav" role="navigation">

            <div class="navbar-header">
            <!-- <div id="generate-btn"> -->
                <h2>Hello Admin
                    
                <span style="float:left"><a href="#" id="generate-btn" style="font-size: 25px; padding-left:500px; color: white;">Generate New Timetable</a></span>
                <!-- </div> -->

               
                    <span style="float:right"><a href="../logout.php" style="font-size: 20px; color: white; padding-right:60px">Logout</a></span>
</h2>
            </div>

            <!--popup php create code-->
            <?php 
            //require connect file
            require_once "../db_config/connect.php";

            //define variables
            $timetable_name = $select_course = $sem_stage = "";
            $timetable_nameErr = $select_courseErr = $sem_stageErr = "";

            //process 
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //validate timetable name
                $input_timetable_name = trim($_POST["timetable-input-name"]);
                if(empty($input_timetable_name)){
                    $timetable_nameErr = "Please enter a name";
                } else{
                    $timetable_name = $input_timetable_name;
                }
                //validate selected course name
                $selected = trim($_POST["course-select-name"]);
                if(empty($selected)){
                    $select_courseErr = "Please select a course";
                }else{
                    $select_course = $selected;
                }
                //validate semester stage
                $selected_sem_stage = trim($_POST["select-sem-stage"]);
                if(empty($selected_sem_stage)){
                    $sem_stageErr = "Please select a semester stage";
                }else{
                    $sem_stage = $selected_sem_stage;
                }
                //check for error b4 submitting to db
                if(empty($timetable_nameErr) && empty($select_courseErr) && empty($sem_stageErr)){
                    //prepare an insert statement
                    $sql = "INSERT INTO timetable_name (timetable, course, sem_stage) VALUES (?, ?, ?)";

                    if($stmt = mysqli_prepare($link, $sql)){
                        //bind
                        mysqli_stmt_bind_param($stmt, "sss", $param_timetable_name, $param_course_name, $param_sem_stage);

                        //set params
                        $param_timetable_name = $timetable_name;
                        $param_course_name = $select_course;
                        $param_sem_stage = $sem_stage;

                        //shoot your shot
                        if(mysqli_stmt_execute($stmt)){
                            //of its a success... redirect to 
                            // echo "<a href='action/delete-course.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class=''>Delete</span></a>";
                            header("location: ../templates/edit.php?courseName=". $select_course ." & sem_stage=". $sem_stage ."");
                            exit();
                                
                        }else{
                            echo "something went wrong in submitting timetable name to db...";
                        }
                    }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($link);
            }
            ?>

             <!--popup form here-->
             <div id="timetable-name">
                <form class="timetable-name-form" id="timetable-name-form" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
                    <h1>Timetable name</h1>
                    <div>
                        <div>
                            <label>Name:</label><span id="timetable-name" class="timetable-name"></span>
                        </div>
                        <div>
                            <input type="text" id="timetable-input-name" name="timetable-input-name" class="inputBox" />

                        </div>
                        <div>
                            <label>Select course:</label><span id="timetable-name" class="timetable-name"></span>
                        </div>
                        <div>
                            <!-- <input type="select" id="course-name" name="course-select-name" class="inputBox" /> -->
                            <select id="course-name" name="course-select-name" class="inputBox">
                            <option disabled selected>--Select course--</option>
                            <?php 
                            require_once("../db_config/connect.php");

                            //prepare a statement
                            //$sql_query = "SELECT courseName FROM courses";
                            $records = mysqli_query($link, "SELECT DISTINCT courseName FROM courses");
                            while($data = mysqli_fetch_array($records)){
                                
                                echo "<option value='". $data['courseName'] ."'>" .$data['courseName'] ."</option>";
                            }

                            ?>
                            
                            </select>


                        </div>
                        <div>
                            <label>Select semester stage:</label><span id="timetable-name" class="timetable-name"></span>
                        </div>
                        <div>
                            <!-- <input type="select" id="course-name" name="course-select-name" class="inputBox" /> -->
                            <select id="sem-stage" name="select-sem-stage" class="inputBox">
                            <option disabled selected>--Select semester stage--</option>
                            <?php 
                            require_once("../db_config/connect.php");

                            //prepare a statement
                            //$sql_query = "SELECT courseName FROM courses";
                            $records = mysqli_query($link, "SELECT DISTINCT semStage FROM courses");
                            while($data = mysqli_fetch_array($records)){
                                
                                echo "<option value='". $data['semStage'] ."'>" .$data['semStage'] ."</option>";
                            }

                            ?>
                            
                            </select>


                        </div>


                    </div>
                    <div>
                        <input type="submit" id="send" name="send" value="Generate" />
                    </div>

                </form>

                <?php 
                mysqli_close($link);
                ?>
                </div>
                   


            <!-- Top Menu Items -->


            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="side-nav">
                <ul class="side-nav-content">
                    <li>
                        <a href="../admin/adminpage.php"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="add-room.php"><i class="fas fa-school"></i>Rooms</a>
                    </li>
                    <li>
                        <a href="add-unit.php"><i class="fas fa-book-reader"></i>Course</a>
                    </li>
                    <li>
                        <a href="add-lecture.php"><i class="fas fa-chalkboard-teacher"></i>Lecture</a>
                    </li>
                    <li>
                        <a href="add-timeframes.php"><i class="fas fa-clock"></i>Time frames</a>
                    </li>



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>