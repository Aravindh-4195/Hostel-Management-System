<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="studentdashboard.css">
    <link rel="icon" href="../images/logo.png">
    <script type="text/javascript">
      function Outings(){
        window.location.href ="OutingsPage.php";
      }
      function roomdetails(){
        window.location.href ="studentroomdetails.php";

      }
      function accountdetails(){
        window.location.href ="accountdetails.php";

      }
      function feedback(){
        
        window.location.href="giveComplaints.php";
      }
      function Registration(){
        window.location.href="../blocks.php";
      }
    </script>
  </head>
  <body>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- about -->

<?php include '../header.php';?>


<!-- end about -->
<div class="wrapper">

   <div class="content">
      <!-- card -->
      
      <!-- end card -->
      <!-- card -->
      <div class="card" onclick="accountdetails()">

            <div class="icon"><i class="material-icons md-36">description</i></div>
            <p class="title">Account</p>
            <p class="text">To view and change Account details</p>

      </div>
      <!-- end card -->


      <!-- card -->
      <div class="card"  onclick="Outings()">

            <div class="icon"><i class="material-icons md-36">tour</i></div>
            <p class="title">Apply outings</p>
            <p class="text">Apply for local/non-local outing</p>

      </div>
      <!-- end card -->
      <div class="card"  onclick="Registration()">

            <div class="icon"><i class="material-icons md-36">book</i></div>
            <p class="title">Register Hostel</p>
            <p class="text">Register Hostel Room</p>

      </div>
      <!-- card -->
      <div class="card"  onclick="feedback()">

            <div class="icon"><i class="material-icons md-36">feedback</i></div>
            <p class="title">Give Complaints</p>
            <p class="text">Feedback to Hostel Office</p>

      </div>
        <!-- end card -->
   </div>

</div>



  </body>
</html>
