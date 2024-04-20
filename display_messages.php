<?php
session_start();

require_once("User.php"); // Assuming User.php contains the database connection and any necessary functions

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the user's ID from the session
$user_id = $_SESSION['user_id'];

// Retrieve messages received by the user from the direct_messages table
$sql = "SELECT dm.message_id, dm.sender_id, u.name AS sender_name, dm.message, dm.timestamp
        FROM direct_messages AS dm
        INNER JOIN user AS u ON dm.sender_id = u.user_id
        WHERE dm.receiver_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Display the received messages
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>From:</strong> " . $row['sender_name'] . "</p>";
        echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
        echo "<p><strong>Timestamp:</strong> " . $row['timestamp'] . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No messages received.</p>";
}

$stmt->close();
$conn->close();
?>
