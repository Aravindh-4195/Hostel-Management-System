
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
       
     </script>
    
   </head>
  <link rel="stylesheet" href="..\css\Registration.css">
<body>
  <?php       session_start(); ?>


  <div class="container">
    <div class="title">Edit Room</div>
    <div class="content">
      <form action="blockRoom.php"   method="post">
        <div class="user-details">
          <b><h7 color=red;>Enter block No and Room No that to be changed</h7></b>
          <div class="input-box">
            <span class="details">Block No</span>
            <input name="blockNo" type="text" placeholder="Enter Block Number"  required pattern="[1-9]*">
</div>
<div class="input-box">
            <span class="details">Room No</span>
            <input name="RoomNo" type="text" placeholder="Enter Room Number"  required pattern="[A-Z][0-9][0-9]">
</div>

<div class="button">
          <input type="submit" value="Go Back" onclick="back()">
          <input type="submit" value="Choose" name="submit" style="margin-left:85px;">
        </div>
       
        
      </form>
    
    

    </div>
  </div>

</body>
</html>
