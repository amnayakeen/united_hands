<?php
// Include database connection file
require_once 'connection.php';

// Check if orgId is set and not empty
if (isset($_POST['orgId']) && !empty($_POST['orgId'])) {
    $orgId = $_POST['orgId'];

    // Update organization status to 'approved'
    $query = "UPDATE organization SET approval_status = 'approved' WHERE organization_id = '$orgId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Organization approved successfully";
    } else {
        echo "Failed to approve organization";
    }
} else {
    echo "Organization ID is not set";
}
?>
