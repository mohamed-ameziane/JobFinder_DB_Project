<?php

// Connect to your database (replace with your actual database credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set default filter
$filter = "new";

// Change filter based on user selection
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}

// Set default keywords
$keywords = [];

// Change keywords based on user input
if (isset($_GET['keywords'])) {
    // Split the input string into an array of keywords
    $keywords = preg_split("/[\s,;]+/", $_GET['keywords']);
}

// Set default salary range
$minSalary = isset($_GET['min_salary']) ? $_GET['min_salary'] : 0;
$maxSalary = isset($_GET['max_salary']) ? $_GET['max_salary'] : PHP_INT_MAX;

// Fetch jobs based on the selected filter, keywords, and salary range
$sql = "";

switch ($filter) {
    case "high_salary":
        $sql = "SELECT j.*, c.company_name, c.company_picture 
                FROM jobs_table j, company c
                WHERE j.id_company = c.id_company
                AND j.salary BETWEEN $minSalary AND $maxSalary
                " . buildKeywordFilter($keywords) . "
                ORDER BY j.salary DESC";
        break;
    case "full_time":
        $sql = "SELECT j.*, c.company_name, c.company_picture 
                FROM jobs_table j, company c
                WHERE j.id_company = c.id_company
                AND j.full_time = 'Full Time'
                AND j.salary BETWEEN $minSalary AND $maxSalary
                " . buildKeywordFilter($keywords);
        break;
    case "part_time":
        $sql = "SELECT j.*, c.company_name, c.company_picture 
                FROM jobs_table j, company c
                WHERE j.id_company = c.id_company
                AND j.full_time = 'Part Time'
                AND j.salary BETWEEN $minSalary AND $maxSalary
                " . buildKeywordFilter($keywords);
        break;
    case "new":
    default:
        $sql = "SELECT j.*, c.company_name, c.company_picture 
                FROM jobs_table j, company c
                WHERE j.id_company = c.id_company
                AND j.salary BETWEEN $minSalary AND $maxSalary
                " . buildKeywordFilter($keywords) . "
                ORDER BY j.posted_time DESC";
        break;
}

$result = $conn->query($sql);

// Display each job as a Bootstrap card
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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
                            <p class="card-text">' . $row["salary"] . $row["jobType"] . '</p>
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
    if (empty($keywords)) {
        return ""; // Return an empty string if no keywords are provided
    }

    $keywordConditions = [];
    foreach ($keywords as $keyword) {
        $keywordConditions[] = "j.job_name LIKE '%$keyword%'";
    }

    return " AND (" . implode(" OR ", $keywordConditions) . ")";
}
?>
