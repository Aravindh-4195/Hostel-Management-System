<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="../images/logo.png">
     <script type="text/javascript">
      
       function back(){
         window.location.href ="../admin/employedit.php";
       }
      
     </script>
     <?php
        $errmsg="";
         $name="";
         $email="";
         $empid="";
          $phoneno="";

     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
     $conn= mysqli_connect('localhost','root','','hms') or die("Connection failed:" .mysqli_connect_error());
     if(isset($_POST['name']) && isset($_POST['empid']) && isset($_POST['email']) && isset($_POST['phoneno']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['gender']) ){

     $name=$_POST['name'];
     $email=$_POST['email'];
   $empid=$_POST['empid'];
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
   $sql="INSERT INTO `employee` (`name`,`empid`,`email`,`phoneno`,`password`,`gender`,`block`)VALUES ('$name','$empid','$email','$phoneno','$password','$gender','NULL')";
   $query=mysqli_query($conn,$sql);
   if($query){
   $errmsg= '*Entry successful';
 
   if( $gender=="male"){
      echo "<script type='text/javascript'>alert('Go For Block Selection by clicking OK')</script>";
      header("Refresh:0.01;url=../admin/employeeblockSelect.php?empid=$empid",true,303);
     
   }
   else if($gender=="female"){
    echo "<script type='text/javascript'>alert('Go For Block Selection by clicking OK')</script>";
    header("Refresh:0.01;url=../admin/employeeblockSelect.php?empid=$empid",true,303);
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
  <link rel="stylesheet" href="..\css\registration.css">
<body>
 


  <div class="container">
    <div class="title">ADD EMPLOYEE</div>
    <div class="content">
      <form action="addemployee.php"   method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input name="name" type="text" placeholder="Enter name" value="<?php echo "$name"; ?>" required pattern="[a-z A-Z]*">
          </div>
           <div class="input-box">
            <span class="details">Emp id</span>
            <input type="text" placeholder="Enter Empid with only 3 digits" name="empid" value="<?php echo "$empid"; ?>" pattern="[0-9]{3}" required>
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
        <div class="button">
          <input type="button" value="Go Back" onclick="back()"> 
          <input type="submit" value="Select Block" name="submit" style="margin-left:85px;">
        </div>
        <span style="color:red"><?php echo $errmsg; ?></span>
      </form>
    </div>
  </div>

</body>
</html>
