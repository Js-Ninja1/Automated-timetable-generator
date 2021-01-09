<?php

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
</div>
</div>
</div>
</div>


<?php include('../templates/footer.php') ?>