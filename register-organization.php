<?php
    session_start();
    if(!isset($_SESSION["user_id"]))
    {
        header ("location:index.php");
    }
    $user_id = $_SESSION["user_id"];

    require "User.php";
    $user = new User();
    $organization = new Organization();

    if(isset($_POST["orgRegistration"])){ //sends volunteer details to volunteerRegistration function in Volunteer class
        $check_availability = mysqli_query($user->conn,"SELECT * FROM organization WHERE user_id='$user_id'"); //checks if user ID already exists

        if (mysqli_num_rows($check_availability)>0){ //if user_id already exists doesn't allow to register
            echo("<script>alert('Looks like you are already registered. If you have not yet received the approval mail, please be patient. You will soon receive it')</script>");
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

            $details = $organization->organizationRegistration($user_id, $_POST['name'], $fname, $_POST['contact'], $_POST['address'], $_POST['email'], $_POST['type'], $_POST['regNumber'], $_POST['noOfYears'], $_POST['website']);
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

                            <form method="POST" autocomplete="off" enctype = "multipart/form-data">

                            <div class="d-flex align-items-center mb-5 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h2 fw-bold mb-0">Complete Your Registration as Organization</span>
                                </div>
                                <div class="d-flex align-items-center mb-5 pb-1">
                                <i class="fas fa-cubes fa-2x me-3"></i>
                                <h6>Please note that once you register the admin will have to approve your ogranization. Once it has been approved you will be notified through mail. This procedure will take 2-3 working days.</h6>
                                </div>

                                <div class="row mb-3">
                                    <label for="userId" class="col-sm-2 col-form-label">User ID</label>
                                    <div class="col-sm-10">
                                    <?php echo("<input type='text' class='form-control' name='userId' value=$user_id disabled>");?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Organization Name</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Organization Logo</label>
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
                                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="type" class="col-sm-2 col-form-label">Type</label>
                                    <div class="col-sm-10">
                                        <select name="type" class="form-select"  required>
                                        <option value="">Choose...</option>
                                        <option value="nonprofit">Non-profit</option>
                                        <option value="charity">Charity</option>
                                        <option value="legalEntity">Legal entity</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="regNumber" class="col-sm-2 col-form-label">Registration Number</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="regNumber" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contact" class="col-sm-2 col-form-label">Number of Years in Operation</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="noOfYears" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="website" class="col-sm-2 col-form-label">Website URL (if available)</label>
                                    <div class="col-sm-10">
                                    <input type="url" class="form-control" name="website" optional>
                                    </div>
                                </div>


                                <div class="pt-1 mb-4">
                                <button class="btn btn-outline-primary btn-lg btn-block" type="reset">Clear</button>
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="orgRegistration" id="orgRegistration">Register</button> <!--directs to registration complete page-->
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
