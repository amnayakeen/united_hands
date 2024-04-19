<?php

	require_once("User.php");
    require_once("Event.php");
    require_once("Review.php");
	require_once("Components.php");
    $volunteer = new Volunteer();
    $organization = new Organization();
    $project = new Project();
    $review = new Review();
    $code = new Components();
    $starter_code = $code->dashboardStarterCode();


    if(isset($_GET['get_id'])){
        $project_id = $_GET['get_id'];
        $user_id = $_GET['get_user_id'];
        $_SESSION["project_id"]=$project_id;
        $_SESSION["user_id"]=$user_id;
    }



?>

<head>
        <title>Rate & Review</title>
    </head>
    <body>

    <?php
        $header = $code->dashboardHeader();
        $sidebar = $code->dashboardSidebar();
    ?>
<section>
    <div class="container my-4 p-5">
        <div class="card">
            <?php
                $view=$review->viewReviews($project_id, $user_id);
                if(isset($_POST['add_review'])){
                    $add=$review->addReview($project_id, $user_id, $_POST['review'], $_POST['rating']);
                }
                /*else if(isset($_POST['delete_review'])){
                    $delete=$review->deleteReview($review_id, $user_Id);
                }*/
            ?>

        </div>
    </div>
</section>
<?php

$footer = $code->footer();
$end_code = $code->endCode();
?>


</body>
</html>
