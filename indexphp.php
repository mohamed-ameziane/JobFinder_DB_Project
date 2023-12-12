<?php

// Database credentials
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest 5 jobs with company details
$sql = "SELECT jobs_table.job_name, jobs_table.salary, company.company_picture
        FROM jobs_table
        INNER JOIN company ON jobs_table.id_company = company.id_company
        ORDER BY jobs_table.posted_time DESC
        LIMIT 5";

// Execute the query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Output the job details as a Bootstrap card
        echo '
        <a href="jobInformation.html?id=' . $row["job_id"] . '" class="card m-md-5 p-1 job-card">
            <div class="row no-gutters">
                <!-- Company Picture Column -->
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <img style="width: 35%;" src="' . $row["company_picture"] . '" class="card-img" alt="' . $row["company_name"] . '">
                </div>
                <!-- Job Details Column -->
                <div class="col-md-10">
                    <div class="card-body row">
                        <!-- Left Column for Job Details -->
                        <div class="col-md-7">
                            <h5 class="card-title">' . $row["job_name"] . '<span class="badge rounded-pill ' . ($row["full_time"] == "Full Time" ? 'bg-success' : 'bg-primary') . '">' . $row["full_time"] . '</span></h5>
                            <h6 class="card-subtitle mb-2 text-muted">' . $row["company_name"] . '</h6>
                            <!-- Part Time or Full Time Badge -->
                            <p class="card-text">' . $row["salary"] . $row["jobType"] . '</p>
                            <p class="card-text">' . $row["brief_info"] . '</p>
                        </div>
                        <!-- Center Column for Apply Button -->
                        <div class="d-flex justify-content-between align-items-center col-md-2">
                            <button type="button" class="btn btn-primary">Apply</button>
                        </div>
                        <!-- Right Column for Posted Time -->
                        <div class="d-flex justify-content-between align-items-center col-md-3">
                            <small class="text-muted">Posted ' . $row["posted_time"] . ' ago</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a>';
    }
} else {
    // Display a message if no jobs are found
    echo '<p>No jobs found.</p>';
}

// Close the database connection
$conn->close();
?>
