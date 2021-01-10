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

                <h2>Hello Admin
                <span style="float:left"><a href="#" style="font-size: 25px; color: white; padding-left:500px; transform: rotateX(150deg)">Generate New Timetable</a></span>
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