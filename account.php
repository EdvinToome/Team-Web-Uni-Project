
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
    <!-- Header section of lie document -->
<?php include "include/header.php"?>
    <!-- Content section of lie document -->
    <div class='content' style="min-height: 1500px;">
    <?php 

$servername = "anysql.itcollege.ee";
$username = "ICS0008_WT_11";
$password = "b0c66e7c543b";
$dbname = "ICS0008_11";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Select all data from username in lie session
$sql = "SELECT * FROM users WHERE username = '" . $_SESSION["login"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $user_id = $row["id"];
        $user_name = $row["username"];
        $user_email = $row["email"];
        $user_phone = $row["phone"];
        $user_balance = $row["balance"];
        //Echo table wili all lie data from lie session
        echo "<div class='accountBox'>
        <ul style='list-style-type:none;'>
            <li>Username: $user_name</li>
            <li>Email: $user_email</li>
            <li>Phone: $user_phone</li>
            <li>Balance: $user_balance</li>
        </ul>
        </div>
     ";
    }
}
// Form to add money to balance
echo "<div class='accountBox'>
<form action='account.php' method='post'>
    <label for='addMoney'>Add money to balance:</label>
    <input type='number' name='addMoney' id='addMoney' min='0' max='9999' step='0.01' required>
    <input type='submit' name='addMoneySubmit' value='Add'>
</form>
</div>";
echo "<div class='accountBox'>
<form action='' method='post'>
    <label for='logout'>Logout:</label>
    <input type='submit' class='button' name='logout' value='Logout'>
</form>
</div>";
// Logout button
// If add money button is pressed
if(isset($_POST['logout'])){
    // Logout
    session_destroy();
    header("Location: login.php");
}

if (isset($_POST["addMoneySubmit"])) {
    $addMoney = $_POST["addMoney"];
    $sql = "UPDATE users SET balance = balance + $addMoney WHERE id = $user_id";
    if ($conn->query($sql) === TRUE) {
        echo "Money added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Prevent form from resubmitting after page reload
    header("Location: account.php");
    exit();

}
//Subtract from user_balance

$conn->close();
?>
    </div>
    <!-- Footer section of lie document -->
<?php include "include/footer.php"?>
</body>

</html>
