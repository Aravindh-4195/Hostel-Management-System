<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Hostel Management System</title>
    <link rel="stylesheet" href="css\Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="images/logo.png">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Expanded:wght@400;700&display=swap" rel="stylesheet">

  </head>
  <body onscroll="changecolor()">

    <script type="text/javascript">
    function rtohome(){
      window.location.href ="index.php";
    }
    function change(){
      window.location.href ="registration.php";
    }
    function login(){
      window.location.href="login.php";
    }
    window.onscroll=function(){
      var top=window.scrollY;
      if(top>=50){
        document.getElementById("Nav1").style.backgroundColor = "white";
        document.getElementById("linkcolor").style.color = "black";
        document.getElementById("linkcolor1").style.color = "black";
        document.getElementById("linkcolor2").style.color = "black";
        document.getElementById("linkcolor3").style.color = "black";
        document.getElementById("linkcolor4").style.color = "black";
      }
      else{
        document.getElementById("Nav1").style.backgroundColor = "transparent";
        document.getElementById("linkcolor").style.color = "white";
        document.getElementById("linkcolor1").style.color = "white";
        document.getElementById("linkcolor2").style.color = "white";
        document.getElementById("linkcolor3").style.color = "white";
        document.getElementById("linkcolor4").style.color = "white";
      }
    }

    </script>


<div class="Nav" id="Nav1">
  <div class="NavbarContainer">
    <img src="images\Nit-logo.png" alt="" class="NavLogo" onclick="rtohome()">
    
    <div class="MobileIcon">
    <i class="fa fa-bars"></i>
    </div>
  
    <ol class="NavMenu ">
      <li class="NavItem"><a id="linkcolor" on class="NavLinks" href="#about">About</a></li>
      <li class="NavItem"><a id="linkcolor1" on class="NavLinks" href="facilities.php">Facilities</a></li>
      <li class="NavItem"><a id="linkcolor3" class="NavLinks" href="viewannouncements.php">Announcements</a></li>
      <li class="NavItem"><a id="linkcolor2" class="NavLinks" href="contact.php">Contact Us</a></li>
    </l>
    <div class="NavBtn">
      <button type="button" name="button" class="NavBtnLink"  onclick="change()">Signup</button>
    </div>

  </div>
</div>

<!-- Hero section -->
<div class="HeroContainer">
  <div class="HeroBg">
    <video muted autoplay="autoplay" loop class="VideoBg">
  <source src="videos\nitap.mp4" type="video/mp4">
</video>
  </div>
<div class="HeroContent">
  <h1 class="HeroH1">Hostel Management System</h1>
  <p class="HeroP">NIT ANDHRA PRADESH</p>
  <div class="HeroBtnWrapper">
<button type="button" name="button" class="NavBtnLink"  onclick="login()">login</button>
  </div>
</div>

</div>



<!-- infosection1 -->

<div class="InfoContainer" id="about">
<div class="InfoWrapper">

<div class="InfoRow">
<div class="Column1">
<div class="TextWrapper">
<p class="TopLine">World class facilities</p>
<h1 class="Heading">Best facilities</h1>
<p class="Subtitle">Cherish your hostel life with our hostels</p>
<div class="BtnWrap">
<button type="button" name="button" class="NavBtnLink">Get Started</button>
</div>
</div>
</div>

<div class="Column2">
<div class="ImgWrap">
<img class="Img" src="images/homepic.jpg" alt="">
</div>
</div>
</div>
</div>

</div>







<!-- footer -->
<div class="FooterContainer" id="contact">

<div class="FooterWrap">
  <div class="FooterLinksContainer">
    <div class="FooterLinksWrapper">
        <div class="FooterLinkItems">
            <h1 class="FooterLinkTitle">About Us</h1>
            <a href="aboutme.php" class="FooterLink">Developers</a>
            <a href="facilities.php" class="FooterLink">Services</a>
           
            <a href="admin\adminlogin.php" class="FooterLink">Admin</a>
        </div>
    </div>
  </div>

  <div class="SocialMedia">
    <div class="SocialMediaWrap">
      <a href="#" class="SocialLogo">HMS</a>
      <p class="WebsiteRights">NIT ANDHRA PRADESH © 2023</p>
      <div class="SocialIcons">
        <a href="https://www.facebook.com/nitandhrapradesh2015/" class="SocialIconLink"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
        <a href="https://twitter.com/NITANDHRA2015" class="SocialIconLink"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/nit.andhrapradesh/?hl=en" class="SocialIconLink"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="https://www.youtube.com/@NITANDHRAPRADESH2015" class="SocialIconLink"><i class="fa-brands fa-youtube"></i></a>
        
      </div>
    </div>

  </div>

</div>
</div>


  </body>
</html>
