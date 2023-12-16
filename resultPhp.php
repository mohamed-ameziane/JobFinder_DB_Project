<?php

// Connect to your database (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set default filter
// Set default keywords
$keywords = isset($_GET['keywords']) ? preg_split("/[\s,;]+/", $_GET['keywords']) : [];

// Set default salary range
$minSalary = isset($_GET['min_salary']) ? $_GET['min_salary'] : 0;
$maxSalary = isset($_GET['max_salary']) ? $_GET['max_salary'] : PHP_INT_MAX;

// Check if either min or max salary is null, then fetch from the database
if ($minSalary == "") {
    $minSalary = $conn->query("SELECT MIN(salary) FROM jobs_table")->fetch_array()[0];
}
if ($maxSalary == "") {
    $maxSalary = $conn->query("SELECT MAX(salary) FROM jobs_table")->fetch_array()[0];
}
$sql = "";
$orderBy = " ORDER BY j.posted_time DESC";

$commonQuery = "SELECT j.*, c.company_name, c.company_picture 
               FROM jobs_table j
               INNER JOIN company c ON j.id_company = c.id_company
               WHERE j.salary BETWEEN $minSalary AND $maxSalary ";

if (isset($_GET['filter'])) {
    switch ($_GET['filter']) {
        case "high_salary":
            $orderBy = " ORDER BY j.salary DESC";
            break;
        case "full_time":
            $commonQuery .= (strpos($commonQuery, 'WHERE') !== false ? " AND " : " WHERE") . " j.full_time = 'Full Time'";
            break;
        case "part_time":
            $commonQuery .= (strpos($commonQuery, 'WHERE') !== false ? " AND " : " WHERE") . " j.full_time = 'Part Time'";
            break;

    }
}

$sql = $commonQuery . $orderBy;
$result = $conn->query($sql);



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
                            <h5 class="card-title">' . $row["job_name"] . '<span class="badge rounded-pill ' . ($row["full_time"] == "Full Time" ? 'bg-success' : 'bg-warning') . '">' . $row["full_time"] . '</span></h5>
                            <h6 class="card-subtitle mb-2 text-muted">' . $row["company_name"] . '</h6>
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

/**
 * Helper function to build the keyword filter for SQL query
 *
 * @param array $keywords
 * @return string
 */
function buildKeywordFilter($keywords) {
    $keywordConditions = [];

    foreach ($keywords as $keyword) {
        $keywordConditions[] = "j.job_name LIKE '%$keyword%'";
    }

    // Check if any keyword conditions are generated
    if (!empty($keywordConditions)) {
        return " AND (" . implode(" OR ", $keywordConditions) . ")";
    }

    // Return an empty string if no keywords are provided
    return "";
}


?>
