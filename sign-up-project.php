<?php
	require_once("User.php");
    require_once("Event.php");
	require_once("Components.php");
    $volunteer = new Volunteer();
    $training = new Training();
    $code = new Components();
    if(isset($_GET['get_id'])){
        $project_id = $_GET['get_id'];
        $user_id = $_GET['get_user_id'];
        $_SESSION["project_id"]=$project_id;
        $_SESSION["user_id"]=$user_id;
    }
    $query=mysqli_query($volunteer->conn,"SELECT * FROM project WHERE project_id='$project_id'");
    $rec=mysqli_fetch_assoc($query);
    $name=$rec['name'];
    if($rec['qualification_required']==""){
        $qualification="None";
    }
    else{
        $qualification=$rec['qualification_required'];
    }

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

                            <form method="POST" autocomplete="off" enctype = "multipart/form-data">

                                <div class="d-flex align-items-center mb-5 pb-1">
                                <i class="fas fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Sign Up for the Project</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="project_name" class="col-sm-2 col-form-label">Project Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="project_name" id="project_name" value="<?php echo $name ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="dob" class="col-sm-2 col-form-label">Required Qualification</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="end_date" id="end_date" value="<?php echo $qualification ?>" disabled>
                                    </div>
                                </div>

                                <?php
                                    if($rec['qualification_required']==""){

                                    }
                                    else{
                                        echo('<div class="row mb-3">
                                        <label for="file" class="col-sm-2 col-form-label">Qualification Proof</label>
                                        <div class="col-sm-10">
                                        <input type="file" class="form-control" name="file" id="file" required>
                                        </div>
                                    </div>');
                                    }
                                ?>
                                <div class="row mb-3">
                                    <label for="pcc" class="col-sm-2 col-form-label">Police Clearance Certificate</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="pcc" id="pcc" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="issued_ate" class="col-sm-2 col-form-label">Issued Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="issued_date" required>
                                    </div>
                                    <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="expiry_date" required>
                                    </div>
                                </div>

                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Are you signing up for this volunteer project?</legend>
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
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="signup">Signup</button>
                                </div>

                            </form>
                            <?php
                                if(isset($_POST['signup'])){
                                    $check_availability = mysqli_query($volunteer->conn,"SELECT * FROM project_registration WHERE user_id='$user_id' AND project_id='$project_id'"); //checks if user id and project id combo already exists
                                    $issued_date=$_POST['issued_date'];
                                    $expiry_date=$_POST['expiry_date'];
                                    $date_today = date('Y-m-d');
                                    $number_of_days = round((strtotime($expiry_date) - strtotime($date_today))/86400);

                                    $fetch = mysqli_query($volunteer->conn,"SELECT * FROM project WHERE project_id='$project_id'");
                                    $result_no_of_volunteers=mysqli_fetch_assoc($fetch);
                                    $volunteers_required=$result_no_of_volunteers['no_of_volunteers_required'];
                                    $registered=mysqli_query($volunteer->conn,"SELECT no_of_volunteers_required FROM project WHERE project_id='$project_id'");
                                    $nor=mysqli_num_rows($registered);

                                    if($nor==$volunteers_required){
                                        echo("<script>alert('Sorry, volunteer limit exceeded')</script>");
                                    }

                                    else if (mysqli_num_rows($check_availability)>0){ //user can't sign up if combo already exists
                                        echo("<script>alert('You have already signed up for the volunteer project')</script>");
                                    }
                                    else if($number_of_days>0 && $number_of_days<30){
                                        echo("<script>alert('Your PCC is Invalid or renewal date is near. Please register after renewing your PCC')</script>");
                                    }
                                    else if($number_of_days<0){
                                        echo("<script>alert('Your PCC is Invalid.Please register after renewing your PCC')</script>");
                                    }
                                    else{
                                        if($rec['qualification_required']==""){
                                            $target="Images/";
                                             // file name comes for upload form
                                            $target = $target . basename( $_FILES['pcc']['name']) ;

                                            if(move_uploaded_file($_FILES['pcc']['tmp_name'], $target))
                                            {
                                                echo "<script>alert('The file ". basename( $_FILES['pcc']['name']). " has been uploaded')</script>";
                                                $fname=" ";

                                                $filename=$_FILES['pcc']['name'];
                                                $tmpNamee= $_FILES['pcc']['tmp_name'];
                                                $fileSizee=$_FILES['pcc']['size'];
                                                $fileTypee=$_FILES['pcc']['type'];

                                                $details=$volunteer->signupProject($user_id, $project_id, $fname, $filename, $issued_date, $expiry_date, $_POST['yesorno']);

                                            }
                                            else
                                            {
                                                echo "<script>alert('Error')</script>";
                                            }
                                        }
                                        else{
                                            $target="Images/";
                                            $target = $target . basename( $_FILES['file']['name']) ;  // file name comes for upload form
                                            $target = $target . basename( $_FILES['pcc']['name']) ;

                                            if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
                                            {
                                                echo "<script>alert('The file ". basename( $_FILES['file']['name']). " has been uploaded')</script>";
                                                $fname=$_FILES['file']['name'];
                                                $tmpName= $_FILES['file']['tmp_name'];
                                                $fileSize=$_FILES['file']['size'];
                                                $fileType=$_FILES['file']['type'];

                                                $filename=$_FILES['pcc']['name'];
                                                $tmpNamee= $_FILES['pcc']['tmp_name'];
                                                $fileSizee=$_FILES['pcc']['size'];
                                                $fileTypee=$_FILES['pcc']['type'];

                                                $details=$volunteer->signupProject($user_id, $project_id, $fname, $filename, $issued_date, $expiry_date, $_POST['yesorno']);

                                            }
                                            else
                                            {
                                                echo "<script>alert('Error')</script>";
                                            }
                                        }
                                    }
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
    ?>


  </body>
  </html>
