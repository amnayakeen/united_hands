<?php
require_once("connection.php");

// Function to view reports
function view_Reports($connection) {
    $user_id=$_SESSION["user_id"];

    $today_date= date('Y-m-d');
    $query=mysqli_query($connection,"SELECT * FROM project_registration WHERE user_id='$user_id'");
    $rec=mysqli_fetch_assoc($query);
    $nor=mysqli_num_rows($query);

    if($nor==0){
        echo "<div class='container my-3 p-4'><h2 class='my-3 p-4'>No Volunteered Projects</h2></div>";
    }
    else{
        echo("<h1 style= 'margin-top:80px;'> Volunteered Projects </h1>
        <table class='table table-bordered border-dark margin-top-50px'>
                <thead class='table-dark'>
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Project Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>");
        While($rec=mysqli_fetch_assoc($query)){
            $project_id=$rec['project_id']; //gets organization id to get organization name
            $project=mysqli_query($connection,"SELECT * FROM project WHERE project_id='$project_id'");
            $result=mysqli_fetch_assoc($project);
            echo("<tr>
            <td>" . $rec['project_id']. "</td>
            <td>" . $result['name']. "</td>
            <td>" . $result['project_type']. "</td>
            <td> status </td>
          </tr>");
        }
        echo("
        </tbody>
        </table>
        </div>
        </div>
        </div>");
    }









    //echo $user_id;
    // SQL query to select all data from the project_report table
    /*$query=mysqli_query($connection,"SELECT * FROM project_registration WHERE user_id='$user_id'");
    $rec=mysqli_fetch_assoc($query);
    $nor=mysqli_num_rows($query);
    if($nor==0){
        echo "<h1 style= 'margin-top:80px;'> You have not registered for any projects yet </h1>";
    }

    else{
        echo "<h1 style= 'margin-top:80px;'> Volunteered Projects </h1>
        <table class='table table-bordered border-dark margin-top-50px'>
                <thead class='table-dark'>
                    <tr>
                        <th>Project ID</th>
                        <th>Project Name</th>
                        <th>Project Type</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";
echo $nor;
$count=$nor;

        While($rec=mysqli_fetch_assoc($query)){
            $project_id=$rec['project_id'];
            $project=mysqli_query($connection,"SELECT * FROM project WHERE project_id='$project_id'");
            $project_result=mysqli_fetch_assoc($project);
            $date_today= date('Y-m-d');
            $status=" ";
            if($project_result['start_date']<$date_today && $project_result['end_date']<$date_today){
                $status="Completed";
            }
            else if($project_result['start_date']<$date_today && $project_result['end_date']>$date_today){
                $status="Ongoing";
            }
            else if($project_result['start_date']>$date_today){
                $status="Upcoming";
            }
            echo "<tr>
                    <td>" . $rec["project_id"]. "</td>
                    <td>" . $project_result["name"]. "</td>
                    <td>" . $project_result["project_type"]. "</td>
                    <td> $status </td>
                  </tr>";
                  $count=$count - 1;
        }
        // Close the table body and table
        echo "</tbody></table>";
    }*/

}

// Example usage:
// Call the viewReports function and pass the database connection object



?>
