<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script type="text/javascript">
       <link rel="icon" href="../images/logo.png">
       function back(){
         window.location.href ="blocks.php";
       }
       function register(){
         window.location.href ="blocks.php";
       }
     </script>


   </head>
  <link rel="stylesheet" href="..\css\Registration.css">
<body>
  <?php 
   include '../dbconnect.php';
   if(isset($_GET['id'])){
    $blockno=$_GET['id'];
   }
    
 
  $sql="select * from block ";
  $query=mysqli_query($conn,$sql);
  if($query){
    $rows=mysqli_fetch_assoc($query);
  }
  ?>


  <div class="container">
    <div class="title">Add Block</div>
    <div class="content">
      <form action="ediBlock.php"   method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Block Name</span>
            <input name="blockName" type="text" value="<?php echo $blockno?>" disabled class="form-control" required pattern="[a-z A-Z]*">
</div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
        </div>
        <div class="gender-details">
          <input type="radio" name="year" id="dot-5" value="I">
          <input type="radio" name="year" id="dot-6" value="II">
          <input type="radio" name="year" id="dot-7" value="III">
          <input type="radio" name="year" id="dot-8" value="IV">
          <span class="gender-title">year</span>
          <div class="category">
            <label for="dot-5">
            <span class="dot five"></span>
            <span class="year">I</span>
          </label>
          <label for="dot-6">
            <span class="dot six"></span>
            <span class="year">II</span>
          </label>
          <label for="dot-7">
            <span class="dot seven"></span>
            <span class="year">III</span>
          </label>
          <label for="dot-8">
            <span class="dot eight"></span>
            <span class="year">IV</span>
          </label>
        </div>
        <div class="gender-details">
          <input type="radio" name="seater" id="dot-9" value="1">
          <input type="radio" name="seater" id="dot-10" value="2">
          <input type="radio" name="seater" id="dot-11" value="4">
          <span class="gender-title">Seater</span>
          <div class="category">
            <label for="dot-9">
            <span class="dot nine"></span>
            <span class="seater">1</span>
          </label>
          <label for="dot-10">
            <span class="dot ten"></span>
            <span class="seater">2</span>
          </label>
          <label for="dot-11">
            <span class="dot eleven"></span>
            <span class="seater">4</span>
          </label>
        </div>
        <div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="Update" name="submit" style="margin-left:85px;">
        </div>
        
      </form>
    </div>
  </div>

</body>
</html>
