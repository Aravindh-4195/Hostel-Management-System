<?php
session_start();
include ('../dbConnect.php');


if(isset($_GET['del']))
{
	$attachment=($_GET['del']);
	$query="delete  from announcement where AnnounceNo='$attachment'";
  $result=mysqli_query($conn,$query);
  if($result){
    echo "<script type='text/javascript'>alert('announcement is successfully withdrawed')</script>";
    header("Refresh:0.01;url=announcementdash.php",true,303);
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="..\css\viewcomplaints1.css" rel="stylesheet">
    <link rel="icon" href="../images/logo.png">

<?php include('../dbConnect.php');?>

  </head>
  <body>

<script src="https://kit.fontawesome.com/b99e675b6e.js">
    function checkData() {
  
  alert("The data already exists in the database.");
  return false;
}
</script>


<div class="table-section">
<table>
<thead>
  <!-- <tr>
    <th style="text-align: center;" colspan="6">Male</th>
  </tr> -->
  <div class="align">
        <div class="heading">complaints</div>
    </div>
 <tr>
 
    <th>Regarding</th>
    <th>complaintFrom</th>
    <th>Details</th>
    <th>Date</th>
    <th>Block</th>
  </tr>
 
</thead>
<tbody>
<?php

  $sql="SELECT * from complaint where complaintTo='admin'";
  $query=mysqli_query($conn,$sql);
  while($rows=mysqli_fetch_assoc($query))
  {
  ?>
  <tr> <td><?php echo $rows['regarding']; ?></td>
    <td><?php echo $rows['complaintFrom']?></td>
    <td><?php echo $rows['detail'];?></td>
    <td><?php echo $rows['date']?></td>
    <td><?php echo $rows['blockno']?></td>
    </tr>
  <?php
  }


  ?>
</tbody>
</table>
    </div>

  </body>
</html>