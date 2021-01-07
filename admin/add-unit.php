<?php
// Include connect file
require_once "../db_config/connect.php";

//Define our awesome variable here
$courseName = $unitName = $unitCode = "";
$courseNameErr = $unitNameErr = $unitCodeErr = "";

//Process data submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //validate course name
    $inputCourseName = trim($_POST["course"]);
    if(empty($inputCourseName)){
        $courseNameErr = "Please enter a course";

    }elseif(!filter_var($inputCourseName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp" => "/^[a-zA-Z\s]+$/")))){
        $courseNameErr = "Please enter a valid course name";
    }else{
        $courseName = $inputCourseName;
    }
    //Validate unit
   $inputUnitName = trim($_POST["unit-name"]);
   if(empty($inputUnitName)){
       $unitNameErr = "Please enter a unit name";
   } else{
       $unitName = $inputUnitName;
   }
   //Now we validate unit code yeey!
   $inputUnitCode = trim($_POST["unit-code"]);
   if(empty($inputUnitCode)){
       $unitCodeErr = "Please enter a unit code";
   }else{
       $unitCode = $inputUnitCode;
   }
   //Commancing error checking b4 inserting to database timetable_generator table courses
   if(empty($courseNameErr) && empty($unitNameErr) && empty($unitCodeErr)){
       //Prepare an insert statement here hehe
       $sql = "INSERT INTO courses (courseName, unitName, unitCode) VALUES (?, ?, ?)";

       if($stmt = mysqli_prepare($link, $sql)){
           //Bind vars to prepared statements as params
           mysqli_stmt_bind_param($stmt, "sss", $param_course, $param_unitName, $param_unitCode);

           // Set the terrific parameters here
           $param_course = $courseName;
           $param_unitName = $unitName;
           $param_unitCode = $unitCode;

           //Try to execute the stmt
           if(mysqli_stmt_execute($stmt)){
               //success.... Redirect to self for another insertion... So funny
               header("location: add-unit.php");
               exit();
               //still funny
           } else{
               echo "Something went wrong... Try again...";
           }
       }
       //Close stmt
       mysqli_stmt_close($stmt);
   }
   mysqli_close($link);

}

?>

<script>
// var courseName = document.getElementById('course');
// console.log(courseName);
</script>
<style>
.add-unit{
    font-size: 20px;
    padding: 10px;
    text-align: center;
    margin-top: 20px;
    display: block;
}
.add-unit form{
    padding: 10px;
}
.add-unit form label{
    padding: 5px;
}
.add-unit form input{
    border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: groove;
        background-color: inherit;
        outline: none;
        width: 250px;
        height: 25px;
        font-size: 20px;
        
}
.label-block{
    padding: 10px;
}
button{
    width: 150px;
    height: 40px;
    background-color: #7268e5;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

</style>

<?php include('../templates/header.php'); ?>
<div class="container-space">
<div class="container">
<div class="add-unit" id="add-unit">
<h2>Add Course</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <div class="label-block">
    <label>Course name:</label>
    <input type="text" id="course" name="course" placeholder="Enter the course here">
    </div>
    <!-- <div class="label-block">
    <label>The number of units in comment here<p>Course</p>course</label>
    <input type="text" id="unit-number" name="input-number" placeholder="Enter the number of units">
    </div> -->

    <!--Loop depending on number of units units-->
    <div class="label-block">
    <div id="unit">
    <label>Unit name:</label>
    <input type="text" id="unit-name" name="unit-name" placeholder="Enter unit name">
    </div>
    <div class="label-block">
    <label>Unit code</label>
    <input type="text" id="unit-code" name="unit-code" placeholder="Enter unit code">
    </div>
    <div class="label-block">
        <button>Add another</button>


</div>
</form>
<form action="finish.php" method="post">
    <div class="label-block">
    <button id="finish" value="finish" name="finish">Finish</button>
    </div>
</form>
</div>
</div>
</div>
</div>


<?php include('../templates/footer.php') ?>