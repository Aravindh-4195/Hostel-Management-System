<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="../images/logo.png">
     <script type="text/javascript">
       
       function back(){
         window.location.href ="studentdashboard.php";
       }
     </script>
     <?php
        $errmsg="";
       if(isset($_GET['id'])){
        $regno= $_GET['id'];

     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
     $conn= mysqli_connect('localhost','root','','hms') or die("Connection failed:" .mysqli_connect_error());
     if($_POST['regarding']!=NULL && $_POST['freeform']!=NULL && $_POST['complaintTo']!=NULL){
     
     $complaintTo=$_POST['complaintTo'];
     $freeform=$_POST['freeform'];
     $regarding=$_POST['regarding'];
     
     $connect=mysqli_query($conn,"select block from user where regno='$regno'");
     $row=mysqli_fetch_assoc($connect); 
     $blockno=$row['block'];
   $sql="INSERT INTO `complaint` (`regarding`,`detail`,`complaintFrom`,`complaintTo`,`blockno`)VALUES ('$regarding','$freeform','$regno','$complaintTo','$blockno')";
   $query=mysqli_query($conn,$sql);
   if($query){
   echo "<script type='text/javascript'>alert('complaint given succussfully')</script>";
   header("Refresh:0.01;url=studentdashboard.php",true,303);
}
   else{
    echo "error occcured";
   }
  }
     else{
       
      echo "<script type='text/javascript'>alert('all fields should be filled')</script>";
      header("Refresh:0.01;url=giveComplaints.php",true,303);

      }
    }}
      ?>
   </head>
  <link rel="stylesheet" href="..\css\giveCompliants.css">
<body>
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
     $regno= $_SESSION['regno'];
     ?>
  


  <div class="container">
    <div class="title">Compliant</div>
    <div class="content">
      <form action="giveComplaints.php?id=<?php echo $regno?>"   method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">COMPLAINT FROM</span>
            <input type="text" name="complaintFrom" disabled class="form-control" value="<?php echo $regno?>">
          </div>
          
          <div class="input-box">
            <span class="details">COMPLAINT REGARDING</span>
            <input name="regarding" type="text" placeholder="Enter the Complaint Regarding">
          </div>
          
         
          <label for="freeform"><b>DETAILS ABOUT COMPLAINT</b></label>
                <br>

       <textarea class="freeform" name="freeform" rows="4" cols="50" placeholder="Enter the Details About Complaint" ></textarea>
       <div class="gender-details">
          <input type="radio" name="complaintTo" id="dot-1" value="admin">
          <input type="radio" name="complaintTo" id="dot-2" value="caretaker">
          <span class="gender-title">COMPLAINT TO</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="complaintTo">ADMIN</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="complaintTo">CARE TAKER</span>
          </label>

          </div>
        
        
        
        <div class="button">
        <input type="button" value="Go Back" onclick="back()">
          <input type="submit" value="submit" name="submit" style="margin-left:85px;">
        </div>
        
      </form>
      
    </div>
  </div>

</body>
</html>
