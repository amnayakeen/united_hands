<?php
    session_start();
    if(!isset($_SESSION["user_id"]))
    {
        header ("location:index.php");
    }
    $user_id = $_SESSION["user_id"];

    require "User.php";
    $user = new User();
    $volunteer = new Volunteer();

    if(isset($_POST["volRegistration"])){ //sends volunteer details to volunteerRegistration function in Volunteer class
        $date_today = date('Y-m-d');
        $age = round(((strtotime($date_today) - strtotime($_POST['dob']))/86400)/365);

        $check_availability = mysqli_query($user->conn,"SELECT * FROM volunteer WHERE user_id='$user_id'"); //checks if user ID already exists

        if (mysqli_num_rows($check_availability)>0){ //if user_id already exists doesn't allow to register
            echo("<script>alert('You are already registered.')</script>");
        }
        else if($age < 18){
            echo("<script>alert('You are younger than 18 years of age. You are not eligible to apply')</script>");
        }
        else{
            $target="Images/";
            $target = $target . basename( $_FILES['file']['name']) ;  // file name comes for upload form

            if(move_uploaded_file($_FILES['file']['tmp_name'], $target))
            {
                echo "<script>alert('The file ". basename( $_FILES['file']['name']). " has been uploaded')</script>";
            }
            else
            {
                echo "<script>alert('Error')</script>";
            }
            $fname=$_FILES['file']['name'];
            $tmpName= $_FILES['file']['tmp_name'];
            $fileSize=$_FILES['file']['size'];
            $fileType=$_FILES['file']['type'];

            $details = $volunteer->volunteerRegistration($user_id, $_POST['fullName'], $_POST['dob'], $fname, $_POST['contact'], $_POST['email'], $_POST['gender'], $_POST['volInterests'], $_POST['volAbilities'], $_POST['volTalents']);
        }
    }

    require_once("Components.php");
    $code = new Components();
    $starter_code = $code->starterCode();
    $header = $code->header();
    echo $starter_code;
    echo("<head><title>Volunteer Registration</title></head>");
?>

<body>
    <?php
        echo $header;
    ?>

    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-8">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-12 d-flex  justify-content-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                            <form method="POST" action="register-volunteer.php" autocomplete="off" enctype = "multipart/form-data">

                                <div class="d-flex align-items-center mb-5 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h2 fw-bold mb-0">Complete Your Registration as Volunteer</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="userId" class="col-sm-2 col-form-label">User ID</label>
                                    <div class="col-sm-10">
                                    <?php echo("<input type='text' class='form-control' name='userId' value=$user_id disabled>");?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fullName" class="col-sm-2 col-form-label">Full Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fullName" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="dob" class="col-sm-2 col-form-label">Date of birth</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" name="dob" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                    <input type="file" class="form-control" name="file" id="file" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contact" class="col-sm-2 col-form-label">Contact Number</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contact" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                    <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                                        <label class="form-check-label" for="gridRadios1">
                                        Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                                        <label class="form-check-label" for="gridRadios2">
                                        Female
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
                                        <label class="form-check-label" for="gridRadios3">
                                        Other
                                        </label>
                                    </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-3">
                                    <label for="volInterests[]" class="col-sm-2 col-form-label">Interests</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volInterests[]" value="Environmental causes">
                                            <label class="form-check-label" for="volInterests">Environmental causes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volInterests[]" value="Animal welfare">
                                            <label class="form-check-label" for="volInterests2">Animal welfare</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volInterests[]" value="Education">
                                            <label class="form-check-label" for="volInterests3">Education</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volInterests[]" value="Healthcare support">
                                            <label class="form-check-label" for="volInterests4">Healthcare support</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volInterests[]" value="Elderly care">
                                            <label class="form-check-label" for="volInterests5">Elderly care</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volInterests[]" value="Homlessness and poverty">
                                            <label class="form-check-label" for="volInterests6">Homlessness and poverty</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volInterests[]" value="Disaster relief and emergency">
                                            <label class="form-check-label" for="volInterests7">Disaster relief and emergency</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="volAbilities" class="col-sm-2 col-form-label">Abilities</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volAbilities[]" id="volAbilities1" value="Teaching">
                                            <label class="form-check-label" for="volAbilities1">Teaching</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volAbilities[]" id="volAbilities2" value="Event planning">
                                            <label class="form-check-label" for="volAbilities2">Event planning</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volAbilities[]" id="volAbilities3" value="Fundraising">
                                            <label class="form-check-label" for="volAbilities3">Fundraising</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volAbilities[]" id="volAbilities4" value="Graphic designing">
                                            <label class="form-check-label" for="volAbilities4">Graphic designing</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volAbilities[]" id="volAbilities5" value="Gardening">
                                            <label class="form-check-label" for="volAbilities5">Gardening</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volAbilities[]" id="volAbilities6" value="Construction">
                                            <label class="form-check-label" for="volAbilities6">Construction</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volAbilities[]" id="volAbilities7" value="Counselling">
                                            <label class="form-check-label" for="volAbilities7">Counselling</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="volTalents" class="col-sm-2 col-form-label">Talents</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volTalents[]" id="volTalents1" value="Public speaking">
                                            <label class="form-check-label" for="volTalents1">Public speaking</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volTalents[]" id="volTalents2" value="Musical performance">
                                            <label class="form-check-label" for="volTalents2">Musical performance</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volTalents[]" id="volTalents3" value="Crafting">
                                            <label class="form-check-label" for="volTalents3">Crafting</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volTalents[]" id="volTalents4" value="Photography">
                                            <label class="form-check-label" for="volTalents4">Photography</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volTalents[]" id="volTalents5" value="Cooking">
                                            <label class="form-check-label" for="volTalents5">Cooking</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volTalents[]" id="volTalents6" value="Sports coaching">
                                            <label class="form-check-label" for="volTalents6">Sports coaching</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="volTalents[]" id="volTalents7" value="Technology troubleshooting">
                                            <label class="form-check-label" for="volTalents7">Technology troubleshooting</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-1 mb-4">
                                <button class="btn btn-outline-primary btn-lg btn-block" type="reset">Clear</button>
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="volRegistration" id="volRegistration">Register</button> <!--directs to volunteer dashboard-->
                                </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        $footer= $code->footer();
        $end_code= $code->endCode();
        echo $footer;
        echo $end_code;
    ?>
</body>
</html>
