<?php
 
 if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$regno= $_SESSION['regno'];

include ('dbConnect.php');


if(isset($_GET['id']))
{
	$roomNo=$_GET['id'];
   $floor=$_GET['floor'];
   $blockno=$_GET['blockno'];
   $year=$_GET['year'];
   $filled=(intval($_GET['status']))+1;
   //$new_filled=$filled+1;
	$query="update user set roomno ='$roomNo',floor='$floor' where regno='$regno'";
  $status="update room set noFilled='$filled' where roomNo='$roomNo' and floor='$floor' and blockNo='$blockno'";

 // $reg="INSERT INTO registeredUsers (regno) VALUES ('$regno')";
  //$regis=mysqli_query($conn,"INSERT INTO registeredUsers (regno) VALUES ('$regno')");
  $stat=mysqli_query($conn,$status);

  $result=mysqli_query($conn,$query);
  if($result && $stat && mysqli_query($conn,"INSERT INTO registeredUsers (regno,`year`) VALUES ('$regno','$year')")){
    echo "<script type='text/javascript'>alert('registration succesfull')</script>";
      header("Refresh:0.01;url=student/studentdashboard.php",true,303);
  }
 
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rooms</title>
    <link rel="stylesheet" href="css\Rooms.css">
    <link rel="icon" href="images/logo.png">
    <script type="text/javascript">
      function change(){
        window.location.href ="registration.php";
      }
      function rtohome(){
        window.location.href ="index.php";
      }
    </script>
  </head>

  <body>
    <?php
  $blockno=$_GET['block'];

include "dbconnect.php";
$block="select  blockName,year from block where blockno='$blockno'";
$connect=mysqli_query($conn,$block);
$rowss=mysqli_fetch_assoc($connect);
?>
<h1><?php echo $rowss['blockName']?><h1>
<ul class="showcase">
      <li>
        <div class="room1"></div>
        <small>N/A</small>
      </li>

      <li>
        <div class="room1 selected"></div>
        <small>Selected</small>
      </li>

      <li>
        <div class="room1 filled"></div>
        <small>Occupied</small>
      </li>
    </ul>
      <?php
     
    
      $floor="select max(floor) as maximum from room ";
      $connect=mysqli_query($conn,$floor);
      $row=mysqli_fetch_assoc($connect);
      $count=1;
      ?>
      <div class ="container">
        <?php
        $status=mysqli_query($conn,"select * from block where blockno='$blockno'");
        $stat=mysqli_fetch_assoc($status);
      while($count<=$row['maximum']){
        
      $sql="select * from room where floor=$count and blockno='$blockno'";
     ?><div class="row">
            <div class="floor">
                <h4><?php echo 'Floor:',$count?></h4>
      </div>
     <?php
      $result=mysqli_query($conn,$sql);
      $filled=$stat['seater'];
      if(isset($result)){
       ?>
        <?php
        while($rows=mysqli_fetch_assoc($result))
       {
        if($rows['noFilled']<$filled){
       ?>
      <div class="room" >
      <a href="rooms.php?id=<?php echo $rows['roomNo'] ?>&floor=<?php echo $rows['floor']?>&year=<?php echo $rowss['year']?>&blockno=<?php echo $blockno?>&status=<?php echo $rows['noFilled']?>">

          
          <h6 class="no"><?php echo $rows['roomNo']?></h6>
          <div class="type"><?php echo $rows['type']?></div>
          <div class="type"><?php echo $rows['noFilled']," FILLED"?></div>
        </a>

      </div> 
      <?php
        }
      else{
        
        ?>
          <div class="room filled">
          <h6 class="no"><?php echo $rows['roomNo']?></h6>
          
      </div>
      <?php
        }
    ?>
       
<?php
       }
      }
      $count++;
      ?>
      
      </div>
      <?php
      }
      ?>
</div>
      

  </body>
</html>
