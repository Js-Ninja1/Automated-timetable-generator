<?php
// Include connect file
require_once "../../db_config/connect.php";
 
// Define variables and initialize with empty values
$start_time = $end_time = "";
$start_time_err = $end_time_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate start time
    $input_start_time = trim($_POST["start-time"]);
    if(empty($input_start_time)){
        $start_time_err = "Select time.";
    }else{
        $start_time = $input_start_time;
    }
    
    // Validate end time
    $input_end_time = trim($_POST["end-time"]);
    if(empty($input_end_time)){
        $end_time_err = "Please select end time.";   
    } else{
        $end_time = $input_end_time;
    }
   
    
    // Check input errors before inserting in database
    if(empty($start_time_err) && empty($end_time_err)){
        // Prepare an update statement
        $sql = "UPDATE time_frames SET startTime=?, endTime=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_start_time, $param_end_time, $param_id);
            
            // Set parameters
            $param_start_time = $start_time;
            $param_end_time = $end_time;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../add-timeframes.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM time_frames WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $start_time = $row["startTime"];
                    $end_time = $row["endTime"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    echo "URL does not contain valid id";
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        echo "URL does not contain valid id";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update time slot</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update time slot</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($start_time_err)) ? 'has-error' : ''; ?>">
                            <label>Start time</label>
                            <input type="time" name="start-time" class="form-control" value="<?php echo $start_time; ?>">
                            <span class="help-block"><?php echo $start_time_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($end_time_err)) ? 'has-error' : ''; ?>">
                            <label>End time</label>
                            <input type="time" name="end-time" class="form-control" value = "<?php echo $end_time; ?>">
                            <span class="help-block"><?php echo $end_time_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../add-timeframes.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>