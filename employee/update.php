<?php 
    include '../dbconnect.php';
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
     $regno= $_SESSION['empid'];
if(isset($_POST["submit"])){
if( isset($_POST['email']) || (isset($_POST['password']) && isset($_POST['confirmpassword']) )){
     echo "$regno"; 
   
$email=$_POST['email'];
  if($password!=$confirmpassword){
  $errmsg="*Password and confirm password are not same";
  }
else if(!isset($_post['password'])){
    $password=$_POST['OldPassword'];   
}
else{
    $password=$_POST['password'];
}
$phoneno=$_POST['phoneno'];
$query="update employee set email='$email', password='$password', phoneno='$phoneno' where empid='$regno' ";
$result=mysqli_query($conn,$query);
if($result){
    header('Location: employeedashboard.php');
}

}
}
?>