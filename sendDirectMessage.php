<?php
require_once("User.php");
$config = new User();

session_start();

if(isset($_POST['recipient']) && isset($_POST['msg'])) {
    $sender_id = $_SESSION['user_id'];
    $sender_name = $_SESSION['name'];
    $recipient = $_POST['recipient'];
    $message = $_POST['msg'];

    // Fetch recipient details from the user table
    $recipient_query = mysqli_query($config->conn, "SELECT * FROM user WHERE 'name' = '$recipient' OR email = '$recipient'");
    if(mysqli_num_rows($recipient_query) > 0) {
        $recipient_row = mysqli_fetch_assoc($recipient_query);
        $receiver_id = $recipient_row['user_id'];
        $receiver_name = $recipient_row['name'];

        // Insert the message into the direct_messages table
        $insert_query = "INSERT INTO direct_messages (sender_id, sender_name, receiver_id, receiver_name, message, timestamp) VALUES ('$sender_id', '$sender_name', '$receiver_id', '$receiver_name', '$message', NOW())";
        if(mysqli_query($config->conn, $insert_query)) {
            echo "Message sent successfully!";
        } else {
            echo "Error sending message: " . mysqli_error($config->conn);
        }
    } else {
        echo "Recipient not found!";
    }
} else {
    echo "Invalid request!";
}
?>
