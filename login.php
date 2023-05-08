<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/logo.png">
    <!--<title>Login & Signup Form</title>-->
    <link rel="stylesheet" href="style.css" />
    <?php
   
   $errmsg="";
 if ($_SERVER['REQUEST_METHOD']=='POST'){

      session_start();
 $username = $_POST['username'];
 $password = $_POST['password'];
 require_once('dbConnect.php');
 $sql= "SELECT * FROM user WHERE regno = '$username' AND password = '$password' ";
 $result = mysqli_query($conn,$sql);
 $check = mysqli_fetch_array($result);
 if(isset($check)){
       $_SESSION['regno'] = $username;
   header('Location:student\studentdashboard.php');

 }
 else{
  echo "<script type='text/javascript'>alert ('username and password not matched (or) username is invalid');</script>";
  header("Refresh:0.01;url=login.php",true,303);
  }
  
}

 

  ?>
  

   
  </head>
  <body>
    <section class="wrapper">
      <div class="form signup">
        <header>Student login</header>
        <form action="login.php" method="post">
          <input type="text" placeholder="Student id " required name="username"/>
      
          <input type="password" placeholder="Password" required name="password" />
          <a href="index.php">Home</a>
          <a href="#">Forgot password?</a>
          
          <input type="submit" value="login" />
        </form>
      </div>

      <div class="form login">
        <header>Employee Login</header>
        <form action="employee/con.php" method="post">
          <input type="text" placeholder="Employee id" required name="username" />
          <input type="password" placeholder="Password" required name="password"/>
          <a href="index.php">Home</a>
          <a href="#">Forgot password?</a>
          
          <input type="submit" value="Login" />
        </form>
      </div>

      <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
    </section>
  </body>
</html>

