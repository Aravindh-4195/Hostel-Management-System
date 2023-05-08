<?php
$conn=mysqli_connect("localhost","root","","hms");
if($conn){
    echo "connection was succesful<br>";
}
else{
    die("connection was not successful" . mysqli_connect_error());
}
$sql="select * from user ";
$update=mysqli_query($conn,$sql);
$num=mysqli_num_rows($update);

if($num>0){
    while( $row=mysqli_fetch_assoc($update)){
    echo $row['regno']." my name is ".$row['name']." with email ".$row['email'];
    echo "<br>";
    
    }
}
$query="update user set regno=421217 where regno=9211530";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num>0){
    while( $row=mysqli_fetch_assoc($result)){
    echo $row['regno']." my name is ".$row['name']." with email ".$row['email'];
    echo "<br>";
    
    }
}
$query="update user set regno=421217 where regno=9211530";
?>