<?php
session_start();
$userId = $_SESSION["user_id"];
echo $userId;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields (you may add more validation)
    $name = $_POST["name"];
    $address = $_POST["address"];
    $region = $_POST["region"];
    $startdate = $_POST["startdate"];
    $enddate = $_POST["enddate"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $description = $_POST["description"]; // Missing semicolon here

    // Validate input to prevent SQL injection (you may use prepared statements instead)
    $name = htmlspecialchars($name);
    $address = htmlspecialchars($address);
    $region = htmlspecialchars($region);
    $startdate = htmlspecialchars($startdate);
    $enddate = htmlspecialchars($enddate);
    $start_time = htmlspecialchars($start_time);
    $end_time = htmlspecialchars($end_time);
    $description = htmlspecialchars($description); // Missing semicolon here

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

    $result=mysqli_query($conn,"SELECT organization_id FROM organization WHERE user_id='$userId'");
    $rec=mysqli_fetch_assoc($result);
    $organization_id=$rec['organization_id'];

    // SQL query to insert form data into database
    $sql = "INSERT INTO community_gathering (organization_id,name, address, region, start_date, end_date, start_time, end_time, description)
            VALUES ('$organization_id','$name', '$address', '$region', '$startdate', '$enddate', '$start_time', '$end_time', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
