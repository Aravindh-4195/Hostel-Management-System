<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin login</title>
    <link rel="stylesheet" href="..\css\signIN.css">
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <?php
$errmsg="";
    if ($_SERVER['REQUEST_METHOD']=='POST'){
         session_start();
    $employeeid = $_POST['employeeid'];
    $password = $_POST['password'];
    require_once('../dbConnect.php');
    $sql= "SELECT * FROM admin WHERE employeeid = '$employeeid' AND password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($result);
    if(isset($check)){
          $_SESSION['employeeid'] = $employeeid;
      header('Location: admindashboard.php');

    }

    else{
    $errmsg="*Username or password is wrong";
    }
    }


     ?>
  </head>
  <body>

    <div class="center">
      <h1>Admin Login</h1>
      <form action="adminlogin.php" method="post">
        <div class="txt_field">
          <input id="employeeid" name="employeeid" type="text" required>
          <span></span>
          <label><b>Admin ID</b></label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" name="password" required/>
          <span class="eye" onclick="Myfunction()"><i id="hide1" class="fa fa-eye" aria-hidden="true"></i>
          <i id="hide2" class="fa fa-eye-slash" aria-hidden="true"></i>
        </span>
          <label><b>Password</b></label>
          <div>
    </div>
    <div>
  </div>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="submit" id="submit" value="submit">
        <div class="signup_link">
          Forgot? <a href="..\#contact">Contact</a>
        </div>
      </form>
        <span style="color:red;margin-left: 15px;"><?php echo "$errmsg"; ?></span>
    </div>
    <script>
          function Myfunction(){
            var x=document.getElementById("password");
            var y=document.getElementById("hide1");
            var z=document.getElementById("hide2");
            if(x.type ==='password'){
                x.type="text";
                y.style.display="block";
                z.style.display="none";
          }
          else{
            x.type="password";
            y.style.display="none";
            z.style.display="block";
          }
        }
        </script>

  </body>
</html>
