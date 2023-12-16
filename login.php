<?php
    include("dbConnect.php");

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $email = $_POST["login-mail"];
        $password = $_POST["login-password"];

        if ($email == ""|| $password == "") {
            header("Location: login.html");
            exit();
        }

        // Prepare and execute the SQL query
        $sql = "SELECT * FROM TABLE WHERE EMAIL = '$email' AND PASS = '$password' ";
        $resultat = $conn->query($sql)->fetch_array();
        if ($result->num_rows > 0) {
            $x = $resultat[0];
            setcookie("companyData", $x, time() + 3600, "/");
            header("Location: index.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>