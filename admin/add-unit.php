<?php

?>

<script>

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
<div class="add-unit" id="add-unit">
<h2>Add Units</h2>
<form>
    <div class="label-block">
    <label>Course name:</label>
    <input type="text" id="course" name="course" placeholder="Enter the course here">
    </div>
    <div class="label-block">
    <label>The number of units in<!--<p>Course</p>-->course</label>
    <input type="text" id="unit-number" name="input-number" placeholder="Enter the number of units">
    </div>

    <!--Loop depending on number of units units-->
    <div class="label-block">
    <div id="unit">
    <label>Unit<!--Show numbers-->name:</label>
    <input type="text" id="unit-name" name="unit-name" placeholder="Enter unit name">
    </div>
    <div class="label-block">
    <label>Unit code</label>
    <input type="text" id="unit-code" name="unit-code" placeholder="Enter unit code">
    </div>
    <div class="label-block">
        <button>ADD</button>
    </div>
</div>
</form>
</div>