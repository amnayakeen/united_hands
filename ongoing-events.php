<?php
	require_once("Components.php");
    require_once("Event.php");
    $code = new Components();
    $project = new Project();
    $training = new Training();
    $gathering = new Gathering();
    $starter_code = $code->eventStarterCode();

?>
    <head>
        <title>Upcoming Events</title>
    </head>
    <body>

    <?php
        $header = $code->dashboardHeader();
        $sidebar = $code->dashboardSidebar();
    ?>

<div class="container my-5 p-5 container-width">
            <nav>
                <form method="POST">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-project-tab" data-bs-toggle="tab" data-bs-target="#nav-project"
                    type="button" role="tab" aria-controls="nav-project" aria-selected="true">Project</button>

                    <button class="nav-link" id="nav-training-tab" data-bs-toggle="tab" data-bs-target="#nav-training"
                    type="button" role="tab" aria-controls="nav-training" aria-selected="true">Training</button>

                    <button class="nav-link" id="nav-gathering-tab" data-bs-toggle="tab" data-bs-target="#nav-gathering"
                    type="button" role="tab" aria-controls="nav-gathering" aria-selected="true">Community Gathering</button>
                </div>
                </form>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show show-custom active p-3" id="nav-project" role="tabpanel" aria-labelledby="nav-project-tab">
                        <?php
                            $display_projects = $project->displayOngoingProjects();
                        ?>
                    </div>

                    <div class="tab-pane fade show-custom p-3" id="nav-training" role="tabpanel" aria-labelledby="nav-training-tab">
                        <?php
                            $display_trainings = $training->displayOngoingTrainings();
                        ?>
                    </div>
                    <div class="tab-pane fade show-custom p-3" id="nav-gathering" role="tabpanel" aria-labelledby="nav-gathering-tab">
                        <?php
                            $display_gatherings = $gathering->displayOngoingGatherings();
                        ?>
                    </div>
                </div>
            </nav>
        </div>

    <?php

        $footer = $code->footer();
        $end_code = $code->endCode();
    ?>


  </body>
  </html>
