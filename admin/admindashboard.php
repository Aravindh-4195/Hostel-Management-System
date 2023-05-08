<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="..\admin\admindashboard.css">
	

<script type="text/javascript">
function studentsearch(){
  window.location.href ="manageStudents.php";
}
function blockdetails(){
  window.location.href ="blocks.php";
}
function employedit(){
  window.location.href="employedit.php";
}
function announcements(){
  window.location.href="announcementdash.php";
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
      <div class="card" onclick="blockdetails()">

            <div class="icon"><i class="material-icons md-36" >hotel</i></div>
            <p class="title">Manage Blocks </p>
            <p class="text">add room to block and add block</p>

      </div>
      <!-- end card -->

      <!-- card -->
      <div class="card" onclick="studentsearch()">

            <div class="icon"><i class="material-icons md-36">man</i></div>
            <p class="title">Manage Students</p>
            <p class="text">Search for a student .</p>

      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card" onclick="employedit()">

            <div class="icon"><i class="material-icons md-36">edit</i></div>
            <p class="title">Edit Employee</p>
            <p class="text">add or delete employee details</p>

      </div>
      <!-- end card -->
      
      <!-- card -->
      <div class="card" onclick="announcements()">

<div class="icon"><i class="material-icons md-36">speaker</i></div>
<p class="title">Announcements</p>
<p class="text">Give Announcements to Studets and Employees</p>

</div>
       <!-- end card -->



   </div>

</div>



  </body>
</html>
