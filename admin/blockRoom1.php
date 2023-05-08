
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
        $floor=$_POST['floor'];
        if($floor!="--select floor--"){
            header('location:blockRoom3.php?blockno='.$blockno.'&floor='.$floor.'');

        }
        else{
          echo "<script type='text/javascript'>alert('no floor is selected')</script>";
    header("Refresh:0.01;url=blockRoom2.php",true,303);
        }
      }
        ?>
   </head>
  <link rel="stylesheet" href="..\css\blockRoom.css">
<body>



  <div class="container">
    <div class="title">Blook Room</div>
    <b><h7 color=red;>Enter block No and Room No that to be changed</h7></b>
    <div class="content">
      <form action="blockRoom1.php"   method="post">
        <div class="user-details">
          <div class="choice">
          <?php
            
           
             $blockno=$_GET['id'];
            
            include("../dbconnect.php");
            $block=mysqli_query($conn,"select distinct(floor) from room where blockno='$blockno'");
            ?>
             <div>BLOCK</div>
              <select name="blockno" class="drop">
                  
                  <option value="<?php echo $blockno?>"><?php echo $blockno?></option>
                  </select>
                  <div>FLOOR</div>
              <select name="floor" class="drop">
                  <option value="--select floor--">--select floor--</option>
              <?php
              while($row=mysqli_fetch_assoc($block))
              {
                ?>
                
                 
                  <option value="<?php echo $row['floor']?>"><?php echo $row['floor']?></option>
                 
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
