<?php
session_start();
$project_id=$_SESSION["project_id"];
$user_id=$_SESSION["user_id"];
$_SESSION["volunteer_id"]=$user_id;
    require_once("User.php");
    $volunteer = new Volunteer();

        if(isset($_POST['project'])){
            header("location:upcoming-projects.php");
        }
        if(isset($_POST['training'])){
            header("location:upcoming-trainings.php");
        }
        if(isset($_POST['gathering'])){
            header("location:upcoming-gatherings.php");
        }
        if(isset($_POST['ongoing-project'])){
            header("location:ongoing-projects.php");
        }
        if(isset($_POST['ongoing-training'])){
            header("location:ongoing-trainings.php");
        }
        if(isset($_POST['ongoing-gathering'])){
            header("location:ongoing-gatherings.php");
        }
    ?>
