<?php
//require connect file
require_once "../db_config/connect.php";

//define vars
$fromTime = $toTime = "";
$fromTimeErr = $toTimeErr = "";

//process the data 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //VALIDATE TIME
    // if(isset($_POST['fromTime']) == "" || !is_numeric($_POST['fromTime']) || ($_POST['fromTime']) >= 23){
    //     echo "<script>alert('wrong time format'); window.history.go(-1);</script>";
    // }

    //nothing to validate here
$fromTime = $_POST["fromTime"];
//echo $fromTime;
$toTime = $_POST["toTime"];
//echo $toTime;

if(empty($fromTimeErr) && empty($toTimeErr)){
    //prepare stmt
    $sql = "INSERT INTO time_frames (startTime, endTime) VALUES (?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        //bind vars to prepared statement as params
        mysqli_stmt_bind_param($stmt, "ss", $param_fromTime, $param_toTime);

        //set params
        $param_fromTime = $fromTime;
        $param_toTime = $toTime;

        //execute
        if(mysqli_stmt_execute($stmt)){
            header("location: add-timeframes.php");
            exit();
        }else{
            echo "Something went wrong at time frames...";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);

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
    float: left;
    margin-left: 100px;
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
<h2>Add Time frames</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
    <div class="label-block">
    <!-- <h2>Week days</h2>
    <ul>
        <li>Monday</li>
        <li>Tuesday</li>
        <li>Wednesday</li>
        <li>Thursday</li>
        <li>Friday</li>
    </ul> -->
    
    <input type="time" name="fromTime" id="name">
    <label>To</label>
    <input type="time" name="toTime" id="name">

    </div>
    <div class="time-frames"></div>
    <div class="add-button">
        <button value="submit">Add another time frame</button>
    </div>   
</div>
</form>
<form action="finish.php" method="post">

    <div class="label-block">
    <button id="finish" value="finish" name="finish">Finish</button>
    </div>
</form>
<div class="label-block">
    <button id="show-time-frames" name="show-time-frames">Show available time frames</button>
    </div>
</div>
</div>
</div>
</div>

<div class="show-time-frames">
                        <h2>Time frames Details</h2>
                    <?php
                    //include ('show-rooms.php');
                    ?>

</div>

<?php include('../templates/footer.php') ?>