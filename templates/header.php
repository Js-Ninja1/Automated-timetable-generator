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

    <!--Timetable nme popup style-->
   <style>
       /* timetable-name
        color: #232323;
    font-size: 0.95em;    
    font-family: arial;
        --> */
    .timetable-name-form{
    width: 350px;
    height: 480px;
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

               
                    <span style="float:right"><a href="logout.php" style="font-size: 20px; color: white; padding-right:60px">Logout</a></span>
</h2>
            </div>

            <!--popup php create code-->
            <?php 
            //require connect file
            require_once "../db_config/connect.php";

            //define variables
            $timetable_name = "";
            $timetable_nameErr = "";

            //process 
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //validate timetable name
                $input_timetable_name = trim($_POST["timetable-input-name"]);
                if(empty($input_timetable_name)){
                    $timetable_nameErr = "Please enter a name";
                } else{
                    $timetable_name = $input_timetable_name;
                }
                //check for error b4 submitting to db
                if(empty($timetable_nameErr)){
                    //prepare an insert statement
                    $sql = "INSERT INTO timetable_name (timetable) VALUES (?)";

                    if($stmt = mysqli_prepare($link, $sql)){
                        //bind
                        mysqli_stmt_bind_param($stmt, "s", $param_timetable_name);

                        //set params
                        $param_timetable_name = $timetable_name;

                        //shoot your shot
                        if(mysqli_stmt_execute($stmt)){
                            //of its a success... redirect to 
                            header("location: ../templates/edit.php");
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

                    </div>
                    <div>
                        <input type="submit" id="send" name="send" value="Generate" />
                    </div>

                </form>
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