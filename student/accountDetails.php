<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <link rel="icon" href="../images/logo.png">
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="..\css\accountdetails1.css" />
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
     $regno= $_SESSION['regno'];
     ?>
     <script type="text/javascript">
      function goback(){
        window.location.href="studentdashboard.php";
      }
      </script>
  </head>
  <body>
    <?php 
    include '../dbconnect.php';

    ?>
    <?php
    $sql="select * from user where regno=$regno";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    ?>
    <div class="container">
      <h1 class="form-title">Profile</h1>
      <form action="accountDetails.php" method="POST">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="regno">regno</label>
            <input type="text"
                    id="regno"
                    name="regno"
                      value="<?php echo $regno ?>" disabled class="form-control"/>
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="username"
                    value="<?php echo $row['name'] ?>" disabled class="form-control"/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="<?php echo $row['email'] ?>"/>
          </div>
          <div class="user-input-box">
            <label for="phoneno">Phone Number</label>
            <input type="text"
                    id="phoneno"
                    name="phoneno"
                    class="form-control"
                    value="<?php echo $row['phoneno'] ?>"/>
          </div>
          <div class="user-input-box">
            <label for="OldPassword">Old Password</label>
            <input type="password"
                    id="OldPassword"
                    name="OldPassword"
                    class="form-control"
                    value="<?php echo $row['password'] ?>"/>
          </div>
          <div class="user-input-box">
            <label for="password">New Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="enter New Password"/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Confirm Password"/>
          </div>

        </div>
        <div>
          <button type="button" class="button" onclick="goback()">Go Back</button></div>
        <div class="form-submit-btn">
        
          <input type="submit" name="submit" value="update">
        </div>
        <?php 
    include '../dbconnect.php';
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
     $regno= $_SESSION['regno'];
if(isset($_POST["submit"])){

$confirmPassword=$_POST['confirmPassword']; 
$email=$_POST['email'];
if(($_POST["password"])!=NULL){
  $password= $_POST['password'];
  if($password!=$confirmPassword){
    echo " <script type='text/javascript'> alert('password mismatch') </script> ";
  header("Refresh:0.01;url=accountDetails.php",true,303);
    }
    else{
      $phoneno=$_POST['phoneno'];
$query="update user set email='$email', password='$password', phoneno='$phoneno' where regno='$regno' ";
$result=mysqli_query($conn,$query);
if($result){
  echo " <script type='text/javascript'> alert('success') </script> ";
  header("Refresh:0.01;url=studentdashboard.php",true,303);
  }
}
}
else{
  $password=$_POST['OldPassword'];
  $phoneno=$_POST['phoneno'];
$query="update user set email='$email', password='$password', phoneno='$phoneno' where regno='$regno' ";
$result=mysqli_query($conn,$query);
if($result){
  echo " <script type='text/javascript'> alert('success') </script> ";
  header("Refresh:0.01;url=studentdashboard.php",true,303); 
}
}
}


?>
      </form>

    </div>
  </body>
</html>