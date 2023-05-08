
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
     <?php 
     if(isset($_POST["submit"])){
        $blockno=$_POST['blockno'];
        if($blockno!="--select--"){
          header('location:blockRoom1.php?id='.$blockno.'');
        }
        else{
          echo "<script type='text/javascript'>alert('no block is selected')</script>";
    header("Refresh:0.01;url=blockRoom.php",true,303);
        }
      }
        ?>
   </head>
  <link rel="stylesheet" href="..\css\blockRoom.css">
<body>
<?php
            include("../dbconnect.php");
            $block=mysqli_query($conn,"select distinct(blockno) from room");
           
 ?>


  <div class="container">
    <div class="title">Blook Room</div>
    <b><h7 color=red;>Enter block No and Room No that to be changed</h7></b>
    <div class="content">
      <form action="blockRoom.php"   method="post">
        <div class="user-details">
          <div class="choice">
          <div>BLOCK</div>
          <select name="blockno" class="drop">
          <option value="--select--">--select--</option>
              <?php
              
              while($row=mysqli_fetch_assoc($block))
              {
                ?>
                
              
                  
                  <option value="<?php echo $row['blockno']?>"><?php echo $row['blockno']?></option>
                 
        <?php
      }
      ?>
       </select>
        </div>

      <div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="select" name="submit" style="margin-left:85px;">
        </div>
        </div> 
      </form>
    
    

    </div>
  </div>

</body>
</html>
