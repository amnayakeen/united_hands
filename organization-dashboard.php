<?php
    require_once("Components.php");
    $code = new Components();
    $starter_code = $code->dashboardStarterCode();
    $header = $code->dashboardHeader();
    $sidebar = $code->dashboardSidebar();
   


    echo $starter_code;
    echo("<head><title>Create Project</title></head>");
?>

<body>
<?php
        echo $header;
        echo $sidebar;
       
        ?>

        
   
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
        <h5 class="card-title">Create Project</h5>
        <p class="card-text">You can create a project.</p>
        <a href="create-project.php" class="btn btn-primary">Create </a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Create Community Gathering</h5>
        <p class="card-text">You can create a community gathering</p>
        <a href="create-community.php" class="btn btn-primary">Create</a>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Create Training Session</h5>
        <p class="card-text">You can create a training session</p>
        <a href="create-training.php" class="btn btn-primary">Create</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">My Project</h5>
        <p class="card-text">View your project details</p>
        <a href="myproject.php" class="btn btn-primary">My Project</a>
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
<?php
        $footer = $code->footer();
        $end_code = $code->endCode();
        echo $footer;
        echo $end_code;
    ?>

</body>

</html>