<?php
// Include database connection
include("dbConnect.php"); // Adjust the include path as needed

// Check if job ID is set in the URL
if (isset($_GET['id'])) {
    $jobId = $_GET['id'];

    // Fetch job information from the database based on the job ID
    $sqlJob = "SELECT jobs_table.*, company.company_name, company.company_picture, company.location, company.about_company
                FROM jobs_table
                INNER JOIN company ON jobs_table.id_company = company.id_company
                WHERE job_id = $jobId";
    $resultJob = $conn->query($sqlJob);

    // Check if the result contains data
    if ($resultJob->num_rows > 0) {
        // Fetch job data
        $rowJob = $resultJob->fetch_assoc();

        // Assign job information to variables
        $jobTitle = $rowJob['job_name'];
        $location = $rowJob['location'];
        $postedTime = new DateTime($rowJob['posted_time']);
        $currentDateTime = new DateTime();
        $timeDifference = $currentDateTime->diff($postedTime);

        // Format the elapsed time
        $elapsedTime = '';
        if ($timeDifference->y > 0) {
            $elapsedTime = $timeDifference->format('%y years ago');
        } elseif ($timeDifference->m > 0) {
            $elapsedTime = $timeDifference->format('%m months ago');
        } elseif ($timeDifference->d > 0) {
            $elapsedTime = $timeDifference->format('%d days ago');
        } elseif ($timeDifference->h > 0) {
            $elapsedTime = $timeDifference->format('%h hours ago');
        } elseif ($timeDifference->i > 0) {
            $elapsedTime = $timeDifference->format('%i minutes ago');
        } else {
            $elapsedTime = 'Just now';
        }

        $jobType = $rowJob['jobType'];
        $companyName = $rowJob['company_name'];
        $companyPicture = $rowJob['company_picture'];
        $jobDescription = $rowJob['job_description'];
        $companyDescription = $rowJob['about_company'];
    } else {
        // Handle case where no job data is found
        // You may redirect to an error page or display a default message
        $jobTitle = "Job Title";
        $location = "Location";
        $elapsedTime = "Posted Time";
        $jobType = "Job Type";
        $companyName = "Company Name";
        $companyPicture = "default_picture.jpg";
        $jobDescription = "Job description placeholder text.";
        $companyDescription = "Company description placeholder text.";
    }
} else {
    // Handle case where no job ID is provided in the URL
    // You may redirect to an error page or display a default message
    $jobTitle = "Job Title";
    $location = "Location";
    $elapsedTime = "Posted Time";
    $jobType = "Job Type";
    $companyName = "Company Name";
    $companyPicture = "default_picture.jpg";
    $jobDescription = "Job description placeholder text.";
    $companyDescription = "Company description placeholder text.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="job_informationStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title><?php echo $jobTitle; ?> | Job Finder</title>
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

    <section class="main content" style="padding-left: 10%; padding-right: 10%;">
        <!-- job title, apply, and company description -->
        <div class="container-fluid mt-4 cont1 custom-box job-info">
            <div class="row">
                <!-- company logo (you can fetch company logo in a similar way) -->
                <div class="col-sm-3 border-end d-flex align-items-center justify-content-center">
                    <!-- Placeholder image, replace with dynamic data -->
                    <img src="<?php echo $companyPicture; ?>" alt="<?php echo $companyName; ?>" style="width: 11em;">
                </div>
                <span class="col-sm-1"></span>
                <!-- job title & apply btn -->
                <div class="col-sm-8">
                    <div class="header-container">
                        <p class="h1 card-title mb-4"><?php echo $jobTitle; ?></p>
                        <p class="card-text"><strong>Location : </strong> <?php echo $location; ?></p>
                        <p class="card-text"><strong>Posted Date : </strong> <?php echo $elapsedTime; ?></p>
                        <p class="card-text"><strong>Job Type : </strong> <?php echo $jobType; ?></p>
                        <p>
                            <a href="applyjob.html" class="btn btn-primary btn-lg mt-3">Apply</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-2">
                <hr>
            </div>
            <div class="row">
                <!-- job desc -->
                <div class="col-sm-7 border-end about">
                    <p class="h2 mb-3">About the Job</p>
                    <?php echo $jobDescription; ?>
                </div>
                <!-- company desc -->
                <div class="col-sm-4 about">
                    <p class="h2 mb-3">Company Description</p>
                    <?php echo $companyDescription; ?>
                </div>
            </div>
        </div>
    </section>

    <div id="scrollToTop">&#8593;</div>
    <script>
        document.getElementById('scrollToTop').addEventListener('click', function() {
            window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
        });
    </script>
</body>
</html>
