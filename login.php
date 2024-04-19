<?php
    session_start();
    unset($_SESSION["user_id"]);
    session_destroy();
    require_once("User.php");
	require_once("Components.php");
    $user = new User();
    $code = new Components();

    if(isset($_POST['login'])){
        $login_details=$user->login($_POST['email'], $_POST['password']);
    }

    $starter_code = $code->starterCode();
    echo("<head><title>Login</title></head>");

?>

    <body>


        <?php
            $header = $code->header();
        ?>


        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-8">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                    <div class="col-md-12 col-lg-12 d-flex  justify-content-center">
                        <div class="card-body p-4  text-black">

                        <form method="POST" autocomplete="off">

                            <div class="d-flex align-items-center mb-5 pb-1">
                            <i class="fas fa-cubes fa-2x me-3"></i>
                            <span class="h1 fw-bold mb-0">Sign in to your account</span>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="pt-1 mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
                            </div>

                            <a class="small text-muted" href="">Forgot password?</a>
                            <p style="color: #393f81;">Don't have an account? <a href="register.php"
                                style="color: #393f81;">Register here</a></p>
                            <a href="#!" class="small text-muted">Terms of use.</a>
                            <a href="#!" class="small text-muted">Privacy policy</a>
                        </form>

                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>


        <?php
            ob_flush();
            $footer = $code->footer();
            $end_code = $code->endCode();
        ?>

  </body>
  </html>
