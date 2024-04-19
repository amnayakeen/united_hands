<?php
    class Event{
        public function __construct(){
            $this->conn= mysqli_connect("localhost","root","","unitedhands") or die('Could not connect: ' . mysqli_error());
        }

        public function searchProjects($search, $time, $type, $region, $objectives){
            $time = implode(", " ,$time);
            $type = implode(", " ,$type);
            $region = implode(", " ,$region);
            $objectives = implode(", " ,$objectives);
            echo $search;
            echo $time;
            echo $type;
            echo $region;
            echo $objectives;
        }
    }

    class Project extends Event{
        public function displayUpcomingProjects(){

            $this->user_id = $_SESSION["user_id"];

            $this->result=mysqli_query($this->conn,"SELECT * FROM user WHERE user_id='$this->user_id'");
            $this->rec=mysqli_fetch_assoc($this->result);

            if($this->rec['type']=="volunteer"){
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM project WHERE start_date>'$today_date'");
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming projects to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                        <div class='row mb-3'>
                        <div class='col-sm-12'>
                        <table class='table table-responsive-sm'>
                        <thead>
                        <tr>
                        <th scope='col'>Project Name</th>
                        <th scope='col'>Social Outcome</th>
                        <th scope='col'>Objectives</th>
                        <th scope='col'>Qualification</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Conducted by</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Type</th>
                        <th scope='col'>Time</th>
                        <th scope='col'>Sign Up</th>
                        </tr>
                        </thead>
                        <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        $org_id=$rec['organization_id']; //gets organization id to get organization name
                        $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
                        $result=mysqli_fetch_assoc($org);
                        $project_id=$rec['project_id'];
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
            }

            else if($this->rec['type']=="organization"){
                $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE user_id='$this->user_id'"); //connects to organization table using user_id to get organization id
                $org_result=mysqli_fetch_assoc($org);
                $org_id=$org_result['organization_id'];
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM project WHERE start_date>'$today_date' AND organization_id='$org_id'"); //retrieves only the organizations projects
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming projects to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                        <div class='row mb-3'>
                        <div class='col-sm-12'>
                        <table class='table table-responsive-sm'>
                        <thead>
                        <tr>
                        <th scope='col'>Project Name</th>
                        <th scope='col'>Social Outcome</th>
                        <th scope='col'>Objectives</th>
                        <th scope='col'>Qualification</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Type</th>
                        <th scope='col'>Time</th>
                        </tr>
                        </thead>
                        <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        echo("<tr>
                        <th scope='row'>".$rec['name']."</th>
                        <td>".$rec['social_outcome']."</td>
                        <td>".$rec['objectives']."</td>
                        <td>".$rec['qualification_required']."</td>
                        <td>".$rec['address']."</td>
                        <td>".$rec['start_date']." TO ".$rec['end_date']."</td>
                        <td>".$rec['project_type']."</td>
                        <td>".$rec['start_time']." TO ".$rec['end_time']."</td>
                        </tr>");
                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
            }

            else{
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM project WHERE start_date>'$today_date'");
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming projects to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                        <div class='row mb-3'>
                        <div class='col-sm-12'>
                        <table class='table table-responsive-sm'>
                        <thead>
                        <tr>
                        <th scope='col'>Project Name</th>
                        <th scope='col'>Social Outcome</th>
                        <th scope='col'>Objectives</th>
                        <th scope='col'>Qualification</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Conducted by</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Type</th>
                        <th scope='col'>Time</th>
                        </tr>
                        </thead>
                        <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        $org_id=$rec['organization_id'];
                        $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
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
                        </tr>");
                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
            }
        }

        public function displayCompletedProjects(){
            $today_date= date('Y-m-d');
            $query=mysqli_query($this->conn,"SELECT * FROM project WHERE end_date<'$today_date'");
            $nor=mysqli_num_rows($query);

            if($nor==0){
                echo "<div class='container my-3'><h2>No Upcoming projects to be displayed.</h2></div>";
            }
            else{
                echo("<div class='container my-3'>
                    <div class='row mb-3'>
                    <div class='col-sm-12'>
                    <table class='table table-responsive-sm'>
                    <thead>
                    <tr>
                    <th scope='col'>Project Name</th>
                    <th scope='col'>Conducted by</th>
                    <th scope='col'>Review</th>
                    </tr>
                    </thead>
                    <tbody>");
                While($rec=mysqli_fetch_assoc($query)){
                    $org_id=$rec['organization_id']; //gets organization id to get organization name
                    $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
                    $result=mysqli_fetch_assoc($org);
                    echo("<tr>
                    <th scope='row'>".$rec['name']."</th>
                    <td>".$result['name']."</td>
                    <td><a href='view-reviews.php'><button type='button' class='btn btn-primary btn-lg btn-block'>View Review</button></a></td>
                    </tr>");
                }
                echo("
                </tbody>
                </table>
                </div>
                </div>
                </div>");
            }
        }
    }

    class Training extends Event{
        public function displayUpcomingTrainings(){

            $this->user_id = $_SESSION["user_id"];

            $this->result=mysqli_query($this->conn,"SELECT * FROM user WHERE user_id='$this->user_id'");
            $this->rec=mysqli_fetch_assoc($this->result);

            if($this->rec['type']=="volunteer"){
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM training WHERE start_date>'$today_date'");
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming trainings to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                        <div class='row mb-3'>
                        <div class='col-sm-12'>
                        <table class='table table-responsive-sm'>
                        <thead>
                        <tr>
                        <th scope='col'>Training Name</th>
                        <th scope='col'>Description</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Conducted by</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Time</th>
                        <th scope='col'>Sign Up</th>
                        </tr>
                        </thead>
                        <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        $org_id=$rec['organization_id']; //gets organization id to get organization name
                        $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
                        $result=mysqli_fetch_assoc($org);
                        $training_id=$rec['training_id'];
                        echo("<tr>
                        <th scope='row'>".$rec['name']."</th>
                        <td>".$rec['description']."</td>
                        <td>".$rec['address']."</td>
                        <td>".$result['name']."</td>
                        <td>".$rec['start_date']." TO ".$rec['end_date']."</td>
                        <td>".$rec['start_time']." TO ".$rec['end_time']."</td>
                        <td><a href='sign-up-training.php?get_id=" . $training_id . "&get_user_id=$this->user_id'><button type='button' class='btn btn-primary btn-lg btn-block'>Sign Up</button></a></td>
                        </tr>");

                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
            }

            else if($this->rec['type']=="organization"){
                $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE user_id='$this->user_id'"); //connects to organization table using user_id to get organization id
                $org_result=mysqli_fetch_assoc($org);
                $org_id=$org_result['organization_id'];
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM training WHERE start_date>'$today_date' AND organization_id='$org_id'"); //retrieves only the organizations training
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming trainings to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                    <div class='row mb-3'>
                    <div class='col-sm-12'>
                    <table class='table table-responsive-sm'>
                    <thead>
                    <tr>
                    <th scope='col'>Training Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Location</th>
                    <th scope='col'>Date</th>
                    <th scope='col'>Time</th>
                    </tr>
                    </thead>
                    <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        echo("<tr>
                        <th scope='row'>".$rec['name']."</th>
                        <td>".$rec['description']."</td>
                        <td>".$rec['address']."</td>
                        <td>".$rec['start_date']." TO ".$rec['end_date']."</td>
                        <td>".$rec['start_time']." TO ".$rec['end_time']."</td>
                        </tr>");
                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
            }

            else{
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM training WHERE start_date>'$today_date'");
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming traings to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                        <div class='row mb-3'>
                        <div class='col-sm-12'>
                        <table class='table table-responsive-sm'>
                        <thead>
                        <tr>
                        <th scope='col'>Training Name</th>
                        <th scope='col'>Description</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Conducted by</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Time</th>
                        </tr>
                        </thead>
                        <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        $org_id=$rec['organization_id'];
                        $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
                        $result=mysqli_fetch_assoc($org);
                        echo("<tr>
                        <th scope='row'>".$rec['name']."</th>
                        <td>".$rec['description']."</td>
                        <td>".$rec['address']."</td>
                        <td>".$result['name']."</td>
                        <td>".$rec['start_date']." TO ".$rec['end_date']."</td>
                        <td>".$rec['start_time']." TO ".$rec['end_time']."</td>
                        </tr>");
                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
            }

        }
    }

    class Gathering extends Event{
        public function displayUpcomingGatherings(){

            $this->user_id = $_SESSION["user_id"];

            $this->result=mysqli_query($this->conn,"SELECT * FROM user WHERE user_id='$this->user_id'");
            $this->rec=mysqli_fetch_assoc($this->result);

            if($this->rec['type']=="volunteer"){
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM community_gathering WHERE start_date>'$today_date'");
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming Gatherings to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                        <div class='row mb-3'>
                        <div class='col-sm-12'>
                        <table class='table table-responsive-sm'>
                        <thead>
                        <tr>
                        <th scope='col'>Gathering Name</th>
                        <th scope='col'>Description</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Conducted by</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Time</th>
                        <th scope='col'>Sign Up</th>
                        </tr>
                        </thead>
                        <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        $org_id=$rec['organization_id']; //gets organization id to get organization name
                        $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
                        $result=mysqli_fetch_assoc($org);
                        $gathering_id=$rec['gathering_id'];
                        echo("<tr>
                        <th scope='row'>".$rec['name']."</th>
                        <td>".$rec['description']."</td>
                        <td>".$rec['address']."</td>
                        <td>".$result['name']."</td>
                        <td>".$rec['start_date']." TO ".$rec['end_date']."</td>
                        <td>".$rec['start_time']." TO ".$rec['end_time']."</td>
                        <td><a href='sign-up-gathering.php?get_id=" . $gathering_id . "&get_user_id=$this->user_id'><button type='button' class='btn btn-primary btn-lg btn-block'>Sign Up</button></a></td>
                        </tr>");
                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
            }

            else if($this->rec['type']=="organization"){
                $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE user_id='$this->user_id'");  //connects to organization table using user_id to get organization id
                $org_result=mysqli_fetch_assoc($org);
                $org_id=$org_result['organization_id'];
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM community_gathering WHERE start_date>'$today_date' AND organization_id='$org_id'"); //retrieves only the organizations gathering
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming Gatherings to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                    <div class='row mb-3'>
                    <div class='col-sm-12'>
                    <table class='table table-responsive-sm'>
                    <thead>
                    <tr>
                    <th scope='col'>Gathering Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Location</th>
                    <th scope='col'>Date</th>
                    <th scope='col'>Time</th>
                    </tr>
                    </thead>
                    <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        echo("<tr>
                        <th scope='row'>".$rec['name']."</th>
                        <td>".$rec['description']."</td>
                        <td>".$rec['address']."</td>
                        <td>".$rec['start_date']." TO ".$rec['end_date']."</td>
                        <td>".$rec['start_time']." TO ".$rec['end_time']."</td>
                        </tr>");
                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
            }

            else{
                $today_date= date('Y-m-d');
                $query=mysqli_query($this->conn,"SELECT * FROM community_gathering WHERE start_date>'$today_date'");
                $nor=mysqli_num_rows($query);

                if($nor==0){
                    echo "<div class='container my-3'><h2>No Upcoming Gatherings to be displayed.</h2></div>";
                }
                else{
                    echo("<div class='container my-3'>
                        <div class='row mb-3'>
                        <div class='col-sm-12'>
                        <table class='table table-responsive-sm'>
                        <thead>
                        <tr>
                        <th scope='col'>Gathering Name</th>
                        <th scope='col'>Description</th>
                        <th scope='col'>Location</th>
                        <th scope='col'>Conducted by</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Time</th>
                        </tr>
                        </thead>
                        <tbody>");
                    While($rec=mysqli_fetch_assoc($query)){
                        $org_id=$rec['organization_id'];
                        $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
                        $result=mysqli_fetch_assoc($org);
                        echo("<tr>
                        <th scope='row'>".$rec['name']."</th>
                        <td>".$rec['description']."</td>
                        <td>".$rec['address']."</td>
                        <td>".$result['name']."</td>
                        <td>".$rec['start_date']." TO ".$rec['end_date']."</td>
                        <td>".$rec['start_time']." TO ".$rec['end_time']."</td>
                        </tr>");
                    }
                    echo("
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>");
                }
            }

        }
    }
?>
