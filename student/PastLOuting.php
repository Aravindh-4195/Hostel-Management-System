<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/PastOuting.css" />
   
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
   

  </head>
  <body>
  <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
        
    }
     $regno= $_SESSION['regno'];
     include '../dbconnect.php';
        $sql="select * from user where regno='$regno'";
        $con=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($con);
        $query=mysqli_query($conn,"select * from local_outings where studentid='$regno' and status='0'");
        $rows=mysqli_fetch_assoc($query);
     ?>
    <nav class="sidebar">
      <a href="studentdashboard.php" class="logo">SECURITY NITAP</a>

      <div class="menu-content">
        <ul class="menu-items">
          <div class="menu-title"></div>

          <li class="item">
            <a href="#">Outings</a>
          </li>

          <li class="item">
            <div class="submenu-item">
              <span>Local Outings</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
            Local Outings
              </div>
              <li class="item">
                <a href="idCard.php">Apply Local OUtings</a>
              </li>
              <li class="item">
                <a href="#">Present Local Outing</a>
              </li>
              <li class="item">
                <a href="#">View Past Local Outings</a>
              </li>
            </ul>
          </li>
          <li class="item">
            <div class="submenu-item">
              <span>Non-Local Outings</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                Non-Local Outings
              </div>
              <li class="item">
                <a href="NonLOuting.php">Apply Non-Local Outings</a>
              </li>
              <li class="item">
                <a href="presentNonLOuting.php">Present Non-Local Outing</a>
              </li>
              <li class="item">
                <a href="PastOuting.php">Past Non-Local Outings</a>
              </li>
             
            
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <nav class="navbar">
      <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>
    
        

    <main class="main">


   
    <?php 
     if (session_status() === PHP_SESSION_NONE) {
        session_start();
        
    }
     $regno= $_SESSION['regno'];
    ?>
<div class="table-section">
<table>
<thead>
  <!-- <tr>
    <th style="text-align: center;" colspan="6">Male</th>
  </tr> -->
  <div class="align">
        <div class="heading">History of Local Outings</div>
    </div>
  <tr>
    <th> Date</th>
    
    <th>Out Time</th>
 
   
  
    <th>In Time</th>
</tr>
</thead>
<tbody>
<?php

  $sql="SELECT * from local_Outings where Studentid='$regno' and status='1'";
  $query=mysqli_query($conn,$sql);
  while($rows=mysqli_fetch_assoc($query))
  {
  ?>
  <tr>
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



    </main>
   


    <script src="script.js"></script>
  </body>
</html>

