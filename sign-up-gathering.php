<?php
	require_once("User.php");
    require_once("Event.php");
	require_once("Components.php");
    $volunteer = new Volunteer();
    $training = new Training();
    $code = new Components();
    if(isset($_GET['get_id'])){
        $gathering_id = $_GET['get_id'];
        $user_id = $_GET['get_user_id'];
    }
    $query=mysqli_query($volunteer->conn,"SELECT * FROM community_gathering WHERE gathering_id='$gathering_id'");
    $rec=mysqli_fetch_assoc($query);
    $name=$rec['name'];

    $starter_code = $code->dashboardStarterCode();

?>
    <head>
        <title>Sign Up</title>
    </head>
    <body>

    <?php
        $header = $code->dashboardHeader();
        $sidebar = $code->dashboardSidebar();
    ?>

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-8">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-12 d-flex  justify-content-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                            <form id="eventForm" method="POST" autocomplete="off">

                                <div class="d-flex align-items-center mb-5 pb-1">
                                <i class="fas fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Sign Up for the Community Gathering</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="gathering_name" class="col-sm-2 col-form-label">Gathering Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="gathering_name" id="gathering_name" value="<?php echo $name ?>" disabled>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Are you signing up for this community gathering?</legend>
                                    <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="yesorno" id="yes" value="Yes" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Yes
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="yesorno" id="no" value="No">
                                        <label class="form-check-label" for="gridRadios2">
                                        No
                                        </label>
                                    </div>
                                    </div>
                                </fieldset>

                                <div class="pt-1 mb-4">
                                <button class="btn btn-outline-primary btn-lg btn-block" type="reset">Clear</button>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="signup">Sign Up</button>
                                </div>

                            </form>

                            <?php
                                if(isset($_POST['signup'])){
                                    $details=$volunteer->signupGathering($user_id, $gathering_id, $_POST['yesorno']);
                                }
                            ?>
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
</div>
</div>
</div>


    <?php

        $footer = $code->footer();
        $end_code = $code->endCode();
        echo $footer;
        echo $end_code;
    ?>


  </body>
  </html>
