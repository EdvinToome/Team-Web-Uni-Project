
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Tallinn University of Technology – Web Technologies - Learning CSS">
    <meta name="keywords" content="ICD0007, LAB2, CSS">
    <meta name="author" content="Edvin Toome">
    <meta name="author" content="Artjom Davydik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentBase - Scooters</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php include "include/header.php" ?>
<main class="container2">
    <?php
    $servername = "anysql.itcollege.ee";
    $username = "ICS0008_WT_11";
    $password = "b0c66e7c543b";
    $dbname = "ICS0008_11";
    $conn = new mysqli( $servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "select * from scooters where id = $_GET[id]";
    $result = $conn->query($query);


    if ($result->num_rows > 0) {
        $row = $result -> fetch_assoc();
        $price = $row["price"];
        echo '<div class="left-column">
            <img  src="img/'.$row["image"].'">
        </div>
        <div class="right-column">
            <div class="product-description">
                <span>'.$row["name"].'</span>
                <h1  id="product-heading">Its like a car, but better!</h1>
                <p>'.$row["description"].'</p>
            </div>
            <div class="product-configuration">
                    <a href="faq.php">FAQ</a>
                </div>
            <div class="product-price">
                <span>'.$row["price"].'$ per day</span>
            </div>
            <form action="single_scooter.php?id='.$row["id"].'" method="post">
            <input class="cart-btn" type="submit" name="rentScooter" value="Rent now">
            </form>
           </div>
       </div>';
      // Check user balance on pressing rent button
       if (isset($_POST['rentScooter'])) {
           $query = "select balance from users where username = '" . $_SESSION["login"] . "'";
           $result = $conn->query($query);
           $row = $result -> fetch_assoc();
           if ($row["balance"] < $price) {
               echo '<script>document.getElementById("product-heading").innerHTML = "You do not have enough money!";</script>';
           } else {
               $query = "update users set balance = balance - $price WHERE username = '" . $_SESSION["login"] . "'";
               $result = $conn->query($query);
               echo '<script>document.getElementById("product-heading").innerHTML = "You have sucessfully rented the scooter!";</script>';
           }
       }
       $conn->close();
       exit();
       }
    ?>

</main>
</body>
</html>