<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="../css/viewNLOutings.css" />
    <link rel="icon" href="../images/logo.png">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
   

  </head>
  <body>
  <?php
   
     include '../dbconnect.php';
  
     if (session_status() === PHP_SESSION_NONE) {
         session_start();
     }
      $empid= $_SESSION['empid'];
      $connect=mysqli_query($conn,"select block from employee where empid='$empid'");
      $row=mysqli_fetch_assoc($connect);
      $blockno=$row['block'];
      

        $query=mysqli_query($conn,"select * from local_outings where Studentid in(select regno from user where block='$blockno')");
        $rows=mysqli_fetch_assoc($query);
     ?>

<div class="table-section">
<div class="align">
        <div class="heading">History of Local Outings</div>
    </div>
<table>
<thead>
  <!-- <tr>
    <th style="text-align: center;" colspan="6">Male</th>
  </tr> -->
  
  <tr>
    <th>Reg No</th>


    <th>Date</th>
    
    <th>Out Time</th>
 
   
  
    <th>In Time</th>
</tr>
</thead>
<tbody>
<?php
  while($rows=mysqli_fetch_assoc($query))
  {
  ?>
  <tr>
    <td><?php echo $rows['studentid']?></td>
  <td><?php echo $rows['Date']?></td>
 
  <td><?php echo $rows['OutTime']?></td>

  <td><?php echo $rows['InTime']?></td>

  
  </tr>
  <?php
  }


  ?>
</tbody>
</table>
    </div>
  </body>
</html>

