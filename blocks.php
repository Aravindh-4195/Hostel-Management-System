<?php
 
 if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$regno= $_SESSION['regno'];
include ('dbConnect.php');


if(isset($_GET['id']))
{
	$blockno=$_GET['id'];
	$query="update user set block ='$blockno' where regno='$regno'";
  $result=mysqli_query($conn,$query);
  if($result){
    
      header("Refresh:0.01;url=rooms.php?block=$blockno",true,303);
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pricing</title>
    <link rel="stylesheet" href="css\block1.css">

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
       if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
      
      $regno= $_SESSION['regno'];
      include "dbconnect.php";
      $check=mysqli_query($conn ,"select * from registeredusers where regno='$regno'");
      if(mysqli_num_rows($check)>0){
        echo "<script type='text/javascript'>alert('your are already booked the room')</script>";
      header("Refresh:0.01;url=student/studentdashboard.php",true,303);
      }
      else{
      $gender=mysqli_query($conn,"select gender from user where regno='$regno' ");
      $row=mysqli_fetch_assoc($gender);
      if($row['gender']=='male'){
      $sql="select * from block where gender='male'";
      $result=mysqli_query($conn,$sql);
      if($result){
        while($rows=mysqli_fetch_assoc($result))
       {
       ?>
       
      <div class="columns">
<ul class="price">
<li class="header"><?php echo $rows['blockName']?></li>
<div class="imagewrapper">
<img style="height:150px; width:150px;" src="admin/uploads/<?php echo $rows['image']?>" alt="">
</div>
<li><?php echo $rows['seater']," SEATER"?></li>
<li><?php echo $rows['year']," BTECH"?></li>
<li><?php echo $rows['gender']?></li>
<li class="grey"><a href="blocks.php?id=<?php echo $rows['blockno'] ?>"class="button">Select</a></li>

</ul>
</div>
<?php
}
      }
    }
    else{
      $sql="select * from block where gender='female'";
      $result=mysqli_query($conn,$sql);
      if($result){
        while($rows=mysqli_fetch_assoc($result))
       {
       ?>
       
      <div class="columns">
<ul class="price">
<li class="header"><?php echo $rows['blockName']?></li>
<div class="imagewrapper">
<img style="height:150px; width:150px;" src="admin/uploads/<?php echo $rows['image']?>" alt="">
</div>
<li><?php echo $rows['seater']," SEATER"?></li>
<li><?php echo $rows['year']," BTECH"?></li>
<li><?php echo $rows['gender']?></li>
<li class="grey"><a href="blocks.php?id=<?php echo $rows['blockno'] ?>"class="button">Select</a></li>

</ul>
</div>
<?php
       }}}
      }
?>
  </body>
</html>
