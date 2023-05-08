<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="../images/logo.png">
     <script type="text/javascript">
       
       function back(){
         window.location.href ="admin/admindashboard.php";
       }
       function register(){
         window.location.href ="login.php";
       }
     </script>
     <?php
        $errmsg="";
        

     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
     $conn= mysqli_connect('localhost','root','','hms') or die("Connection failed:" .mysqli_connect_error());
     if(isset($_POST['date']) && isset($_POST['title']) && isset($_POST['freeform']) ){
        
     $date=$_POST['date'];
     $title=$_POST['title'];
     $freeform=$_POST['freeform'];
     
   $sql="INSERT INTO `announcement` (`AnnounceDate`,`title`,`Announcement`)VALUES ('$date','$title','$freeform')";
   $query=mysqli_query($conn,$sql);
   if($query){
   echo "<script type='text/javascript'>alert('announcement given succucessfully')</script>";
   header("Refresh:0.01;url=employee/employeedashboard.php",true,303);
}
  
   }
   else{
   $errmsg= "*Error occoured";
   }

    }
     
     else{
       $errmsg="*All fields are required";


      }
     



      ?>
   </head>
  <link rel="stylesheet" href="css\announcements.css">
<body>
<?php       session_start(); ?>
  


  <div class="container">
    <div class="title">New Announcement</div>
    <div class="content">
      <form action="announcement.php"   method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Date</span>
            <input name="date" type="text" placeholder="Enter date">
          </div>
          <div class="input-box">
            <span class="details">Announcement Title</span>
            <input type="text" name="title" placeholder="Enter the Annoucement Title">
          </div>
         
          <label for="freeform">Detailed Announcement::</label>
                <br>

       <textarea class="freeform" name="freeform" rows="4" cols="50" placeholder="Enter The Announcement Here" ></textarea>
        </div>
        
        
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
