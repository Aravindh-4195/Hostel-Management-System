<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="..\admin\admindashboard.css">
    <link rel="icon" href="../images/logo.png">

<script type="text/javascript">
function studentsearch(){
  window.location.href ="manageStudents.php";
}
function accountedit(){
  window.location.href ="accountDetails.php";
}
function employedit(){
  window.location.href="employedit.php";
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
      <div class="card" onclick="studentsearch()">

            <div class="icon"><i class="material-icons md-36">search</i></div>
            <p class="title">Manage Students</p>
            <p class="text">Search for a student .</p>

      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card" onclick="accountedit()">

            <div class="icon"><i class="material-icons md-36">edit</i></div>
            <p class="title">Edit Account</p>
            <p class="text">To change account details</p>

      </div>
      <!-- end card -->
      
      <!-- card -->
     
       <!-- end card -->



   </div>

</div>



  </body>
</html>
