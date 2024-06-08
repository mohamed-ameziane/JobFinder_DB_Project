<?php
include("includes/dbConnect.php");

// Fetch the latest 5 companies
$sql = "SELECT DISTINCT company.id_company, company.company_picture
        FROM company
        ORDER BY company.id_company DESC
        LIMIT 6";


// Execute the query
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    $cardCount = 0; // Variable to keep track of the number of cards
    while ($row = $result->fetch_assoc()) {
        // Output the company details as a Bootstrap card
        if ($cardCount % 3 == 0) {
            // Start a new row for every 3 cards
            echo '<div class="row justify-content-center">';
        }

        echo '
        <div class="col-md-4">
            <div class="card m-md-3 p-1 company-card" style="background-color: transparent;">
                <div class="row no-gutters">
                    <!-- Company Picture Column -->
                    <div class="col-md-12 d-flex align-items-center justify-content-center text-center">
                        <img style="width: 25%; object-fit: cover; border: none;" src="' . $row["company_picture"] . '" class="card-img" alt="">
                    </div>
                </div>
            </div>
        </div>
        
';
        if ($cardCount % 3 == 2 || $cardCount == $result->num_rows - 1) {
            // Close the row for every 3 cards or for the last card
            echo '</div>';
        }

        $cardCount++;
    }
} else {
    // Display a message if no companies are found
    echo '<p>No companies found.</p>';
}

// Close the database connection
$conn->close();
?>
