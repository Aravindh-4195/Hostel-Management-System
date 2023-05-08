<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="../css/OutingsPage.css" />
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="icon" href="../images/logo.png">

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
        $query=mysqli_query($conn,"select * from non_local where Studentid='$regno' and status='0'");
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


  <div class="heading" >
      
  </div>

    <div class="container">

        <div class="card">
            <div class="content">
                <div class="imgBx">
                    <img src="../admin/uploads/<?php echo $row['image']?>" alt="">
                </div>
                <div class="contentBx">
                    <h4><?php echo $row['name']?></h4>
                    <h4><?php echo $row['regno']?></h5>
                    <h5><?php echo "Out Date: ",$rows['OutDate']?></h5>
                    <h5><?php echo "Out Time: ",$rows['OutTime']?></h5>
                    <h5><?php echo "In Date: ",$rows['InDate']?></h5>
                    <h5><?php echo "In Time: ",$rows['InTime']?></h5>
                   
                
                </div>
                <div class="button">
                    
                <a href="presentNonLOuting1.php">
    <button>Outing Completed</button>
  </a> 
                </div>
            </div>
        </div>
        

    </div>


    </main>
   


    <script src="script.js"></script>
  </body>
</html>

