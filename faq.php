<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Tallinn University of Technology – Web Technologies - Learning CSS">
    <meta name="keywords" content="ICD0007, LAB2, CSS">
    <meta name="author" content="Edvin Toome">
    <meta name="author" content="Artjom Davydik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БАШМАЧЕЧЕК</title>
    <link rel="stylesheet" href="styles/style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>

<body>
<?php include "include/header.php"?>

    <div class="icons"> </div>

    <body>
        <section>
            <div class="container1">
                <div class="accordion">
                    <div class="accordion-item" id="question1">
                        <a class="accordion-link" href="#question1">
                            Where are you located?
                            <ion-icon name="add" class = "icon"> </ion-icon>
                            <ion-icon name="remove" class ="icon_remove"> </ion-icon>
                        </a>
                        <div class="answer">
                            <p>
                                We are located in Estonia, Tallinn, where the cycling resort is very relevant, we also provide our services throughout Estonia, we have points in Tartu, Pärnu and Narva.
                            </p>

                        </div>
                    </div>
                    <div class="accordion-item" id="question2">
                        <a class="accordion-link" href="#question2">
                            What do i need to rent a bike/scooter?
                            <ion-icon name="add" class = "icon"> </ion-icon>
                            <ion-icon name="remove" class ="icon_remove"> </ion-icon>
                        </a>
                        <div class="answer">
                            <p>
                                In the case of a bike, the customer must be at least 16 years old and have a driver's license to operate the vehicle. It's easier with a scooter, you just need to be over 16 years old.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item" id="question3">
                        <a class="accordion-link" href="#question3">
                            What will happen in case of any damage to the rented vehicle?
                            <ion-icon name="add" class = "icon"> </ion-icon>
                            <ion-icon name="remove" class ="icon_remove"> </ion-icon>
                        </a>
                        <div class="answer">
                            <p>
                                In this case, before renting, we offer to take out insurance that will cover all these costs, otherwise the tenant will have to pay damages from a personal wallet.
                            </p>
                        </div>
                    </div>
                    <div class="accordion-item" id="question4">
                        <a class="accordion-link" href="#question4">
                            If necessary, can the bike be tracked?
                            <ion-icon name="add" class = "icon"> </ion-icon>
                            <ion-icon name="remove" class ="icon_remove"> </ion-icon>
                        </a>
                        <div class="answer">
                            <p>
                                Yes. All bikes and scooters are equipped with a portable GPS device that can track the location of the vehicle within a radius of over 200 km.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include "include/footer.php"?>
    </body>

</html>