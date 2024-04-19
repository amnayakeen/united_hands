<?php 
require_once("connection.php");

// Function to view reports
function view_Reports($connection) {
    // SQL query to select all data from the project_report table
    $sql = "SELECT 
    project_id,
    name,
    project_type,
    CONCAT(
        ABS(TIMESTAMPDIFF(HOUR, Start_time, End_time)),
        ':',
        ABS(TIMESTAMPDIFF(MINUTE, Start_time, End_time)) % 60,
        ' hours'
    ) AS Volunteer_hours,
    no_of_volunteers_required,
    social_outcome
FROM 
    project;";
    // Execute the query
    $result = $connection->query($sql);

    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
        // Table header
        echo "<h1 style= 'margin-top:80px;'> Report </h1>
        <table class='table table-bordered border-dark margin-top-50px'>
                <thead class='table-dark'>
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Project Type</th>
                        <th>Volunteer Hours</th>
                        <th>Volunteers Participated</th>
                        <th>Social Outcome</th>
                    </tr>
                </thead>
                <tbody>";

        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["project_id"]. "</td>
                    <td>" . $row["name"]. "</td>
                    <td>" . $row["project_type"]. "</td>
                    <td>" . $row["Volunteer_hours"]. "</td>
                    <td>" . $row["no_of_volunteers_required"]. "</td>
                    <td>" . $row["social_outcome"]. "</td>  
                  </tr>";
        }

        // Close the table body and table
        echo "</tbody></table>";
    } else {
        // No records found
        echo "No reports found.";
    }
}

// Example usage:
// Call the viewReports function and pass the database connection object



?>

    
    