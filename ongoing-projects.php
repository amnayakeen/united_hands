<?php
	require_once("Components.php");
    require_once("Event.php");
    $code = new Components();
    $event = new Event();
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
                    type="submit" role="tab" aria-controls="nav-project" aria-selected="true" name="ongoing-project">Project</button>

                    <button class="nav-link" id="nav-training-tab" data-bs-toggle="tab" data-bs-target="#nav-training"
                    type="submit" role="tab" aria-controls="nav-training" aria-selected="true" name="ongoing-training">Training</button>

                    <button class="nav-link" id="nav-gathering-tab" data-bs-toggle="tab" data-bs-target="#nav-gathering"
                    type="submit" role="tab" aria-controls="nav-gathering" aria-selected="true" name="ongoing-gathering">Community Gathering</button>
                </div>
                </form>


                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show show-custom active p-3" id="nav-project" role="tabpanel" aria-labelledby="nav-project-tab">
                        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"  role="search" method="POST">
                            <!--<div class="row mb-3">
                                <div class="col-11">
                                    <input type="search" class="form-control" placeholder="Search..." name="search" aria-label="Search">
                                </div>
                            </div>-->
                            <div class="row mb-3">
                                <label><i class='bx bx-filter-alt nav_icon'></i>Filters</label>
                            </div>
                            <div class="row mb-1">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Time</legend>
                                    <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="time" value="08:00 - 10:00">
                                        <label class="form-check-label" for="gridRadios1">
                                        08:00 - 10:00
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="time" value="10:00 - 12:00">
                                        <label class="form-check-label" for="gridRadios2">
                                        10:00 - 12:00
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="time" value="12:00 -  14:00">
                                        <label class="form-check-label" for="gridRadios3">
                                        12:00 -  14:00
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="time" value="14:00 - 16:00">
                                        <label class="form-check-label" for="gridRadios1">
                                        14:00 - 16:00
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="time" value="16:00 -  18:00">
                                        <label class="form-check-label" for="gridRadios2">
                                        16:00 -  18:00
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="time" value="18:00 - 20:00">
                                        <label class="form-check-label" for="gridRadios3">
                                        18:00 - 20:00
                                        </label>
                                    </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row mb-1">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Objectives</legend>
                                    <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="objectives" value="Cleaning">
                                        <label class="form-check-label" for="gridRadios1">
                                        Cleaning
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="objectives" value="Building">
                                        <label class="form-check-label" for="gridRadios2">
                                        Building
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="objectives" value="Animal rescue">
                                        <label class="form-check-label" for="gridRadios3">
                                        Animal rescue
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="objectives" value="Teaching">
                                        <label class="form-check-label" for="gridRadios1">
                                        Teaching
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="objectives" value="Elderly Care">
                                        <label class="form-check-label" for="gridRadios2">
                                         Elderly Care
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="objectives" value="Food distribution">
                                        <label class="form-check-label" for="gridRadios3">
                                        Food distribution
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="objectives" value="Fundraiser">
                                        <label class="form-check-label" for="gridRadios3">
                                        Fundraiser
                                        </label>
                                    </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row mb-1">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Type</legend>
                                    <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" value="One-time">
                                        <label class="form-check-label" for="gridRadios1">
                                        One-time
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="type" value="Long-term">
                                        <label class="form-check-label" for="gridRadios2">
                                        Long-term
                                        </label>
                                    </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="row mb-1">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Region</legend>
                                    <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="region" value="Northern">
                                        <label class="form-check-label" for="gridRadios1">
                                        Nothern
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="region" value="Southern">
                                        <label class="form-check-label" for="gridRadios2">
                                        Southern
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="region" value="Central">
                                        <label class="form-check-label" for="gridRadios1">
                                        Central
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="region" value="Western">
                                        <label class="form-check-label" for="gridRadios2">
                                        Western
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="region" value="Eastern">
                                        <label class="form-check-label" for="gridRadios2">
                                        Eastern
                                        </label>
                                    </div>
                                    </div>
                                </fieldset>
                            </div>

                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary" name="project_search">Search</button>
                                </div>
                            </div>
                        </form>

                        <?php
                            $display_projects = $project->displayOngoingProjects();

                            if(isset($_POST['project_search'])){
                                $type=$_POST['type'];
                                //$region=$_POST['region'];
                                //$objectives=$_POST['objectives'];
                                //$time=$_POST['time'];
                                echo("<script>alert('".$type."')</script>");
                $query=mysqli_result($event->conn,"SELECT * FROM project WHERE objectives='Cleaning'");
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Ongoing projects to be displayed.</h2></div>";
                }
                else{
                    While($rec=mysqli_fetch_assoc($query)){
                        $org_id=$rec['project_id']; //gets organization id to get organization name
                        $org=mysqli_query($this->conn,"SELECT * FROM project WHERE project_id='$org_id'");
                        $result=mysqli_fetch_assoc($org);
                        echo("<tr>
                        <th scope='row'>".$rec['name']."</th>
                        <td>".$rec['social_outcome']."</td>
                        <td>".$rec['objectives']."</td>
                        <td>".$rec['qualification_required']."</td>
                        <td>".$rec['address']."</td>
                        <td>".$result['name']."</td>
                        <td>".$rec['start_date']." TO ".$rec['end_date']."</td>
                        <td>".$rec['project_type']."</td>
                        <td>".$rec['start_time']." TO ".$rec['end_time']."</td>
                        <td><a href='sign-up-project.php?get_id=" . $project_id . "&get_user_id=$this->user_id'><button type='button' class='btn btn-primary btn-lg btn-block'>Sign Up</button></a></td>
                        </tr>");
                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
                                //$result=mysqli_fetch_array($query);
                                //echo $result;
                                /*if($query>0){
                                    while($rec=mysqli_fetch_assoc($query)){
                                        echo $rec['name'];
                                        echo $rec['project_type'];
                                        echo $rec['objectives'];
                                        echo $rec['region'];
                                        echo "<scrip>alert('successful')</script>";
                                    }

                                }
                                else{
                                    echo"<scrip>alert('successful')</script>";
                                }*/
                            }
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
