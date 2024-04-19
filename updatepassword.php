<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are set
    if (isset($_POST["currentPassword"], $_POST["newPassword"], $_POST["confirmPassword"])) {
        // Establish database connection
        $servername = "localhost"; // Change if necessary
        $username = "root"; // Change to your database username
        $password = ""; // Change to your database password
        $dbname = "unitedhands"; //

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Retrieve user_id from session
        $userId = $_SESSION["user_id"];

        // Sanitize input data
        $currentPassword = mysqli_real_escape_string($conn, $_POST["currentPassword"]);
        $newPassword = mysqli_real_escape_string($conn, $_POST["newPassword"]);
        $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

        // Retrieve current password from the database
        $sql = "SELECT password FROM user WHERE user_id = '$userId'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row["password"];

            // Verify current password
            if ($currentPassword === $storedPassword) {
                // Check if new password matches the confirm password
                if ($newPassword === $confirmPassword) {
                    // Update password in the database
                    $updateSql = "UPDATE user SET password = '$newPassword' WHERE user_id = '$userId'";
                    if ($conn->query($updateSql) === TRUE) {
                        echo "Password updated successfully.";
                    } else {
                        echo "Error updating password: " . $conn->error;
                    }
                } else {
                    echo "New password and confirm password do not match.";
                }
            } else {
                echo "Incorrect current password.";
            }
        } else {
            echo "User not found.";
        }

        // Close connection
        $conn->close();
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}

?>
