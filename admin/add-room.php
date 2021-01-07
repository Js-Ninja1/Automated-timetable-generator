<?php
require_once "../db_config/connect.php";
$room = "";
$roomErr = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Validate room
    //$input_room = (isset($_REQUEST["NameOfInputFromForm"])) ? strip_tags($_REQUEST["NameOfInputFromForm"]) : "-";
    $input_room = trim($_POST["roomName"]);
    if(empty($input_room)){
        $roomErr = "please enter a room.";

    }elseif(!filter_var($input_room, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))){
        $roomErr = "please enter a valid room.";
    } else{
        $room = $input_room;
    }
    // echo $room;

    //Check for errors before inserting into the DB
    if(empty($roomErr)){
        //prepare an insert statement
        $sql = "INSERT INTO rooms (room) VALUES (?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            //Bind variable to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_room);

            //Set parameters
            $param_room = $room;

            //Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //Room added successfully. Redirect to that same page
                header("location: add-room.php");
                exit();
            } else{
                echo "Something went very wrong here Sisi";
            }
        }
        //close statement
        mysqli_stmt_close($stmt);
    }
    //Close connection
    mysqli_close($link);
}
 
?>
<script>
 function submitRoom(){
     //Validate INPUT first. Then grab the form.
     form = new FormData($('#frmIdHere')[0]);
     $.ajax ({
           type: 'POST',
           dataType: 'text',
           url: url,
           data: form,
           success:data => {
              //Success message here.
              //clear form here.
           },
           error: () => {
              // error message here.
           }
      });
}
// document.getElementById("finish").onclick = function () {
//         location.href = "../admin/adminpage.php";


</script>
<style>
.add-new-room{
    background-color: #ffdc82;
    font-size: 20px;
    padding: 10px;
    text-align: center;
    margin-top: 0px;
    margin-bottom: 0px;
    margin-right:0px;
    margin-left:300px;
    display: block;
    width: 1500px;
    height:700px;
    position:fixed;
    

}
.add-new-room form{
    padding: 10px;
}
.add-new-room form label{
    padding: 5px;
}
.add-new-room form input{
    
    border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: groove;
        background-color: inherit;
        outline: none;
        width:500px;
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

<div class="add-new-room" id="add-room">
<h2>Add a new Room</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
<div class="label-block">
    <label>Room name:</label>
    <input type="text" id="roomName" name="roomName"  placeholder="Enter the name of the room here">
    </div>
    <div class="label-block">
        <button value="Submit" onclick="submitRoom();">Add another room</button>
    </div>
</form>
<form action="add-room-finish.php" method="post">
<!-- /<?php
// $finishClicked = false;

// if(isset($_POST['finish'])){
//     $finishClicked = true;
// }
// if($finishClicked){
//     header("location: adminpage.php");
// }
?> -->
    <div class="label-block">
    <button id="finish" value="finish" name="finish">Finish</button>
    </div>
</form>

</div>

<?php include('../templates/footer.php'); ?>