<?php
    session_start();
    unset($_SESSION["user_id"]);
    session_destroy();
    require "User.php";
    $user = new User();

    if(isset($_POST["nextRegistration"])){ //sends user details to userRegistration function in User class
        $details = $user->userRegistration($_POST['regEmail'], $_POST['regPassword'], $_POST['confirmPassword'], $_POST['userType']);
    }

    require_once("Components.php");
    $code = new Components();
    $starter_code = $code->starterCode();
    $header = $code->header();
    echo $starter_code;
    echo("<head><title>Register</title></head>");
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

                            <form method="POST" action="" autocomplete="off">

                                <div class="d-flex align-items-center mb-5 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h1 fw-bold mb-0">Register to United Hands</span>
                                </div>

                                <div class="row mb-3">
                                    <label for="regEmail" class="col-sm-2 col-form-label">Email Address</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" name="regEmail" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="regPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="regPassword" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name="confirmPassword" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="userType" class="col-sm-2 col-form-label">Who are you</label>
                                    <div class="col-sm-10">
                                        <select name="userType" class="form-select"  required>
                                        <option value="">Choose...</option>
                                        <option value="volunteer">Volunteer</option>
                                        <option value="organization">Organization</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="pt-1 mb-4">
                                <button class="btn btn-outline-primary btn-lg btn-block" type="reset">Clear</button>
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="nextRegistration" id="nextRegistration">Next</button> <!--directs user to volunteer/organization register page depending on type of user-->
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
