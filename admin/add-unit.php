<?php

?>

<script>
// var courseName = document.getElementById('course');
// console.log(courseName);
</script>
<style>
.add-unit{
    font-size: 20px;
    padding: 10px;
    text-align: center;
    margin-top: 20px;
    display: block;
}
.add-unit form{
    padding: 10px;
}
.add-unit form label{
    padding: 5px;
}
.add-unit form input{
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
<div class="add-unit" id="add-unit">
<h2>Add Course</h2>
<form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
    <div class="label-block">
    <label>Course name:</label>
    <input type="text" id="course" name="course" placeholder="Enter the course here">
    </div>
    <!-- <div class="label-block">
    <label>The number of units in comment here<p>Course</p>course</label>
    <input type="text" id="unit-number" name="input-number" placeholder="Enter the number of units">
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
        <button>Add another</button>
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