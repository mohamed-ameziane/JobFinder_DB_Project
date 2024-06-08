<?php
include("includes/dbConnect.php");

// Fetch the latest 20 jobs with company details, including jobType
$sql = "SELECT jobs_table.job_id, jobs_table.job_name, jobs_table.full_time, jobs_table.salary, jobs_table.posted_time, jobs_table.jobType, company.company_name, company.company_picture
        FROM jobs_table
        INNER JOIN company ON jobs_table.id_company = company.id_company
        ORDER BY jobs_table.posted_time DESC
        LIMIT 5";

// Execute the query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Calculate the time difference
        $postedTime = new DateTime($row["posted_time"]);
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

        // Output the job details as a Bootstrap card
        echo '
        <a href="job_information.php?id=' . $row["job_id"] . '" class="card m-md-5 p-1 job-card">
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
                            <h5 class="card-title">' . $row["job_name"]  . '     ' .'<span class="badge rounded-pill ' . ($row["full_time"] == "Full Time" ? 'bg-success' : 'bg-warning') . '">' . $row["full_time"] . '</span></h5>
                            <h6 class="card-subtitle mb-2 text-muted">' . $row["company_name"] .' - ' . (isset($row["jobType"]) ? $row["jobType"] : 'N/A') . '</h6> <!-- Update this line with check for "jobType" key -->
                            <!-- Part Time or Full Time Badge -->
                            <p class="card-text">' . $row["salary"] . ' MAD</p>
                        </div>
                        <!-- Center Column for Apply Button -->
                        <div class="d-flex justify-content-between align-items-center col-md-2">
                            <button type="button" class="btn btn-primary">Apply</button>
                        </div>
                        <!-- Right Column for Posted Time -->
                        <div class="d-flex justify-content-between align-items-center col-md-3">
                            <small class="text-muted">Posted ' . $elapsedTime . '</small>
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
