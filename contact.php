<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Магазин канцтоваров</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="wrap">
    
  <?php 
 $menu = "contacts";
 require_once("config/settings.php");
 require_once("components/header.php");

 ?>
     <h3>ПОЗВОНИ НАМ</h3>
     <a href="tel:+1234567890">1 (234) 567-891 </a>
     <h3>МЕСТО НАХОЖДЕНИЯ</h3>
     <p>121 Rock Sreet, 21 Avenue, Нью-Йорк, NY 92103-9000</p>
 
     <?php
     require_once('components/footer.php');
     ?>
   </div>
  </body>
</html>
