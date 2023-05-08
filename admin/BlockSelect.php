
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pricing</title>
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="..\css\block1.css">

    
  </head>

  <body>
      <?php
      include "../dbconnect.php";
      $sql="select * from block";
      $result=mysqli_query($conn,$sql);
      if($result){
        while($rows=mysqli_fetch_assoc($result))
       {
       ?>
       
      <div class="columns">
<ul class="price">
<li class="header"><?php echo $rows['blockName']?></li>
<div class="imagewrapper">
<img style="height:150px; width:200px;" src="uploads/<?php echo $rows['image']?>" alt="">
</div>
<li><?php echo $rows['seater']," SEATER"?></li>
<li><?php echo $rows['year']," BTECH"?></li>
<li><?php echo $rows['gender']?></li>
<li class="grey"><a href="ediBlock.php?id=<?php echo $rows['blockno'] ?>"class="button">Select</a></li>

</ul>
</div>
<?php
}
      }
    ?>

</ul>
</div>


  </body>
</html>
