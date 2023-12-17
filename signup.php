<?php
    include("dbConnect.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $conn->real_escape_string($_POST['login-mail']);
        $password = $conn->real_escape_string($_POST['login-password']);
        $companyName = $conn->real_escape_string($_POST['companyName']);
        $location = $conn->real_escape_string($_POST['location']);
        $website = $conn->real_escape_string($_POST['website']);
        $aboutCompany = $conn->real_escape_string($_POST['aboutCompany']);
        $contactEmail = $conn->real_escape_string($_POST['contactEmail']);

        // Handle company picture upload
        $companyPicturePath = "images/" . basename($_FILES["companyPicture"]["name"]);
        move_uploaded_file($_FILES["companyPicture"]["tmp_name"], $companyPicturePath);

        // Use a query for checking email existence
        $checkEmailQuery = "SELECT * FROM account WHERE email = '$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows == 0) {
            // Insert into company table using query
            $insertCompanyQuery = "INSERT INTO company (company_name, company_picture, location, website, about_company, contact_email)
                                VALUES ('$companyName', '$companyPicturePath', '$location', '$website', '$aboutCompany', '$contactEmail')";

            if ($conn->query($insertCompanyQuery)) {
                $companyId = $conn->insert_id;

                // Insert into account table using query
                $insertAccountQuery = "INSERT INTO account (email, password, id_company)
                                    VALUES ('$email', '$password', $companyId)";

                if ($conn->query($insertAccountQuery)) {
                    header("Location: index.html");
                } else {
                    echo "Error inserting into account table: " . $conn->error;
                }
            } else {
                echo "Error inserting into company table: " . $conn->error;
            }
        } else {
            // JavaScript to show a popup
            echo "<script>
                    alert('Account already exists. Please choose a different email.');
                    window.location.href = 'signup.html';
                </script>";
        }

        $conn->close();
    }
?>
