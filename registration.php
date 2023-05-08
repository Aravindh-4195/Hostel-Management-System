<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="images/logo.png">
     <script type="text/javascript">
       function back(){
         window.location.href ="index.php";
       }
       function register(){
         window.location.href ="login.php";
       }
     </script>
     <?php
        $errmsg="";
         $name="";
         $email="";
         $regno="";
          $phoneno="";

     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
     include 'dbconnect.php';
     if(isset($_POST['Name']) && isset($_POST['regno']) && isset($_POST['email']) && isset($_POST['phoneno']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['gender']) && $_FILES['image']!=NULL  ){
      $file=$_FILES['image']['name'];
     $name=$_POST['Name'];
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
   $sql="INSERT INTO `user` (`name`,`regno`,`email`,`phoneno`,`password`,`gender`,`block`,`image`)VALUES ('$name','$regno','$email','$phoneno','$password','$gender','NULL','$file')";
   $query=mysqli_query($conn,$sql);
   if($query){
    $img_upload_path = 'admin/uploads/'.$file;
    move_uploaded_file($_FILES['image']['tmp_name'],"$img_upload_path");
    echo "<script type='text/javascript'>alert('Signup successful')</script>";
    header("Refresh:0.01;url=login.php",true,303);
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
  <link rel="stylesheet" href="css\Registration2.css">
<body>
  <?php       session_start(); ?>


  <div class="container">
    <div class="title">Student Registration</div>
    <div class="content">
      <form action="registration.php"   method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input name="Name" type="text" placeholder="Enter your name in CAPS" value="<?php echo "$name"; ?>" required pattern="[ A-Z]*">
          </div>
          <div class="input-box">
            <span class="details">Reg No</span>
            <input type="text" placeholder="Enter your regno" name="regno" value="<?php echo "$regno"; ?>" pattern="[0-9]{7}" required>
          </div>
          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" value="<?php echo "$email"; ?>" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" name="phoneno" value="<?php echo "$phoneno"; ?>" pattern="[0-9]{10}" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" name="confirmpassword" required>
          </div>

        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>

          </div>
        </div>
        <input type="file" name="image">
     
        <div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="Register" name="submit" style="margin-left:85px;">
        </div>
        <span style="color:red"><?php echo $errmsg; ?></span>
      </form>
    </div>
  </div>

</body>
</html>
