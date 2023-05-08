<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="announcementdash.css">
	
    <link rel="icon" href="../images/logo.png">
<script type="text/javascript">
   
function addannouncement(){
  window.location.href ="addannouncement.php";
}
function viewannouncemet(){
  window.location.href ="viewannoucement.php";
}

 
</script>
  </head>
  <body>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- about -->
<?php include 'header.php';?>

<!-- end about -->
<div class="wrapper">

   <div class="content">
      <!-- card -->

      <!-- end card -->
      <!-- card -->
      <div class="card" onclick="addannouncement()">

            <div class="icon"><i class="material-icons md-36">add</i></div>
            <p class="title">New announcement</p>
            <p class="text">add a new Announcement</p>

      </div>
      <!-- end card -->
      
      <!-- card -->
      <div class="card" onclick="viewannouncemet()">

<div class="icon"><i class="material-icons md-36">speaker</i></div>
<p class="title">View Announcements</p>
<p class="text">Admin can able to view announcements</p>

</div>
       <!-- end card -->



   </div>

</div>



  </body>
</html>
