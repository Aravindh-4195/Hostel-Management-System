<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="..\admin\employedit.css">
	

<script type="text/javascript">
function addEmployee(){
  window.location.href ="../employee/addemployee.php";
}
function remove(){
  window.location.href ="RemoveEmployee.php";
}
function viewEmployee(){
  window.location.href="searchEmployee.php";
}
 
</script>
<link rel="icon" href="../images/logo.png">
  </head>
  <body>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- about -->
<?php include 'header.php';?>

<!-- end about -->
<div class="wrapper">

   <div class="content">
      <!-- card -->
      <div class="card" onclick="remove()">

            <div class="icon"><i class="material-icons md-36" >search</i></div>
            <p class="title">Remove Employee</p>
            <p class="text">Remove an Employee
            </p>

      </div>
      <!-- end card -->

      <!-- card -->
      <div class="card" onclick="addEmployee()">

            <div class="icon"><i class="material-icons md-36">add</i></div>
            <p class="title">Add Employee</p>
            <p class="text">Add an Employee</p>

      </div>
      <!-- end card -->

     
      
      <!-- card -->
      <div class="card" onclick="viewEmployee()">

            <div class="icon"><i class="material-icons md-36">search</i></div>
            <p class="title">Search Employee</p>
            <p class="text">Search Employess listed</p>

      </div>
       <!-- end card -->



   </div>

</div>



  </body>
</html>
