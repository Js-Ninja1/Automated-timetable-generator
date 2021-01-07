<?php
$finishClicked = false;

if(isset($_POST['finish'])){
    $finishClicked = true;
}
if($finishClicked){
    header("location: adminpage.php");
}
?>