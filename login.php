<?php
include("includes/dbConnect.php");

// Retrieve user input
$email = $_POST["login-mail"];
$password = $_POST["login-password"];

// Prepare and execute the SQL query
$sql = "SELECT * FROM account WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the company ID from the result
    $row = $result->fetch_assoc();
    $companyId = $row['id_company'];

    // Set a session variable to store the company ID
    session_start();
    $_SESSION['id_company'] = $companyId;

    // Redirect to the company profile page with the company ID
    header("Location: company_profile.php");
    exit();
} else {
    echo $sql . " error";
}
?>
