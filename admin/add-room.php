
<script>

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
<form>
<div class="label-block">
    <label>Room name:</label>
    <input type="text" id="roomName" name="roomName"  placeholder="Enter the name of the room here">
    </div>
    <div class="label-block">
        <button>ADD</button>
    </div>
</form>
</div>

<?php include('../templates/footer.php'); ?>