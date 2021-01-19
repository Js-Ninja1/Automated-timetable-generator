<?php
// Include connect file
require_once "../../db_config/connect.php";
 
// Define variables and initialize with empty values
$course_name = $unit_name = $unit_code = "";
$course_name_err = $unit_name_err = $unit_code_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate course name
    $input_course_name = trim($_POST["course-name"]);
    if(empty($input_course_name)){
        $course_name_err = "Please enter a course name.";
    }else{
        $course_name = $input_course_name;
    }
    
    // Validate unit name address
    $input_unit_name = trim($_POST["unit-name"]);
    if(empty($input_unit_name)){
        $unit_name_err = "Please enter a unit name...";     
    } else{
         $unit_name = $input_unit_name;
    }
    
    // Validate unit code
    $input_unit_code = trim($_POST["unit-code"]);
    if(empty($input_unit_code)){
        $unit_code_err = "Please enter the unit code.";     
    }else{
        $unit_code = $input_unit_code;
    }
    
    // Check input errors before inserting in database
    if(empty($course_name_err) && empty($unit_name_err) && empty($unit_code_err)){
        // Prepare an update statement
        $sql = "UPDATE courses SET courseName=?, unitName=?, unitCode=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_course_name, $param_unit_name, $param_unit_code, $param_id);
            
            // Set parameters
            $param_course_name = $course_name;
            $param_unit_name = $unit_name;
            $param_unit_code = $unit_code;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../add-unit.php");
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
        $sql = "SELECT * FROM courses WHERE id = ?";
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
                    $course_name = $row["courseName"];
                    $unit_name = $row["unitName"];
                    $unit_code = $row["unitCode"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    echo "URL does not contain validid";
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
        // URL doesn't contain id parameter.
        echo "URL does not contain id parameter";
        
    }
}
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update course</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the records.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($course_name_err)) ? 'has-error' : ''; ?>">
                            <label>Course name</label>
                            <input type="text" name="course-name" class="form-control" value="<?php echo $course_name; ?>">
                            <span class="help-block"><?php echo $course_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($unit_name_err)) ? 'has-error' : ''; ?>">
                            <label>Unit name</label>
                            <input type="text" name="unit-name" class="form-control" value="<?php echo $unit_name; ?>">
                            <span class="help-block"><?php echo $unit_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($unit_code_err)) ? 'has-error' : ''; ?>">
                            <label>Unit code</label>
                            <input type="text" name="unit-code" class="form-control" value="<?php echo $unit_code; ?>">
                            <span class="help-block"><?php echo $unit_code_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../add-unit.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
