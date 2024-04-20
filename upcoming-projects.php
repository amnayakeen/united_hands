<?php
	require_once("Components.php");
    require_once("Event.php");
    $code = new Components();
    $project = new Project();
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
                <form action="action.php" method="POST">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-project-tab" data-bs-toggle="tab" data-bs-target="#nav-project"
                    type="submit" role="tab" aria-controls="nav-project" aria-selected="true" name="project">Project</button>

                    <button class="nav-link" id="nav-training-tab" data-bs-toggle="tab" data-bs-target="#nav-training"
                    type="submit" role="tab" aria-controls="nav-training" aria-selected="true" name="training">Training</button>

                    <button class="nav-link" id="nav-gathering-tab" data-bs-toggle="tab" data-bs-target="#nav-gathering"
                    type="submit" role="tab" aria-controls="nav-gathering" aria-selected="true" name="gathering">Community Gathering</button>
                </div>
                </form>


                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show show-custom active p-3" id="nav-project" role="tabpanel" aria-labelledby="nav-project-tab">
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"  role="search" method="GET">
                            <!--<div class="row mb-3">
                                <div class="col-11">
                                    <input type="search" class="form-control" placeholder="Search..." name="search" aria-label="Search">
                                </div>
                            </div>-->
                            <div class="row mb-3">
                                <label><i class='bx bx-filter-alt nav_icon'></i>Filters</label>
                            </div>
                            <div class="row mb-1">
                                <label for="time[]" class="col-2 col-form-label">Time</label>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="time[]" value="08:00 - 10:00">
                                        <label class="form-check-label" for="time1">08:00 - 10:00</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="time[]" value="10:00 - 12:00">
                                        <label class="form-check-label" for="time2">10:00 - 12:00</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="time[]" value="12:00 -  14:00">
                                        <label class="form-check-label" for="time3">12:00 -  14:00</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="time[]" value="14:00 - 16:00">
                                        <label class="form-check-label" for="time4">14:00 - 16:00</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="time[]" value="16:00 -  18:00">
                                        <label class="form-check-label" for="time5">16:00 -  18:00</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="time[]" value="18:00 - 20:00">
                                        <label class="form-check-label" for="time6">18:00 - 20:00</label>
                                    </div>
                                </div>
                                <label for="type[]" class="col-2 col-form-label">Type</label>
                                <div class="col-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="type[]" value="One time">
                                        <label class="form-check-label" for="type1">One time</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="type[]" value="Long term">
                                        <label class="form-check-label" for="type2">Long term</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="region[]" class="col-2 col-form-label">Region</label>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="region[]" value="Northern">
                                        <label class="form-check-label" for="region1">Northern</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="region[]" value="Western">
                                        <label class="form-check-label" for="region2">Western</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="region[]" value="Eastern">
                                        <label class="form-check-label" for="region3">Eastern</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="region[]" value="Southern">
                                        <label class="form-check-label" for="region4">Southern</label>
                                    </div>
                                </div>
                                <label for="objectives[]" class="col-2 col-form-label">Objectives</label>
                                <div class="col-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="objectives[]" value="Cleaning">
                                        <label class="form-check-label" for="objectives1">Cleaning</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="objectives[]" value="Building">
                                        <label class="form-check-label" for="objectives2">Building</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="objectives[]" value="Animal rescue">
                                        <label class="form-check-label" for="objectives6">Animal rescue</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="obectives[]" value="Teaching">
                                        <label class="form-check-label" for="objectives3">Teaching</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="objectives[]" value="Elderly Care">
                                        <label class="form-check-label" for="objectives4">Elderly Care</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="objectives[]" value="Food distribution">
                                        <label class="form-check-label" for="objectives5">Food distribution</label>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary" name="project_search">Search</button>
                                </div>
                            </div>
                        </form>

                        <?php
                            $display_projects = $project->displayUpcomingProjects();
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
