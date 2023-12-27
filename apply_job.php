<?php
// Include database connection and fetch job details based on ID
include 'dbConnect.php';

// Check if job ID is set in the URL
if (isset($_GET['id_job'])) {
    $jobId = $_GET['id_job'];

    // Fetch job details based on the job ID
    $sqlJob = "SELECT * FROM jobs_table WHERE job_id = ?";
    $stmt = $conn->prepare($sqlJob);
    $stmt->bind_param("i", $jobId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the result contains data
    if ($result->num_rows > 0) {
        // Fetch job data
        $row = $result->fetch_assoc();
    } else {
        // Handle the case where no job data is found
        echo "Job not found";
        // You may redirect to an error page or display a default message
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $id_job = isset($_GET['id_job']) ? $_GET['id_job'] : null;
        $seeker_mail = $_POST['seeker-mail'];
        $seeker_name = $_POST['seeker-name'];
        $seeker_gender = $_POST['seeker-gender'];
        $seeker_dob = $_POST['seeker-dob'];
        $seeker_phone = $_POST['seeker-phone'];
        $seeker_diplome = $_POST['seeker-diplome'];
        $seeker_experience = $_POST['seeker-experience'];
        $seeker_skills = $_POST['seeker-skills'];
        $seeker_coverletter = $_POST['seeker-coverLetter'];

        // Processing file upload (resume)
        if (isset($_FILES['seeker-resume'])) {
            $resume_name = $_FILES['seeker-resume']['name'];
            $resume_tmp = $_FILES['seeker-resume']['tmp_name'];
            $resume_destination = "resume_uploads/" . $resume_name;

            // Move the uploaded file to the destination folder
            move_uploaded_file($resume_tmp, $resume_destination);
        }

        // Insert data into the job_seeker table
        $insert_query = "INSERT INTO job_seeker (seeker_mail, seeker_name, seeker_gender, seeker_dob, seeker_phone, seeker_diplome, seeker_experience, seeker_skills, seeker_coverletter, seeker_resume_path, job_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssssssssssi", $seeker_mail, $seeker_name, $seeker_gender, $seeker_dob, $seeker_phone, $seeker_diplome, $seeker_experience, $seeker_skills, $seeker_coverletter, $resume_destination, $id_job);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Application successfully submitted
            echo '<script>
                    alert("Application submitted successfully!");
                    window.location.href = "index.html";
                  </script>';
            exit();
        } else {
            // Error in the query execution
            echo '<script>
                    alert("Error submitting the application. Please try again later.");
                  </script>';
        }
    }

    // Close the statement
    $stmt->close();
    $conn->close();
} else {
    // Handle the case where no job ID is provided in the URL
    echo '<script>
            alert("Job ID not provided");
          </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/loginStyle.css">
    <link rel="icon" type="image/x-icon" href="images/fi1.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <title>Applying | JobFinder</title>
</head>

<body>
    <header>
        <!-- logo -->
        <a href="index.html" style="text-decoration: none;">
            <div id="logo">
                <h6 style="font-weight: bold; color: black; font-family: Georgia, 'Times New Roman', Times, sans serif; font-size: larger;"> JobFinder <span style="font-size:30px; color: rgb(29, 129, 236);">...</span>
                </h6>
            </div>
          </a>
    </header>
    <section>
        <div class="section1 mt-0 pt-3 pt-md-5 mt-md-5" style="margin-left: 15%; margin-right: 15%;">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <div class="borderend_33">
                            <img src="images/apply-img.png" class="img-fluid" style="width: 80%;">
                        </div>
                        </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <div class="d-flex justify-content-center align-content-center">
                                    <h2 class="header1 pb-3">Apply to Offer</h1>
                                </div>
                                <form method="post" action="apply_job.php?id_job=<?php echo $row["job_id"]; ?>" enctype="multipart/form-data">
                                    <!-- <div>
                                        <input type="hidden" name="id_job" value="<?php echo $row["job_id"]; ?>">
                                    </div>     -->
                                    <div class="mb-3">
                                        <label class="form-label" for="login-mail">Email address : </label>
                                        <input type="email" name="seeker-mail" class="form-control form-control-m" placeholder="Enter your contact email" required/>
                                    </div>
                        
                                    <div class="mb-3">
                                        <label class="form-label" for="seeker-name">Full Name : </label>
                                        <input type="text" name="seeker-name" class="form-control form-control-m" placeholder="Enter your full name" required/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="seeker-gender">Gender : </label> <br>
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="seeker-gender" id="gender-male" value="male" required>
                                            <label class="form-check-label" for="gender-male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="seeker-gender" id="gender-female" value="female" required>
                                            <label class="form-check-label" for="gender-female">Female</label>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="seeker-dob">Date of Birth : </label>
                                        <input type="date" name="seeker-dob" class="form-control form-control-m" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="seeker-phone">Phone Number : </label>
                                        <input type="tel" name="seeker-phone" class="form-control form-control-m" placeholder="Enter your phone number" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="seeker-diplome">Latest Diploma : </label>
                                        <select name="seeker-diplome" class="form-control form-control-m" required>
                                            <option value="diploma1">Choose...</option>
                                            <option value="diploma2">Bac +3</option>
                                            <option value="diploma3">Bac +5</option>
                                            <option value="diploma3">Other...</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="seeker-experience">Professional Experience : </label>
                                        <select name="seeker-experience" class="form-control form-control-m" required>
                                            <option value="experience1">Choose...</option>
                                            <option value="experience2">Less than 1 year</option>
                                            <option value="experience3">1 year</option>
                                            <option value="experience4">2 years</option>
                                            <option value="experience5">3 years</option>
                                            <option value="experience6">4 years</option>
                                            <option value="experience7">5 years</option>
                                            <option value="experience8">More than 5 years</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="seeker-skills">Skills : </label>
                                        <textarea name="seeker-skills" class="form-control form-control-m" placeholder="Enter your skills" rows="5" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="seeker-coverLetter">Cover Letter : </label>
                                        <textarea name="seeker-coverLetter" class="form-control form-control-m" placeholder="Enter your cover letter" rows="5" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="seeker-resume">Resume : </label>
                                        <input type="file" name="seeker-resume" class="form-control form-control-m" required>                                        
                                    </div>
                        
                                    <div class="text-center text-lg-start mt-4">
                                        <button type="submit" class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
