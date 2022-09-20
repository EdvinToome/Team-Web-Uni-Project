<header>
    <div class="name">RentBase</div>
    <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
    <label for="openSidebarMenu" class="sidebarIcon">
        <div class="sidebarIconBars"></div>
        <div class="sidebarIconBars"></div>
        <div class="sidebarIconBars"></div>
    </label>
    <nav class="menu">
        <ul class="menuInner">
            <a href="index.php">
                <li class="menuElement">Home</li>
            </a>

            <a href="bikes.php">
                <li class="menuElement">Bikes</li>
            </a>
            <a href="scooters.php">
                <li class="menuElement">Scooters</li>
            </a>
            <a href="aboutus.php">
                <li class="menuElement">About Us</li>
            </a>
            <a href="faq.php">
                <li class="menuElement">FAQ</li>
            </a>
            <?php
            session_start();
            if (isset($_SESSION["login"])) {
                $servername = "anysql.itcollege.ee";
                $username = "ICS0008_WT_11";
                $password = "b0c66e7c543b";
                $dbname = "ICS0008_11";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT balance FROM users WHERE username = '" . $_SESSION["login"] . "'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $user_balance = $row["balance"];
                    }
                }
                echo '<a href="account.php">
                    <li class="menuElement">Hello, ' . $_SESSION["login"] . '!<br>Balance:' . $user_balance;
               
           
            } else {
                echo '<a href="login.php">
                    <li class="menuElement">Log in';
            }
            ?></li>
            </a>


        </ul>
    </nav>

</header>