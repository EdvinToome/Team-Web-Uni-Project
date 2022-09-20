<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Tallinn University of Technology – Web Technologies - Learning CSS">
    <meta name="keywords" content="ICD0007, LAB2, CSS">
    <meta name="author" content="Edvin Toome">
    <meta name="author" content="Artjom Davydik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentBase - Bikes</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        @media screen and (max-width: 1000px) {
            body {
                height: auto;
            }
        }
    </style>
</head>

<body>
    <?php include "include/header.php" ?>
    <div class='content'>
        <div class="main">
            <ul class="item_list">
                <?php
                $servername = "anysql.itcollege.ee";
                $username = "ICS0008_WT_11";
                $password = "b0c66e7c543b";
                $dbname = "ICS0008_11";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $query = "select * from bikes";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="single_item">
                <img src="img/' . $row["image"] . '" alt="" class="item_image">
                <div class="text">
                    <p class="name1">' . $row["name"] . '</p>
                    <p class="price">' . $row["price"] . '£ per our</p>
                    <a class="book" href="single_bike.php?id=' . $row["id"] . '">Read more</a>
                </div>
            </li>';
                    }
                }
                ?>
        </div>
    </div>
    <?php include "include/footer.php" ?>
</body>

</html>