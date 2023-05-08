<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="../images/logo.png">
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script type="text/javascript">
       function back(){
         window.location.href ="studentdashboard";
       }
       function register(){
         window.location.href ="login.php";
       }
     </script>
     <?php
     include "../dbconnect.php";
     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
 
     if(isset($_POST['name']) && isset($_POST['regno']) && isset($_POST['email']) && isset($_POST['phoneno']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['gender']) ){

     $name=$_POST['name'];
     $email=$_POST['email'];
     $regno=$_POST['regno'];
     $phoneno=$_POST['phoneno'];
     $password=$_POST['password'];
     $confirmpassword=$_POST['confirmpassword'];
     $gender=$_POST['gender'];
     $passwordregex="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/";


   $nameregex="/^[a-z A-Z]*$/";
   if(!preg_match($nameregex, $name)){
       $errmsg="*Password should be in correct format";
   }
     else if($password!=$confirmpassword){
     $errmsg="*Password and confirm password are not same";
     }
     elseif (!preg_match($passwordregex, $password)) {
         $errmsg="*Password must contain Minimum eight and maximum 16 characters, at least one uppercase letter, one lowercase letter, one number and one special character";
     }
     else{
     session_start();
   $sql="INSERT INTO `user` (`name`,`regno`,`email`,`phoneno`,`password`,`gender`,`block`)VALUES ('$name','$regno','$email','$phoneno','$password','$gender','NULL')";
   $query=mysqli_query($conn,$sql);
   if($query){
   $errmsg= '*Entry successful';
   $_SESSION['regno'] = $regno;
   if( $gender=="male"){
    echo "<script type='text/javascript'>alert('Signup successful')</script>";
    header("Refresh:0.01;url=login.php",true,303);
   }
   else if($gender=="female"){
    echo "<script type='text/javascript'>alert('Signup successful')</script>";
    header("Refresh:0.01;url=login.php",true,303);
   }
   }
   else{
   $errmsg= "*Error occoured";
   }

    }
     }
     else{
       $errmsg="*All fields are required";


      }
     }



      ?>
   </head>
  <link rel="stylesheet" href="..\css\applyOutings.css">
<body>
  <?php       session_start(); ?>

  <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
     $regno= $_SESSION['regno'];
     ?>
  <div class="container">
    <div class="title">Apply Outings</div>
    <div class="content">
      <form action="applyOutings.php"   method="post">
        <div class="user-details">
          

        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <span class="gender-title">Outing Type</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Local</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Non-Local</span>
          </label>

          </div>
        </div>
        <div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="Apply" name="submit" style="margin-left:85px;">
        </div>
        <span style="color:red"><?php echo $errmsg; ?></span>
      </form>
    </div>
  </div>

</body>
</html>
