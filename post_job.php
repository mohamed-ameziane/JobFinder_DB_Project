<?php
include 'includes/dbConnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a session variable containing the logged-in user's company ID
    // Adjust this part based on how you store and retrieve user information
    session_start();
    $id_company = $_SESSION['id_company'];

    // Escape user inputs for security
    $job_name = $conn->real_escape_string($_POST['job-name']);
    $work_arrangement = $conn->real_escape_string($_POST['work-arrangement']);
    $salary = floatval($_POST['salary']);  // Assuming salary is a decimal/float
    $brief_info = $conn->real_escape_string($_POST['brief-info']);
    $job_description = $conn->real_escape_string($_POST['job-description']);
    $jobType = $conn->real_escape_string($_POST['jobType']);

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO jobs_table (job_name, full_time, salary, brief_info, job_description, jobType, id_company) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssdsssi", $job_name, $work_arrangement, $salary, $brief_info, $job_description, $jobType, $id_company);

    // Execute the prepared statement
    if ($stmt->execute()) {
        header("Location: company_profile.php");
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
    // No need to close the connection if it's not going to be used further in the script
}
?>
