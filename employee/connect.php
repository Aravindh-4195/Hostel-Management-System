<?php
   
   $errmsg="";
 if ($_SERVER['REQUEST_METHOD']=='POST'){

      session_start();
 $username = $_POST['username'];
 $password = $_POST['password'];
 require_once('dbConnect.php');
 $sql= "SELECT * FROM employee WHERE empid = '$username' AND password = '$password' ";
 $result = mysqli_query($conn,$sql);
 $check = mysqli_fetch_array($result);
 if(isset($check)){
       $_SESSION['empid'] = $username;
   header('Location:student\studentdashboard.php');

 }
  
}

 else{
 $errmsg="*Username or password is wrong";
 }
 

  ?>