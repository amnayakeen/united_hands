<?php
    require_once("Components.php");
    $code = new Components();
    $starter_code = $code->dashboardStarterCode();
    $header = $code->dashboardHeader();
    $sidebar = $code->dashboardSidebar();
   


    echo $starter_code;
    echo("<head><title>Edit Profile</title></head>");
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
    <form action="updateprofile.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($organization['name']) ? $organization['name'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($organization['email']) ? $organization['email'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($organization['address']) ? $organization['address'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="registration_no" class="form-label">Registration Number</label>
                        <input type="text" class="form-control" id="registration_no" name="registration_no" value="<?php echo isset($organization['registration_no']) ? $organization['registration_no'] : ''; ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="type" name="type" value="<?php echo isset($organization['type']) ? $organization['type'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="no_of_years" class="form-label">Number of Years</label>
                        <input type="text" class="form-control" id="no_of_years" name="no_of_years" value="<?php echo isset($organization['no_of_years']) ? $organization['no_of_years'] : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="<?php echo isset($organization['website']) ? $organization['website'] : ''; ?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
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