<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Tallinn University of Technology – Web Technologies - Learning CSS">
    <meta name="keywords" content="ICD0007, LAB2, CSS">
    <meta name="author" content="Edvin Toome">
    <meta name="author" content="Artjom Davydik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentBase - Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php include "include/header.php" ?>

    <div class="account">
        <form action="create.php" method="post">
            <label for="userName">Username: </label><input id="userName" type="text" name="userName" required><br>
            <label for="password">Password: </label><input id="password" type="text" name="password" required><br>
            <label for="age">Age*: </label><input type="number" id="age" name="age" min="17" max="99" required> <br>
            <label for="email">E-mail*: </label><input type="email" name="email" id="email" required> <br>
            <label for="phone">Phone number: </label><input type="tel" name="phone" id="phone"> <br>
            <input type="submit" class='button' name="createAccount" id="createAccount" value="Create Account!">
        </form>
    </div>
</body>

</html>
<?php

if (isset($_POST["createAccount"])) {

    $invalidData = 0;
    function testName($data)
    {

        return !preg_match('/^[A-za-z\'\-\s]{2,40}$/', $data);
    }

    function testPhone($data)
    {
        if ($data == '') return false;
        return !preg_match('/^[0-9()\+]+$/', $data);
    }

    function testAge($data)
    {
        return !preg_match('/^1[8-9]|[2-9][0-9]|1[0-9][0-9]+$/', $data);
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $userName  = $password = $age = $email  = $phone = "";
    $userName = test_input($_POST["userName"]);

    $userPassword = test_input($_POST["password"]);
    $age = test_input($_POST["age"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $requiredData = [$userName, $userPassword, $age, $email];
    $invalidData += testName($userName);
    $invalidData += testAge($age);
    $invalidData += testPhone($phone);

    //Password Encryption
    $pepper = 'qE9S06GwRLKdEf7vgKMk';
    $pwd_peppered = hash_hmac("sha256", $userPassword, $pepper);
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        ++$invalidData;
    }
    foreach ($_POST as $element => $value) {
        if (in_array($element, $requiredData) && $value == '') {
            $invalidData += true;
        }
    }
    if (!$invalidData) {
        //Send user credentials to SQL database
        $servername = "anysql.itcollege.ee";
        $username = "ICS0008_WT_11";
        $password = "b0c66e7c543b";
        $dbname = "ICS0008_11";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //Check if user already exists
        $sql = "SELECT * FROM users WHERE username = '$userName'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<div id='confirmedText'>User already exists!</div>";
        } else {
            $sql = "INSERT INTO users (username, password, age, email, phone)
            VALUES ('$userName', '$pwd_hashed', '$age', '$email', '$phone')";
            if ($conn->query($sql) === TRUE) {
                echo "<div id='confirmedText'>New record created successfully</div>";
            } else {
                echo "<div id='confirmedText'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
            $conn->close();
        }
    }


}
?>
