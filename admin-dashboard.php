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
$code = new Components();
$starter_code = $code->dashboardStarterCode();
$header = $code->dashboardHeader();
$dashboardSidebar = $code->dashboardSidebar();
echo $starter_code;
echo("<head><title>signup</title></head>");
echo $dashboardSidebar;
?>

    <title>Home page</title>
  </head>
  <body>
    <h1 style= "margin-top:80px;">Welcome Admin</h1>
    <section style="background-color: #eee;">
  <div class="container py-3">
    <div class="row">
      <div class="col">
      
   
    <div class="card w-75 mb-3">
  <div class="card-body">
    <h2 style="text-align:center;" >Dashboard</h2>
    <hr>
    
    <div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Approve Organizations</h5>
        <p class="card-text">Manage approval status of new organizations</p>
        <a href="admin_approval.php" class="btn btn-primary">select </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Manage Users</h5>
        <p class="card-text">Delete the users</p>
        <a href="view_users.php" class="btn btn-primary">select</a>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">View Reports</h5>
        <p class="card-text">View the reports of the project details</p>
        <a href="reports.php" class="btn btn-primary">select</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Upcoming Events</h5>
        <p class="card-text">View upcoming event details</p>
        <a href="upcoming-events.php" class="btn btn-primary">select</a>
      </div>
    </div>
  </div>
</div>
</div>

  </div>
</div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>