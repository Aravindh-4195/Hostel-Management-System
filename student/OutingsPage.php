<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="../css/OutingsPage.css" />
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>
  <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
     $regno= $_SESSION['regno'];
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
                <a href="idCard.php">Click To Apply Outing</a>
              </li>
              <li class="item">
                <a href="presentOuting.php">Present Local Outing</a>
              </li>
              <li class="item">
                <a href="PastLOuting.php">View Past Local Outings</a>
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
                <a href="NonLOuting.php">Click To Apply Outing</a>
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
      <h1>Apply Outings</h1>
    </main>

    <script src="script.js"></script>
  </body>
</html>

