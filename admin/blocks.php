<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="..\css\Blockdashboard.css">
	

<script type="text/javascript">
function addroom(){
  window.location.href ="BlockRooms.php";
}
function blockRoom(){
  window.location.href ="blockRoom.php";
}
function addblock(){
  window.location.href="addblock.php";
}
function edit(){
  window.location.href="BlockSelect.php";
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
      <div class="card" onclick="addroom()">

            <div class="icon"><i class="material-icons md-36" >add</i></div>
            <p class="title">add room</p>
            <p class="text">add rooms to the blocks</p>

      </div>
      <!-- end card -->

      <!-- card -->
      <div class="card" onclick="blockRoom()">

            <div class="icon"><i class="material-icons md-36">block</i></div>
            <p class="title">block room</p>
            <p class="text">block rooms if it is not used for registration</p>

      </div>
      <!-- end card -->
      <!-- card -->
      <div class="card" onclick="addblock()">

            <div class="icon"><i class="material-icons md-36">add</i></div>
            <p class="title">add block</p>
            <p class="text">add a new block</p>

      </div>
      <!-- end card -->
      
      <!-- card -->
      <div class="card" onclick="edit()">

<div class="icon"><i class="material-icons md-36">edit</i></div>
<p class="title">edit Block</p>
<p class="text">edit block details</p>

</div>
       <!-- end card -->



   </div>

</div>



  </body>
</html>
