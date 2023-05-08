<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="..\css\manageStudents.css">
    <link rel="icon" href="../images/logo.png">

<script type="text/javascript">
function studentSearch(){
  window.location.href ="studentSearch.php";
}
function roomdetails(){
  window.location.href ="roomdetails.php";
}
function employedit(){
  window.location.href="employedit.php";
}
function complaints(){
  window.location.href="viewcomplaint.php";
}
 function LocalOutings(){
  window.location.href="viewLocalOutings.php";
 }
 function NonLocalOutings(){
  window.location.href="viewNLocalOutings.php";
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
      <div class="card" onclick="studentSearch()">

            <div class="icon"><i class="material-icons md-36" >search</i></div>
            <p class="title">Search Students</p>
            <p class="text">Search for students or remove a student</p>

      </div>
      <!-- end card -->

      <!-- card -->
      <div class="card" onclick="complaints()">

            <div class="icon"><i class="material-icons md-36">feedback</i></div>
            <p class="title">complaints</p>
            <p class="text">complaint by the students</p>

      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card" onclick="NonLocalOutings()">

            <div class="icon"><i class="material-icons md-36">house</i></div>
            <p class="title">Non Local Outings</p>
            <p class="text">Non Local Outings of the students</p>

      </div>
      <!-- end card -->
      
      <!-- card -->
      <div class="card" onclick="LocalOutings()">

<div class="icon"><i class="material-icons md-36">man</i></div>
<p class="title">local outings</p>
<p class="text">local outings of the students</p>

</div>
       <!-- end card -->



   </div>

</div>



  </body>
</html>
