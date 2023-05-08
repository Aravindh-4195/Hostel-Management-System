<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script type="text/javascript">
       <link rel="icon" href="../images/logo.png">
       function back(){
         window.location.href ="blocks.php";
       }
       function register(){
         window.location.href ="blocks.php";
       }
     </script>
     <?php

     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
     include '../dbconnect.php';
     if($_POST['blockNo']!=NULL && $_POST['type']!=NULL && $_POST['floor']!=NULL && $_POST['RoomNo']){

     $blockno=$_POST['blockNo'];
     $type=$_POST['type'];
      $floor=$_POST['floor'];
     // $status=$_POST['status'];
      $RoomNo=$_POST['RoomNo'];
     session_start();
     //$check="select * from room where floor='$floor' and roomNO='$RoomNo' and blockNo='$blockno'";
     $check=mysqli_query($conn,"select * from room where floor='$floor' and roomNO='$RoomNo' and blockNo='$blockno' ");
     
    
     
     if(mysqli_num_rows($check)>0){
      echo "<script type='text/javascript'>alert('room is already available with given data')</script>";
      header("Refresh:0.01;url=addRoom.php?id=$blockno",true,303);
     }
     else{
   $sql="INSERT INTO `room` (`roomNo`,`blockNo`,`type`,`floor`)VALUES ('$RoomNo','$blockno','$type','$floor')";
   $query=mysqli_query($conn,$sql);
   if($query){
      echo "<script type='text/javascript'>alert('room is added succesfully')</script>";
      header("Refresh:0.01;url=blocks.php",true,303);
   }
   else{
    echo "<script type='text/javascript'>alert('room already exist for given data')</script>";
      header("Refresh:0.01;url=addRoom.php",true,303);
   }
  }}
  else{
    echo "<script type='text/javascript'>alert('all entries should be filled')</script>";
    header("Refresh:0.01;url=addRoom.php?id=<?php echo $blockno?>",true,303);
  }

}


      ?>
     
   </head>
  <link rel="stylesheet" href="..\css\Registration.css">
<body>
  <?php       session_start(); $blockno=$_GET['id'] ?>


  <div class="container">
    <div class="title">Add Room</div>
    <div class="content">
      <form action="addroom.php"   method="post" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">Block No</span>
            <input name="blockNo" type="text" value="<?php echo $blockno?>">
</div>
<div class="input-box">
            <span class="details">Room No</span>
            <input name="RoomNo" type="text" placeholder="Enter Room Number"  required pattern="[0-9]*">
</div>
        <div class="gender-details">
          <input type="radio" name="type" id="dot-1" value="NORMAL">
          <input type="radio" name="type" id="dot-2" value="PWD">
          <span class="gender-title">TYPE</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="type">NORMAL</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="type">PWD</span>
          </label>
        </div>
        <div class="gender-details">
          <input type="radio" name="floor" id="dot-5" value="1">
          <input type="radio" name="floor" id="dot-6" value="2">
          <input type="radio" name="floor" id="dot-7" value="3">
          <input type="radio" name="floor" id="dot-8" value="4">
          <span class="gender-title">FLOOR</span>
          <div class="category">
            <label for="dot-5">
            <span class="dot five"></span>
            <span class="floor"> 1</span>
          </label>
          <label for="dot-6">
            <span class="dot six"></span>
            <span class="floor"> 2</span>
          </label>
          <label for="dot-7">
            <span class="dot seven"></span>
            <span class="floor"> 3</span>
          </label>
          <label for="dot-8">
            <span class="dot eight"></span>
            <span class="floor"> 4</span>
          </label>

</div>

<div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="Add Room" name="submit" style="margin-left:85px;">
        </div>
        
      </form>
    </div>
  </div>

</body>
</html>
