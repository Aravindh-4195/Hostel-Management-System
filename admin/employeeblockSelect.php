
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pricing</title>
    <link rel="stylesheet" href="..\css\Blocks.css">
    <link rel="icon" href="../images/logo.png">
    <?php
include ('../dbConnect.php');

if(isset($_GET['id']))
{
	$blockno=$_GET['id'];
    $empid=$_GET['empid'];
	$query="update employee set block ='$blockno' where empid='$empid'";
  $result=mysqli_query($conn,$query);
  if($result){
    
      header("Refresh:0.01;url=employedit.php",true,303);
  }
}
?>


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
       $empid=$_GET['empid'];
     
      
      include "../dbconnect.php";
      $check=mysqli_query($conn ,"select * from employee where empid='$empid'");
      if(mysqli_num_rows($check)>1){
        echo "<script type='text/javascript'>alert('Another Employee Exist with the same empid')</script>";
      header("Refresh:0.01;url=../admin/employedit.php",true,303);
      }
      else{
      $gender=mysqli_query($conn,"select gender from employee where empid='$empid' ");
      
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
<img style="height:150px; width:150px;" src="uploads/<?php echo $rows['image']?>" alt="">
</div>
<li><?php echo $rows['seater']," SEATER"?></li>
<li><?php echo $rows['year']," BTECH"?></li>
<li><?php echo $rows['gender']?></li>
<li class="grey"><a href="employeeblockSelect.php?id=<?php echo $rows['blockno']?>&&empid=<?php echo $empid ?>"class="button">Select</a></li>

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
<img style="height:150px; width:150px;" src="uploads/<?php echo $rows['image']?>" alt="">
</div>
<li><?php echo $rows['seater']," SEATER"?></li>
<li><?php echo $rows['year']," BTECH"?></li>
<li><?php echo $rows['gender']?></li>
<li class="grey"><a href="employeeblockSelect.php?id=<?php echo $rows['blockno']?>&&empid=<?php echo $empid ?>"class="button">Select</a></li>

</ul>
</div>
<?php
       }}}
      }
?>
  </body>
</html>
