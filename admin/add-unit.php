<script src="../jQuery/jquery-3.5.1.js"></script> 
<?php
// Include connect file
require_once "../db_config/connect.php";

//Define our awesome variable here
$courseName = $semStage = $unitName = $unitCode = "";
$courseNameErr = $semStageErr = $unitNameErr = $unitCodeErr = "";

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
    //validate sem stage
    $selectSemStage = trim($_POST["semester-stage"]);
    if(empty($selectSemStage)){
        $semStageErr = "Please select a semester stage";
    }else{
        $semStage = $selectSemStage;
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
   if(empty($courseNameErr) && empty($semStageErr) && empty($unitNameErr) && empty($unitCodeErr)){
       //Prepare an insert statement here hehe
       $sql = "INSERT INTO courses (courseName, semStage, unitName, unitCode) VALUES (?, ?, ?, ?)";

       if($stmt = mysqli_prepare($link, $sql)){
           //Bind vars to prepared statements as params
           mysqli_stmt_bind_param($stmt, "ssss", $param_course, $param_sem, $param_unitName, $param_unitCode);

           // Set the terrific parameters here
           $param_course = $courseName;
           $param_sem = $semStage;
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


<script type="text/javascript">
        $(document).ready(function(){
       
        //show hidden table
        $("#show-courses").click(function(){
            $(".show-course").show();
        })

        
        $(".cancel").click(function(){
            $(".show-course").hide();
        })
        


        });

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
.show-course{
    display: none;
    margin: 0px;
    position: relative;
    
}
.label-block p{
    cursor: pointer;
    width: 300px;
    height: 30px;
    background-color: #7268e5;
    border: none;
    border-radius: 5px;
    margin-left: 400px;
    margin-bottom: 0px;
}
.cancel{
    cursor: pointer;
}
.show-table table td a{
    padding: 10px;
}
.show-table table{
    background-color: #7268e5;
    background: linear-gradient(
  to bottom,
  #7268e5 5%,
  #7268e5 0%,
  white 5%,
  white
);
/* The rectangle in which to repeat. 
   It can be fully wide in this case */
background-size: 100% 25px;
margin-left: 300px;
width: 500px;
overflow-y: scroll;


border-radius: 10px;
}
.show-table::-webkit-scrollbar {
    width: 12px;
}
.show-table::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
.show-table::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}


/* .show-table table{
    text-align: center;
} */
.show-table a{

    padding: 20px;
}
.show-table tr{
    text-align: center;
}
.cancel{
    /*background-color: #7268e5;*/
    cursor: pointer;



}
select{
    width: 200px;
    height: 30px;
}
</style>

<?php include('../templates/header.php'); ?>
<div class="container-space">
<div class="container">
<div class="add-unit" id="add-unit">
<h2>Add Course</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <div class="label-block">
    <div class="form-group <?php echo (!empty($courseNameErr)) ? 'has-error' : ''; ?>">
    <label>Course name:</label>
    <input type="text" id="course" name="course" placeholder="Enter the course here">
    <span class="help-block"><?php echo $courseNameErr;?></span>
    </div>
    <!-- <div class="label-block">
    <label>The number of units in comment here<p>Course</p>course</label>
    <input type="text" id="unit-number" name="input-number" placeholder="Enter the number of units">
    </div> -->

    <!-- select semester stage -->
    <div class="label-block">
    <div class="form-group <?php echo (!empty($unitNameErr)) ? 'has-error' : ''; ?>">
    <label for="semester-stage">Semester stage:</label>
                        <select name="semester-stage" id="semester-stage">
                        <option >--select semester stage--</option>
                        <option value="1.1">1.1</option>
                        <option value="1.2">1.2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.2">2.2</option>
                        <option value="2.1">3.1</option>
                        <option value="2.1">3.2</option>
                        <option value="2.1">4.1</option>
                        <option value="2.1">4.2</option>
                        <option value="2.1">5.1</option>
                        <option value="2.1">5.2</option>
                        </select>
                        </div>
    </div>
    <!--Loop depending on number of units units-->
    <div class="label-block">
    <div class="form-group <?php echo (!empty($unitNameErr)) ? 'has-error' : ''; ?>">
    <div id="unit">
    <label>Unit name:</label>
    <input type="text" id="unit-name" name="unit-name" placeholder="Enter unit name">
    <span class="help-block"><?php echo $unitNameErr;?></span>
    </div>
    <div class="label-block">
    <div class="form-group <?php echo (!empty($unitCodeErr)) ? 'has-error' : ''; ?>">
    <label>Unit code</label>
    <input type="text" id="unit-code" name="unit-code" placeholder="Enter unit code">
    <span class="help-block"><?php echo $unitCodeErr;?></span>
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
<div class="label-block">
    <p id="show-courses">Show available courses</p>
    </div>
</div>
</div>
</div>
</div>

<div class="show-course">
                        <h2>Course Details</h2>
                    <?php
                    include ('show-courses.php');
                    ?>

</div>
<?php include('../templates/footer.php') ?>