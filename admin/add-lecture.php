<!--import jquery for the genarate time table name popup-->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
 <script src="../jQuery/jquery-3.5.1.js"></script> 

<?php
// Include connect file
require_once "../db_config/connect.php";

//Define
$lectureName = $unitName = $unitCode = "";
$lectureNameErr = $unitNameErr = $unitCodeErr = "";

//process submitted data
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //validate lecture name
    $input_lectureName = trim($_POST["lecture"]);
    if(empty($input_lectureName)){
        $lectureNameErr = "Please enter a lecture name.";
    }else{
        $lectureName = $input_lectureName;
    }
    //validate unit name
    $inputUnitName = trim($_POST["unit-name"]);
    if(empty($inputUnitName)){
        $unitNameErr = "Please enter a unit name";
    } else{
        $unitName = $inputUnitName;
    }

    //validate unit code
   $inputUnitCode = trim($_POST["unit-code"]);
   if(empty($inputUnitCode)){
       $unitCodeErr = "Please enter a unit code";
   }else{
       $unitCode = $inputUnitCode;
   }

   //checking errors
   if(empty($lectureNameErr) && empty($unitNameErr) && empty($unitCodeErr)){
       //prepare stmt
       $sql = "INSERT INTO lecturer (lectureName, unitName, unitCode) VALUES (?, ?, ?)";

       if($stmt = mysqli_prepare($link, $sql)){
           //Bind
           mysqli_stmt_bind_param($stmt, "sss", $param_lectureName, $param_unitName, $param_unitCode);

           //set params
           $param_lectureName = $lectureName;
           $param_unitName = $unitName;
           $param_unitCode = $unitCode;

           //Execute
           if(mysqli_stmt_execute($stmt)){
               //success... redirect
               header("location: add-lecture.php");
               exit();
           }else{
               echo "Something went wrong at add_lecture";
           }


       }
       mysqli_stmt_close($stmt);
   }
    mysqli_close($link);
}


?>

<script type="text/javascript">
        $(document).ready(function(){
        // $('[data-toggle="tooltip"]').tooltip();

        //show hidden table
        $("#show-lectures").click(function(){
            $(".show-lectures").show();
        })

        // $("#show-rooms") = clic
        //     $("#cancel").click(function(){
        //         $(".show-rooms").hind();
        //     })
        //hind
        
        $(".cancel").click(function(){
            $(".show-lectures").hide();
        })
        


        });

</script>

<style>
.add-lecture{
    font-size: 20px;
    padding: 10px;
    text-align: center;
    margin-top: 20px;
    display: block;
}
.add-lecture form{
    padding: 10px;
}
.add-lecture form label{
    padding: 5px;
}
.add-lecture form input{
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
#show-lectures{
    width: 150px;
    height: 60px;
    background-color: #7268e5;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    margin-left: 400px;
}
.show-lectures{
    display: none;
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
</style>

<?php include('../templates/header.php'); ?>
<div class="container-space">
<div class="container">
<div class="add-lecture" id="add-lecture">
<h2>Add Lecture</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">

    <div class="label-block">
    <div class="form-group <?php echo (!empty($lectureNameErr)) ? 'has-error' : ''; ?>">
    <label>Lecture name:</label>
    <input type="text" id="lecture" name="lecture" placeholder="Enter the lecture name here">
    <span class="help-block"><?php echo $lectureNameErr;?></span>
    </div>
    
    <!-- <div class="label-block">
    <label>Lecture Id</label>
    <input type="text" id="lecture-id" name="input-id" placeholder="Enter lecture id">
    </div> -->
    <!-- <div class="label-block">
    <label>The number of units taught by  <p>Course</p>  lecture</label>
    <input type="text" id="lecture-units" name="input-number" placeholder="Enter the number of units">
    </div> -->
   

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
        <button value="Submit">Add another unit</button>
    </div>
</div>
</form>
<form action="finish.php" method="post">
    <div class="label-block">
    <button id="finish" value="finish" name="finish">Finish</button>
    </div>
</form>
<div class="label-block">
    <p id="show-lectures">Show available lectures</p>
    </div>


</div>



 

<div class="show-lectures">

                        <h2>Lecture Details</h2>
                    <?php
                    include ('show-lectures.php');
                    ?>

</div>
</div>
</div>
</div>
</div>


<?php include('../templates/footer.php') ?>