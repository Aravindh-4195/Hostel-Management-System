
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
if($_POST['floor']!=NULL&& $_POST['RoomNo']){

$blockno=$_POST['blockno'];

 $floor=$_POST['floor'];

 $RoomNo=$_POST['RoomNo'];
 if($RoomNo!='--select Room--'){
session_start();
$sql="update room set blockStatus='blocked' where blockno='$blockno' and floor='$floor' and RoomNo='$RoomNo'";
$query=mysqli_query($conn,$sql);
if($query){
 echo "<script type='text/javascript'>alert('room is blocked succesfully')</script>";
 header("Refresh:0.01;url=blocks.php",true,303);
}
 }
else{
echo "<script type='text/javascript'>alert('no room was selected')</script>";
 header("Refresh:0.01;url=blockRoom.php",true,303);
}

}
}

 ?>
   </head>
  <link rel="stylesheet" href="..\css\blockRoom.css">
<body>



  <div class="container">
    <div class="title">Blook Room</div>
    <b><h7 color=red;>Enter block No and Room No that to be changed</h7></b>
    <div class="content">
      <form action="blockRoom3.php"   method="post">
        <div class="user-details">
          <div class="choice">
          <?php
            
           
             $blockno=$_GET['blockno'];
            $floor=$_GET['floor'];
            include("../dbconnect.php");
            $block=mysqli_query($conn,"select roomNo from room where blockno='$blockno' and floor='$floor'");
            ?>
               <div>BLOCK</div>
              <select name="blockno" class="drop">
                  
                  <option value="<?php echo $blockno?>"><?php echo $blockno?></option>
                  </select>
                  <div>FLOOR</div>
              <select name="floor" class="drop">
                  
                  <option value="<?php echo $floor?>"><?php echo $floor?></option>
                  </select>
                  <div>ROOM NO</div>
              <select name="RoomNo" class="drop">
              <option value="--select floor--">--select room--</option>
              <?php
              while($row=mysqli_fetch_assoc($block))
              {
                ?>
              
                  <option value="<?php echo $row['roomNo']?>"><?php echo $row['roomNo']?></option>
                 
        <?php
      }
      ?>
          
          </select>
        
        </div>

      <div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="BLOCK ROOM" name="submit" style="margin-left:85px;">
        </div>
        </div> 
      </form>
    
    

    </div>
  </div>

</body>
</html>
