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

    <!-- Custom Fonts-->
 
    <link rel='icon' href='../style/favicon.ico' type='image/x-icon'/>

    <!--Custom scrips-->
    <script src="admin.js"></script>
   
   <script src="https://kit.fontawesome.com/c8879970d7.js" crossorigin="anonymous"></script>



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="topnav" role="navigation">

            <div class="navbar-header">
<style>
    .btnGenerateTimetable{
color: white;
    }
    .btnGenerateTimetable:hover { 
            text-shadow: 0 1px 0 #ccc, 0 2px 0 #ccc, 
                0 3px 0 #ccc, 0 4px 0 #ccc, 
                0 5px 0 #ccc, 0 6px 0 #ccc, 
                0 7px 0 #ccc, 0 8px 0 #ccc, 
                0 9px 0 #ccc, 0 10px 0 #ccc, 
                0 11px 0 #ccc, 0 12px 0 #ccc, 
                0 20px 30px rgba(0, 0, 0, 0.5); 
        } 
</style>
                <h2>Hello Admin
                <span id="btnGenerateTimetable" style="float:left"><a href="#" id="btnGenerateTimetable" style="font-size: 25px; padding-left:500px; color: white; border: black, solid, 2px;">Generate New Timetable</a></span>
                <div class="console-container">
                    <style>
                        @import url(https://fonts.googleapis.com/css?family=Khula:700);
body {
  background: #111;
}
.hidden {
  opacity:0;
}
.console-container {
 
  font-family:Khula;
  font-size:4em;
  text-align:center;
  height:200px;
  width:600px;
  display:block;
  position:absolute;
  color:white;
  top:0;
  bottom:0;
  left:0;
  right:0;
  margin:auto;
}
.console.underscore{
    display:inline-block;
    position: relative;
    top: -0.14em;
    left: 10px;
}
                    </style>
                    <script>
                        
                    </script>
                    <span id="text"></span>
                    <div class="console-underscore" id="console">$#95;</div>

                </div>
                    <span style="float:right"><a href="logout.php" style="font-size: 20px; color: white; padding-right:10px">Logout</a></span>
</h2>
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