<?php

session_start();
$userId = $_SESSION["user_id"];
echo $userId;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields (you may add more validation)
    $project_type = htmlspecialchars($_POST["project_type"]);
    $name = htmlspecialchars($_POST["name"]);
    $address = htmlspecialchars($_POST["address"]);
    $startdate = htmlspecialchars($_POST["start_date"]);
    $enddate = htmlspecialchars($_POST["end_date"]);
    $start_time = htmlspecialchars($_POST["start_time"]);
    $end_time = htmlspecialchars($_POST["end_time"]);
    $qualification_required = htmlspecialchars($_POST["qualification_required"]);
    $social_outcome = htmlspecialchars($_POST["social_outcome"]);
    $no_of_volunteer_required = intval($_POST["no_of_volunteer_required"]); // Convert to integer

    // Database connection parameters
    $servername = "localhost"; // Change if necessary
    $username = "root"; // Change to your database username
    $password = ""; // Change to your database password
    $dbname = "unitedhands"; // Change to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
  

    // Fetch organization_id based on $userId
    $result=mysqli_query($conn,"SELECT organization_id FROM organization WHERE user_id='$userId'");
                    $rec=mysqli_fetch_assoc($result);
                    $organization_id=$rec['organization_id'];

    // SQL query to insert form data into database
    $sql = "INSERT INTO project (organization_id, project_type, name, address, start_date, end_date, start_time, end_time, qualification_required, social_outcome, no_of_volunteers_required)
            VALUES ('$organization_id', '$project_type', '$name', '$address', '$startdate', '$enddate', '$start_time', '$end_time', '$qualification_required', '$social_outcome', '$no_of_volunteer_required')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
