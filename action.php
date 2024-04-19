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




            //$details=$volunteer->signupProject($user_id, $project_id, $_POST['yesorno'], $fname);


            /*$check_availability = mysqli_query($this->conn,"SELECT * FROM project_registration WHERE user_id='$user_id' AND project_id='$project_id'"); //checks if user id and project id combo already exists

            if (mysqli_num_rows($check_availability)>0){ //user can't sign up if combo already exists
                echo("<script>alert('You have already signed up for the volunteer project')</script>");
                echo("<div>You can head back to upcoming projects page and explore other projects</div>");
            }
            else{
                if($yes_or_no=="Yes"){

                    $project=mysqli_query($this->conn,"SELECT * FROM project WHERE project_id='$project_id'");
                    $rec=mysqli_fetch_assoc($project);
                    $start_time=$rec['start_time'];
                    $end_time=$rec['end_time'];
                    $volunteer_hours=round((strtotime($end_time) - strtotime($start_time))/3600);

                    $query=mysqli_query($this->conn,"INSERT INTO project_registration(project_id, user_id, volunteer_hours) VALUES('$project_id', '$user_id', '$volunteer_hours')");
                    if($query>0){

                        echo("<script>alert('Sign Up successful')</script>");
                        //need to send mail
                    }
                    else{
                        echo("<script>alert('Sign Up unsuccessful')</script>");
                    }
                }
                else{
                    echo("<div>You can head back to upcoming projects page and explore other projects</div>");
                }
            }*/
        }
    ?>
