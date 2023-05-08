<?php
session_start();
include ('dbConnect.php');


if(isset($_GET['id']))
{
	$attachment=($_GET['id']);
	$query="select attachment from announcement where attachment='$attachment'";
  $result=mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($result);
  if($result){
    header('location:admin/uploads/'.$row['attachment'].'');
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/viewannouncements.css" rel="stylesheet">


<?php include('dbConnect.php');?>
<link rel="icon" href="images/logo.png">
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
      <a href="viewannouncements.php?id=<?php echo $rows['attachment'];?>" title="view attachment" onclick="return confirm("Do you want to delete");" >click here</a></td>
  </div>
      </td>
  </tr>
  <?php
  }


  ?>
</tbody>
</table>
    </div>

  </body>
</html>