<?php
    require_once("Components.php");
    $code = new Components();
    $starter_code = $code->dashboardStarterCode();
    $header = $code->dashboardHeader();
    $sidebar = $code->dashboardSidebar();



    echo $starter_code;
    echo("<head><title>Create PCommunity Gathering</title></head>");
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

      </div>
    </div>
    <form action="submitcommunitygathering.php" method="post">
    <div class="card w-75 mb-3">
  <div class="card-body">
    <h2 style="text-align:center;" >Create A Community Gathering</h2>
    <hr>

    <div class="input-group mb-3">

</div>

    <div class="mb-3 row">
    <label for="projectname" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="projectname" name="name">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="projectaddress" class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="projectaddress" name="address">
    </div>
  </div>
  <div class="row mb-3">
    <label for="region" class="col-sm-2 col-form-label">Region</label>
    <div class="col-sm-10">
      <select name="region" class="form-select"  required>
        <option value="">Choose...</option>
        <option value="Northern">Northern</option>
        <option value="Southern">Southern</option>
        <option value="Central">Central</option>
        <option value="Western">Western</option>
        <option value="Eastern">Eastern</option>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="projectstartdate" class="col-sm-2 col-form-label">Satrt Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="projectstartdate" name="startdate">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="projectenddate" class="col-sm-2 col-form-label">End Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="projectenddate" name="enddate">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="startingtime" class="col-sm-2 col-form-label">Starting Time</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="startingtime" name="start_time">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="finishingtime" class="col-sm-2 col-form-label">Finishing Time</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="finishingtime" name="end_time">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="description" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description" name="description">
    </div>
  </div>


  <div class="d-grid gap-2 col-6 mx-auto">
  <button class="btn btn-primary" type="submit">Submit</button>

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
