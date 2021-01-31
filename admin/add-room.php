 <!--import jquery for the genarate time table name popup-->
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
   <script src="../jQuery/jquery-3.5.1.js"></script> 
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
#show-rooms{
    background-color: #7268e5;
    cursor: pointer;
    margin-left: 500px;
    width: 300px;
    height: 50px;
    border-radius: 5px;
}
.show-rooms{

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
</style>

<script type="text/javascript">
        $(document).ready(function(){
        // $('[data-toggle="tooltip"]').tooltip();

        //show hidden table
        $("#show-rooms").click(function(){
            $(".show-rooms").show();
        })

        // $("#show-rooms") = clic
        //     $("#cancel").click(function(){
        //         $(".show-rooms").hind();
        //     })
        //hind
        
        $(".cancel").click(function(){
            $(".show-rooms").hide();
        })
        


        });

</script>


<?php include('../templates/header.php'); ?>

<div class="add-new-room" id="add-room">
<h2>Add a new Room</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
<div class="label-block">
<div class="form-group <?php echo (!empty($roomErr)) ? 'has-error' : ''; ?>">
    <label>Room name:</label>
    <input type="text" id="roomName" name="roomName"  placeholder="Enter the name of the room here">
    <span class="help-block"><?php echo $roomErr;?></span>
    </div>
    <div class="label-block">
        <button value="Submit" onclick="submitRoom();">Add another room</button>
    </div>
</form>
<form action="finish.php" method="post">
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


    <div class="label-block">
    <p id="show-rooms">Show available rooms</p>
    </div>


</div>


<!--show room div style-->


<!--show room script-->

 

<div class="show-rooms">

                        <h2>Rooms Details</h2>
                    <?php
                    include ('show-rooms.php');
                    ?>

</div>

<?php include('../templates/footer.php'); ?>