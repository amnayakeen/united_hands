<?php
session_start();
$user_id=$_SESSION["user_id"];
require_once("Components.php");
require_once("User.php");
$user = new User();
$code = new Components();
$starter_code = $code->dashboardStarterCode();
?>
<head>
    <title>Volunteer Profile</title>
</head>
<body>
    <?php
        $header = $code->dashboardHeader();
        $sidebar = $code->dashboardSidebar();
    ?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">

                <?php
                    $view_profile =$user->viewProfile($user_id);

                    if(isset($_POST['edit'])){
                        $edit_profile =$user->editProfile($user_id);
                    }
                ?>
            </div>
        </div>
    </div>
</section>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                        crossorigin="anonymous"></script>
                <?php
                $footer = $code->footer();
                $end_code = $code->endCode();
                echo $footer;
                echo $end_code;
                ?>
</body>
</html>
