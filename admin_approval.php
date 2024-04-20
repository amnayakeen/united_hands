<!DOCTYPE html>
<html lang="en">
<head>

<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Approval</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <?php
require_once("Components.php");
$code = new Components();
$starter_code = $code->dashboardStarterCode();
$header = $code->dashboardHeader();
$dashboardSidebar = $code->dashboardSidebar();
echo $starter_code;
echo("<head><title>signup</title></head>");
echo $dashboardSidebar;
?>

</head>
<body>
    <h1 style= "margin-top:80px;">Pending Organization Registrations</h1>
    <table id="organizationTable">
        <!-- Table content will be populated dynamically -->
    </table>

    <script>
        $(document).ready(function() {
            // Load pending organizations on page load
            loadPendingOrganizations();

            // Approve organization
            $(document).on('click', '.approveBtn', function() {
                var orgId = $(this).data('orgid');
                approveOrganization(orgId);
            });

            // Reject organization
            $(document).on('click', '.rejectBtn', function() {
                var orgId = $(this).data('orgid');
                rejectOrganization(orgId);
            });
        });

        // Function to load pending organizations
        function loadPendingOrganizations() {
            $.ajax({
                url: 'get_pending_organizations.php',
                type: 'GET',
                success: function(response) {
                    $('#organizationTable').html(response);
                }
            });
        }

        // Function to approve organization
        function approveOrganization(orgId) {
            $.ajax({
                url: 'approve_organization.php',
                type: 'POST',
                data: { orgId: orgId },
                success: function(response) {
                    alert(response);
                    loadPendingOrganizations(); // Refresh organization list
                }
            });
        }

        // Function to reject organization
        function rejectOrganization(orgId) {
            $.ajax({
                url: 'reject_organization.php',
                type: 'POST',
                data: { orgId: orgId },
                success: function(response) {
                    alert(response);
                    loadPendingOrganizations(); // Refresh organization list
                }
            });
        }
    </script>



<?php
// Include database connection file
require_once 'connection.php';

// Fetch pending organizations from the database
$query = "SELECT * FROM organization WHERE approval_status = 'pending' ORDER BY organization_id ASC";
$result = mysqli_query($connection, $query);

echo "<h1> </h1>
        <table class='table table-bordered border-dark margin-top-50px'>
                <thead class='table-dark'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";

if (mysqli_num_rows($result) > 0) {
    // Generate HTML for table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['organization_id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['address']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>
                <button class='approveBtn btn btn-success' data-orgid='{$row['organization_id']}'>Approve</button>
                <button class='rejectBtn btn btn-danger' data-orgid='{$row['organization_id']}'>Reject</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No pending organizations found</td></tr>";
}
?>

 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    </body>
</html>




