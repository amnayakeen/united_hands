<?php
require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $id = $_POST['user_id'];
    $action = $_POST['action'];

    if ($action == 'delete_user') {
        // Delete from user table
        $deleteUserQuery = "DELETE FROM user WHERE user_id = '$id'";
        $deleteUserResult = mysqli_query($connection, $deleteUserQuery);

        if (!$deleteUserResult) {
            echo "Error deleting user: " . mysqli_error($connection);
            exit();
        }

        // Delete from volunteer table
        $deleteVolunteerQuery = "DELETE FROM volunteer WHERE user_id = '$id'";
        $deleteVolunteerResult = mysqli_query($connection, $deleteVolunteerQuery);

        if (!$deleteVolunteerResult) {
            echo "Error deleting volunteer: " . mysqli_error($connection);
            exit();
        }


        header("Location: view_users.php");
        exit();
    }
}
?>
<?php
if ($action == 'delete_organization') {
 // Delete from user table
 $deleteUserQuery = "DELETE FROM user WHERE user_id = '$id'";
 $deleteUserResult = mysqli_query($connection, $deleteUserQuery);

 if (!$deleteUserResult) {
     echo "Error deleting user: " . mysqli_error($connection);
     exit();
 }

    // Delete from organization table
    $deleteOrganizationQuery = "DELETE FROM organization WHERE user_id = '$id'";
    $deleteOrganizationResult = mysqli_query($connection, $deleteOrganizationQuery);

    if (!$deleteOrganizationResult) {
        echo "Error deleting organization: " . mysqli_error($connection);
        exit();
    }

  
    header("Location: view_users.php");
    exit();
}
?>