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
    } elseif(!filter_var($input_lectureName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lectureNameErr = "Please enter a valid lecture name.";
    } else{
        $lectureName = $input_lectureName;
    }
    
}


?>

<script>

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

</style>

<?php include('../templates/header.php'); ?>
<div class="container-space">
<div class="container">
<div class="add-lecture" id="add-lecture">
<h2>Add Lecture</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <div class="label-block">
    <label>Lecture name:</label>
    <input type="text" id="lecture" name="lecture" placeholder="Enter the lecture name here">
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
    <div id="unit">
    <label>Unit name:</label>
    
    <input type="text" id="unit-name" name="unit-name" placeholder="Enter unit name">
    </div>
    <div class="label-block">
    <label>Unit code</label>
    <input type="text" id="unit-code" name="unit-code" placeholder="Enter unit code">
    </div>
    <div class="label-block">
        <button>Add another unit</button>
    </div>
    <div class="label-block">
        <button>Finish</button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>


<?php include('../templates/footer.php') ?>