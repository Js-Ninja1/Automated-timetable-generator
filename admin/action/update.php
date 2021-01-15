<?php 
//require connect file
require_once "../../db_config/connect.php";

//variables
$room = "";
$roomErr = "";

//process form data
if(isset($_POST["id"]) && !empty($_POST["id"])){
    //get hidden input value
    $id = $_POST["id"];

    //validate room
    $input_room = trim($_POST["new-room-name"]);
    if(empty($input_room)){
        $roomErr = "Please enter a room name";


    }else{
        $room = $input_room;
    }

    //check errors before inserting
    if(empty($roomErr)){
        //prepare statement
        $sql = "UPDATE rooms SET room = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            //bind variables to the preparesd statement
            mysqli_stmt_bind_param($stmt, "si", $param_room, $param_id);

            //set parameters
            $param_room = $room;
            $param_id = $id;

            //attempt execution
            if(mysqli_stmt_execute($stmt)){
                //success update Redirect back
                header("location: ../add-room.php");
                exit();
            }else{
                echo "Something went wrong";
            }
        }
        //close stmt
        mysqli_stmt_close($stmt);

    }
    //close link
    mysqli_close($link);
}else{
//check existence of id parameter b4 processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    //get url parameter
    $id = trim($_GET["id"]);

    //prepare select stmt
    $sql = "SELECT * FROM rooms WHERE id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        //bind vars to prepared statement
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        //set params
        $param_id = $id;

        //attempt execute
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                //fetch result row as an associative array
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                //Retrieve individual field value
                $room = $row["room"];
            }else{
                //invalid id
                echo "URL does not contain valid id";
            }
        }else{
            echo "Ooops, Something went wrong";
        }
    }
    //close statement
    mysqli_stmt_close($stmt);

    //close connection
    mysqli_close($link);
}else{
    echo "URL does not contain id parameter...";
}
}

?>
<!DOCTYPE <html>
<html>
<head>
<title>Edit</title>
<style>

</style>
<script>

</script>
</head>
<body>
<h2>Update room name</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
    <div class="form-group <?php echo (!empty($roomErr)) ? 'has-error' : ''; ?>">
   <label for="new-room-name">New room name:</label>
   <input type="text" name="new-room-name" placeholder = "Change room name here" value="<?php echo $room; ?>">
   </div>
   <input type="hidden" name="id" value="<?php echo $id; ?>"/>
   <input type="submit" class="btn-submit" value="Submit">
   <a href="../add-room.php" class="btn-cancel">Cancel</a>
   


</form>
</body>
</html>


