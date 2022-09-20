<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Tallinn University of Technology – Web Technologies - Learning CSS">
    <meta name="keywords" content="ICD0007, LAB2, CSS">
    <meta name="author" content="Edvin Toome">
    <meta name="author" content="Artjom Davydik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentBase - About us</title>
    <link rel="stylesheet" href="styles/style.css">

</head>

<body>
<?php include "include/header.php"?>

    <body>
        <div class="content" style="min-height: 1500px;">
        <div class="about-section">
            <h1>About Us Page</h1>
            <p>Some text about who we are and what we do.</p>
        </div>

        <h2 style="text-align:center">Our Team</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="img/author1.jpg" alt="Artyom" style="width:50.5%">
                    <div class="container">
                        <h2>Artyom Davydik</h2>
                        <p class="title">Developer</p>
                        <p>Low iq frontend developer</p>
                        <p>ardavy@ttu.ee</p>
                        <p><a style ="color: white;text-decoration: none" href="mailto:ardavy@ttu.ee"><button class="button">Contact</button></a></p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="img/author2.jpg" alt="Edwin" style="width:51%">
                    <div class="container">
                        <h2>Edwin Toome</h2>
                        <p class="title">Developer</p>
                        <p>Medium iq frontend developer</p>
                        <p>edtoom@ttu.ee</p>
                        <p><a style ="color: white;text-decoration: none" href="mailto:edtoom@ttu.ee"><button class="button">Contact</button></a></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php include "include/footer.php"?>

    </body>