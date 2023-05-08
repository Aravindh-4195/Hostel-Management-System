<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="../images/logo.png">
     <script type="text/javascript">
          function back(){
         window.location.href ="announcementdash.php";
       }
     </script>
     <?php
        $errmsg="";
        

     if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["submit"])){
     $conn= mysqli_connect('localhost','root','','hms') or die("Connection failed:" .mysqli_connect_error());
    
     if($_POST['lastDate']!=NULL && $_POST['title']!=NULL && $_POST['freeform']!=NULL){
      
    $title=$_POST['title'];
     $freeform=$_POST['freeform'];
     $lastDate=$_POST['lastDate'];
     $file = $_FILES['file']['name'];
   $sql="INSERT INTO `announcement` (`title`,`Announcement`,`lastDate`,`attachment`)VALUES ('$title','$freeform','$lastDate','$file')";
   $query=mysqli_query($conn,$sql);
   if($query){
    $img_upload_path = 'uploads/'.$file;
   move_uploaded_file($_FILES['file']['tmp_name'],"$img_upload_path");
      
   echo "<script type='text/javascript'>alert('announcement given succucessfully')</script>";
   header("Refresh:0.01;url=announcementdash.php",true,303);
}
  
   
   else{
    echo "error occcured";
   }
  }
  
    
     
     else{
       
      echo "<script type='text/javascript'>alert('all fields should be filled')</script>";
      header("Refresh:0.01;url=addannouncement.php",true,303);

      }
    }



      ?>
   </head>
  <link rel="stylesheet" href="..\css\addAnnouncements.css">
  
<body>

<?php       session_start(); ?>


  <div class="container">
    <div class="title">New Announcement</div>
    <div class="content">
      <form action="addannouncement.php"   method="post" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Date</span>
            <script>
                var date= new Date();
                document. write(date);
            </script>
          </div>
          <div class="input-box">
            <span class="details">Last Date</span>
            <input name="lastDate" type="text" placeholder="Enter Last date in year-month-day format(2002-02-13)">
          </div>
          <div class="input-box">
            <span class="details">Announcement Title</span>
            <input type="text" name="title" placeholder="Enter the Annoucement Title">
          </div>
         
          <label for="freeform">Detailed Announcement::</label>
                <br>

       <textarea class="freeform" name="freeform" rows="4" cols="50" placeholder="Enter The Announcement Here" ></textarea>
        </div>
        <div>
          <input type="file" name="file" ></div>
        
        
        
        <div class="button">
        <input type="button" value="Go Back" onclick="back()">
          <input type="submit" value="Announce" name="submit" style="margin-left:85px;">
        </div>
        <span style="color:red"><?php echo $errmsg; ?></span>
     
    
    
    </div>
  </div>

</body>
</html>
