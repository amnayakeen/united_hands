<?php
	require_once("Components.php");
    require_once("Event.php");
    $code = new Components();
    $project = new Project();
    $starter_code = $code->dashboardStarterCode();

?>
    <head>
        <title>Rate & Review</title>
    </head>
    <body>

    <?php
        $header = $code->dashboardHeader();
        $sidebar = $code->dashboardSidebar();
    ?>

        <div class="container my-5 p-5 container-width">
            <div class="box-container">
                <?php
                    $display_projects= $project->displayCompletedProjects();
                ?>
            </div>
        </div>

    <?php
        $footer = $code->footer();
        $end_code = $code->endCode();
    ?>


  </body>
  </html>
