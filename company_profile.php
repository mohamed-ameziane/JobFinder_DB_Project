<?php
include "dbConnect.php";

// Start the session
session_start();

// Check if the company is logged in
if (!isset($_SESSION['id_company'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

// Fetch company information from the database based on the logged-in company ID
$idCompany = $_SESSION['id_company'];
$sqlCompany = "SELECT * FROM company WHERE id_company = $idCompany";
$resultCompany = $conn->query($sqlCompany);

// Check if the result contains data
if ($resultCompany->num_rows > 0) {
    // Fetch company data
    $rowCompany = $resultCompany->fetch_assoc();

    // Assign company information to variables
    $companyName = $rowCompany['company_name'];
    $companyPicture = $rowCompany['company_picture'];
    $companyLocation = $rowCompany['location'];
    $companyWebsite = $rowCompany['website'];
    $aboutCompany = $rowCompany['about_company'];
    $contactEmail = $rowCompany['contact_email'];
} else {
    // Handle case where no company data is found
    $companyName = "Company Name";
    $companyPicture = "default_picture.jpg";
    $companyLocation = "Location";
    $companyWebsite = "Website";
    $aboutCompany = "About Company";
    $contactEmail = "Contact Email";
}

// Fetch posted jobs for the logged-in company from the database
$sqlJobs = "SELECT * FROM jobs_table WHERE id_company = $idCompany";
$resultJobs = $conn->query($sqlJobs);

// Initialize an array to store posted job data
$postedJobs = [];

// Check if the result contains data
if ($resultJobs->num_rows > 0) {
    // Fetch posted job data and store in the array
    while ($rowJobs = $resultJobs->fetch_assoc()) {
        $postedJobs[] = [
            'jobId' => $rowJobs['job_id'],
            'jobName' => $rowJobs['job_name'],
            'jobType' => $rowJobs['jobType'],
            'salary' => $rowJobs['salary'],
            // Add more fields as needed
        ];
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the home page
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="company_profileStyle.css">
    <link rel="icon" type="image/x-icon" href="images/fi1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title><?php echo $companyName; ?> Profile</title>
</head>
<body>

<!-- header -->
<header>
    <!-- logo -->
    <div id="logo">
        <h6 style="font-weight: bold; color: black; font-family: Georgia, 'Times New Roman', Times, sans serif; font-size: larger;">JobP <span style="font-size:30px; color: rgb(29, 129, 236);">..</span></h6>
    </div>

    <!-- navbar -->
    <nav>
        <a class="navb" href="index.html">Home</a>
        <a class="navb" href="about.html">About</a>
        <a class="navb" href="contactus.html">Contact Us</a>
    </nav>

    <!-- navbar buttons -->
    <div>
        <a href="post_job.html" class="btn btn-primary">Post Job</a>
        <a href="?logout" class="btn btn-outline-danger">Log Out</a>
    </div>
</header>

<!-- company information -->
<div class="container mt-5">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-10 text-center">
            <!-- Display Company Picture -->
            <img src="<?php echo $companyPicture; ?>" style="width: 15%;" class="img-fluid rounded" alt="Company Picture">
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-md-10 text-center border-top">
            <!-- Display Company Name and other information -->
            <h2><?php echo $companyName; ?></h2>
            <p><strong>Location:</strong> <?php echo $companyLocation; ?></p>
            <p><strong>Website:</strong> <?php echo $companyWebsite; ?></p>
            <p><strong>About Company:</strong> <?php echo $aboutCompany; ?></p>
            <p><strong>Contact Email:</strong> <?php echo $contactEmail; ?></p>
        </div>
    </div>

    <!-- Display Posted Jobs -->
    <section class="section1">
        <h1>Posted Jobs</h1>

        <?php
        // Display posted jobs
        foreach ($postedJobs as $job) {
            echo '
            <a href="job_information.php?id=' . $job['jobId'] . '" class="card m-md-5 p-1 job-card">
                <div class="row no-gutters justify-content-center">
                    <div class="col-md-10 text-center mx-auto">
                        <div class="card-body row justify-content-center">
                            <h5 class="card-title">' . $job['jobName'] .'     ' . '<span class="badge rounded-pill ' . ($job['jobType'] == "Full Time" ? 'bg-success' : 'bg-warning') . '">' . $job['jobType'] . '</span></h5>
                            
                        </div>
                    </div>
                </div>
            </a>';
        }
        ?>
    </section>
</div>

<!-- Scroll to Top Button -->
<div id="scrollToTop">&#8593;</div>
<script>
    // JavaScript to handle the scrolling functionality
    document.getElementById('scrollToTop').addEventListener('click', function() {
        window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
    });
</script>

</body>
</html>
