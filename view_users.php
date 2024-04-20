<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<?php
require_once("Components.php");
require_once("viewReports.php");
$code = new Components();
$starter_code = $code->dashboardStarterCode();
$header = $code->dashboardHeader();
$dashboardSidebar = $code->dashboardSidebar();
echo $starter_code;
echo $dashboardSidebar;
?>

<?php 
require_once("connection.php");

    $sql = "SELECT * FROM volunteer;";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        echo "<h1 style= 'margin-top:80px;'> Volunteers </h1>
        <table class='table table-bordered border-dark margin-top-50px'>
                <thead class='table-dark'>
                    <tr>
                        <th>Volunteer_id</th>
                        <th>User_id</th>
                        <th>Full name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["volunteer_id"]. "</td>
                    <td>" . $row["user_id"]. "</td>
                    <td>" . $row["fullname"]. "</td>          
                    <td>" . $row["contact"]. "</td>
                    <td>" . $row["email"]. "</td>
                    <td>
                    <form method='post' action='delete.php'>
                    <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                    <button type='submit' class='btn btn-danger' name='action' value='delete_user'>Delete</button>
                </form>
                </td>            
                  </tr>";
        }


        echo "</tbody></table>";
    } else {
        echo "No reports found.";
    }
?>
<?php

$sql = "SELECT * FROM organization;";
$result = $connection->query($sql);


    if ($result->num_rows > 0) {
        echo "<h1 style= 'margin-top:80px;'> Organizations </h1>
        <table class='table table-bordered border-dark margin-top-50px'>
                <thead class='table-dark'>
                    <tr>
                        <th>Organization_id</th>
                        <th>User_id</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Approval_status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";


while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>" . $row["organization_id"]. "</td>
            <td>" . $row["user_id"]. "</td>
            <td>" . $row["name"]. "</td>
            <td>" . $row["contact"]. "</td>          
            <td>" . $row["email"]. "</td>
            <td>" . $row["approval_status"]. "</td>
            <td>
                <form method='post' action='delete.php'>
                    <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                    <button type='submit' name='action' class='btn btn-danger' value='delete_organization'>Delete</button>
                </form>
            </td>
          </tr>";
}
 echo "</tbody></table>";
} else {
    echo "No reports found.";
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