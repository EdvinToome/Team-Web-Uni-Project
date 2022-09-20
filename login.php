
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
<?php include "include/header.php"?>

    <div class="account">
        <form action="login.php" method="post">
            <label for="login">Username: </label><input id="login" type="text" name="login" required><br>
            <label for="password">Password: </label><input id="password" type="password" name="password" required><br>
            <div class="newAccount">
            <a href="create.php"><div class='button' style="width:95%">Sign up</div></a>
            </div><br>

            <input type="submit" class='button' name="login_in" id="login_in" value="Log in">

            <?php
            if (isset($_POST["login_in"])) {


                function test_input($input)
                {
                    $input = trim($input);
                    $input = stripslashes($input);
                    return $input;
                }

                $login = test_input($_POST["login"]);
                $userPassword = test_input($_POST["password"]);

                $servername = "anysql.itcollege.ee";
                $username = "ICS0008_WT_11";
                $password = "b0c66e7c543b";
                $dbname = "ICS0008_11";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $pepper = 'qE9S06GwRLKdEf7vgKMk';
                $pwd_peppered = hash_hmac("sha256", $userPassword, $pepper);
                //Get passwords and logins from SQL and check user input and if it is correct, log in
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                $success = false;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($login == $row["username"] && password_verify($pwd_peppered,$row["password"])) {
                            session_start();
                            $_SESSION["login"] = $login;
                            $_SESSION["password"] = $userPassword;
                            $success = true;
                            echo 'Sucessfully logged in!';
                            
                            header("Location: index.php");
                        }
                     
                    }
                    if ($success == false) {
                        echo 'Wrong username or password!';
                    }
                }


                
            }

            ?>

    </div>
    </form>
</body>

</html>