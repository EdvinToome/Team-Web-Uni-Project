
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Tallinn University of Technology – Web Technologies - Learning CSS">
    <meta name="keywords" content="ICD0007, LAB2, CSS">
    <meta name="author" content="Edvin Toome">
    <meta name="author" content="Artjom Davydik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentBase - Main Page</title>
    <link rel="stylesheet" href="styles/style.css">
    
</head>

<body>
    <!-- Header section of the document -->
<?php include "include/header.php"?>
    <!-- Content section of the document -->
    <div class="welcomeBlock">
        <h1 id="welcomeText">The brand new sustainable bikes and scooter rental system</h1>
       
    </div>
 
 
            <div id="secondBlock">
        <div id="carousel-wrapper">
       
  <div id="carouselMenu">
      <div id="current-option">
        <span id="current-option-text1" data-previous-text="" data-next-text=""></span>
        <span id="current-option-text2" data-previous-text="" data-next-text=""></span>
      </div>
      <button id="previous-option"></button>
      <button id="next-option"></button>
      </div>
 
  <div id="image"></div>
</div>
    </div>
    <script type="text/javascript" src="include/carousel.js"></script>

    <div id="scootersBikesRent"><a href="bikes.php"><div id="bikeRent"><img src="img/bicycle.jpg" alt=""><h1 >Rent Bike ></h1></div></a>
    <a href="scooters.php"><div id="scooterRent"><img src="img/scooter1.png" alt=""><h1>Rent Scooter ></h1></div></a></div>

    <?php include "include/footer.php"?>
</body>

</html>