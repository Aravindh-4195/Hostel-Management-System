<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="../images/logo.png">
    <meta charset="utf-8">
    <title></title>
	<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
<?php include('../dbConnect.php');?>
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	 font-family: helvetica;
}

.table-section{
  height:500px;
  overflow:auto;
}

.wrapper{
  margin-top: 85px;
	/* min-height: 100vh; */
	display: flex;
	justify-content: center;
	/* align-items: center; */
}

.search_box{
	background: #643fef;
	/* position: relative; */
  height: 80px;
	padding: 15px;
	border-radius: 10px;
	display: flex;
}

.search_box .search_btn .btn{
	width: 60px;
	height: 50px;
	border-radius: 10%;
	background: #7a5cf0;
	display: flex;
	justify-content: center;
	align-items: center;
	color: #fff;
	margin-left: 15px;
	cursor: pointer;
}

.search_box .input_search {
	outline: none;
	border: 0;
	background: #7a5cf0;
	border-radius: 10px;
	padding: 15px 20px;
	width: 300px;
	height: 50px;
	color: #fff;

}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

::placeholder {
  color: #fff;
}

::-webkit-input-placeholder {
  color: #fff;
}

:-ms-input-placeholder {
  color: #fff;
}

/* *{
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: "Encode Sans Expanded",sans-serif;
} */
table {
width: 750px;
border-collapse: inherit;
border-radius:100px;
margin:50px auto;
}

/* Zebra striping */
tr:nth-of-type(odd) {
background: #8dd4c0;
}
tr:nth-of-type(even) {
background: #924fc5ad;
}
th {
background: #3498db;
color: white;
font-weight: bold;
}

td, th {
padding: 10px;
border: 1px solid #ffcd02;
text-align: left;
font-size: 18px;
}
.approvebtn{
  border-radius: 50px;
  background: #01bf71;
  whitespace: nowrap;
  padding: 10px 22px;
  color: #010606;
  font-size: 16px; */
   outline: none;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
  text-decoration: none;

}
/*
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

table {
    width: 100%;
}

/* Force table to not be like tables anymore */
table, thead, tbody, th, td, tr {
  display: block;
}

/* Hide table headers (but not display: none;, for accessibility) */
thead tr {
  position: absolute;
  top: -9999px;
  left: -9999px;
}

tr { border: 1px solid #ccc; }

td {
  /* Behave  like a "row" */
  border: none;
  border-bottom: 1px solid #eee;
  position: relative;
  padding-left: 50%;
}

td:before {
  /* Now like a table header */
  position: absolute;
  /* Top/left values mimic padding */
  top: 6px;
  left: 6px;
  width: 45%;
  padding-right: 10px;
  white-space: nowrap;
  /* Label the data */
  content: attr(data-column);

  color: #000;
  font-weight: bold;
}


}

/* .btn{
  background: #7A5CF0;
} */


</style><?php
include_once '../dbconnect.php';
if(isset($_GET['id'])){
    $empid=$_GET['id'];
    $connect=mysqli_query($conn,"delete from employee where empid='$empid'");
    if($connect){
        echo " <script type='text/javascript'> alert('Employee Removed Successfully') </script> ";
            header("Refresh:0.01;url=employedit.php",true,303); 
    }
}
?>
<script type="text/javascript">
       function back(){
         window.location.href ="employedit.php";
       }
       
     </script>
  </head>
  <body>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<form class="" action="RemoveEmployee.php" method="post">
<div class="wrapper">
	<div class="search_box">
		<input type="text" name="empid" id="empid" class="input_search" placeholder="Enter Employee ID" pattern="[0-9]{3}">
    <div class="search_btn"><input class="btn"  type="submit" name="submit1" value="find"> </div>
    <div class="search_btn"><input class="btn"  type="submit" name="submit" value="alldetails"> </div>
    <div class="search_btn"><input class="btn"  type="button" value="Back" onclick="back()"> </div>
<!--
    <i type="submit" name="submit" class="fas fa-search"></i> -->
  </div>
</div>
</form>
<div class="table-section">
<table>
<thead>
  <!-- <tr>
    <th style="text-align: center;" colspan="6">Male</th>
  </tr> -->
  <tr>
    <th>Empid</th>
    <th>Name</th>
    <th>Phone no</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Block</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST["submit"])){
  $sql="SELECT * from employee";
  $query=mysqli_query($conn,$sql);
  while($rows=mysqli_fetch_assoc($query))
  {
  ?>
  <tr> <td><?php echo $rows['empid']; ?></td>
  <td><?php echo $rows['name']; ?></td>
  <td><?php echo $rows['phoneno']; ?></td>
  <td><?php echo $rows['email']; ?></td>
  <td><?php echo $rows['gender']; ?></td>
    <td><?php echo $rows['block']; ?></td>
    <td><a href="RemoveEmployee.php?id=<?php echo $rows['empid']?>">Delete</a></td>
     
  </tr>
  <?php
  }
}
  ?>
    <?php
  if(isset($_POST["submit1"])){
   
    if(($_POST['empid'])!=NULL){
      
    $empid= $_POST['empid'];
   
 
  $sql="SELECT * from employee where empid=$empid";
  $result=mysqli_query($conn,$sql);
  if($result){
   while($rows=mysqli_fetch_assoc($result))
  {
  ?>
  <tr> <td><?php echo $rows['empid']; ?></td>
  <td><?php echo $rows['name']; ?></td>
  <td><?php echo $rows['phoneno']; ?></td>
  <td><?php echo $rows['email']; ?></td>
  <td><?php echo $rows['gender']; ?></td>
    <td><?php echo $rows['block']; ?></td>
    <td><a href="RemoveEmployee.php?id=<?php echo $rows['empid']?>">Delete</a></td>
      
  </tr>
  <?php
             }
            }
           
          }
          else{
            echo " <script type='text/javascript'> alert('Employee id  is empty') </script> ";
            header("Refresh:0.01;url=RemoveEmployee.php",true,303); 
          }
        }
      }
            
        ?>
</tbody>
</table>
    </div>

  </body>
</html>