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
  <link rel="icon" href="../images/logo.png">
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="..\css\Viewannoucements.css" rel="stylesheet">


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
  <tr>
    <th>ANNOUCNEMETNS</th>
    
  </tr>
</thead>
<tbody>
<?php

  $sql="SELECT * from announcement";
  $query=mysqli_query($conn,$sql);
  while($rows=mysqli_fetch_assoc($query))
  {
  ?>
  <tr> <td><?php echo $rows['Title']; ?>
  <div class="link">

      <a href="editAnnoucement.php?id=<?php echo $rows['AnnounceNo'];?>" title="view attachment">  edit  </a>
  </div>
  <div class="link">

<a href="viewannoucement.php?del=<?php echo $rows['AnnounceNo'];?>" title="view attachment" >delete</a>
</div></td>
     
  </tr>
  <?php
  }


  ?>
</tbody>
</table>
    </div>

  </body>
</html>