<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unitedhands";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $registration_number = $_POST['registration_no'];
    $type = $_POST['type'];
    $no_of_years = $_POST['no_of_years'];
    $website = $_POST['website'];
   

    // Retrieve user ID from the database
    $sql_id = "SELECT user_id FROM organization";
    $result_id = $conn->query($sql_id);

    if ($result_id->num_rows > 0) {
        $row_id = $result_id->fetch_assoc();
        $user_id = $row_id['user_id'];

        // Prepare SQL statement to update user profile
        $sql_update = "UPDATE organization SET name=?, email=?, address=?, registration_no=?, type=?, no_of_years=?, website=?  WHERE user_id=?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("sssssisi", $name, $email, $address, $registration_number,$type,$no_of_years,$website, $user_id);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "User profile updated successfully";
        } else {
            echo "Error updating user profile: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "No user found in the database";
    }

    // Close result set
    $result_id->close();
}

// Close connection
$conn->close();
?>
