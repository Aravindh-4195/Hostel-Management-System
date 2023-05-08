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

        $query=mysqli_query($conn,"select * from non_local");
        $rows=mysqli_fetch_assoc($query);
     ?>

<div class="table-section">
<div class="align">
        <div class="heading">History of Non-Local Outings</div>
    </div>
<table>
<thead>
  <!-- <tr>
    <th style="text-align: center;" colspan="6">Male</th>
  </tr> -->
  
  <tr>
    <th>Reg no</th>
    <th>Out Date</th>
    
    <th>Out Time</th>
 
    <th>In Date</th>
  
    <th>In Time</th>
</tr>
</thead>
<tbody>
<?php
  while($rows=mysqli_fetch_assoc($query))
  {
  ?>
  <tr>
    <td><?php echo $rows['Studentid']?></td>
  <td><?php echo $rows['OutDate']?></td>
 
  <td><?php echo $rows['OutTime']?></td>

  <td><?php echo $rows['InDate']?></td>

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

