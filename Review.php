<?php
    class Review{
        public function __construct(){
            $this->conn= mysqli_connect("localhost","root","","unitedhands") or die('Could not connect: ' . mysqli_error());
        }

        public function viewReviews($project_id, $user_id){
            $checkuser=mysqli_query($this->conn,"SELECT * FROM user WHERE user_id='$user_id'");
            $check_result=mysqli_fetch_assoc($checkuser);
            $type=$check_result['type'];

            if($type=="volunteer" || $type=="organization"){
                $query=mysqli_query($this->conn,"SELECT * FROM project_review WHERE project_id='$project_id'");
                $nor=mysqli_num_rows($query);
                $project=mysqli_query($this->conn,"SELECT * FROM project WHERE project_id='$project_id'");
                $rec=mysqli_fetch_assoc($project);
                $org_id=$rec['organization_id'];
                $organization=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
                $result=mysqli_fetch_assoc($organization);
                echo("<div class='card p-4'>
                <div class='row mb-1'>
                <div class='col-4'>
                <h2 class='p-3 mb-0'>".$rec['name']."</h2>
                <h6 class='p-3 my-0'><img class='rounded-circle inline' width='60' height='60'src='Images/".$result['logo']."'> ".$result['name']."</h6>
                </div>
                <div class='col-6'>
                <h5 class='p-5 mb-0'>".$rec['social_outcome']."</h5>
                </div>
                <div class='col-2' style='color:#eb4d4b'>
                <h1 class='p-4 mb-0'>".$nor."</h1>
                <h4 class='mb-0'>Reviews</h4>
                </div>
                </div>
                </div></div>

                <div class='container'><form method='POST'>
                <div class='row mb-3'>
                <div class='col-8 my-3'>
                <input class='form-control' type='text' placeholder='your review...' name='review'>
                </div>
                <div class='col-2 my-3'>
                    <select name='rating' class='form-select'>
                    <option value=''>Rating...</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    </select>
                </div>
                <div class='col-2 my-3'>
                <button type='submit' class='btn btn-primary btn-lg btn-block' name='add_review'>Add Review</button>
                </div>
                </div>
                </form></div>
                <div>Refresh the page to see your review</div>");


                if($nor==0){
                    echo("<div class='card my-3'>No Reviews</div>");
                }
                else{
                    While($rec=mysqli_fetch_assoc($query)){
                        $userId=$rec['user_id'];
                        $rating=$rec['rating'];
                        $user=mysqli_query($this->conn,"SELECT * FROM user WHERE user_id='$userId'");
                        $user_result=mysqli_fetch_assoc($user);
                        if($user_result['type']=='volunteer'){
                            $volunteer=mysqli_query($this->conn,"SELECT * FROM volunteer WHERE user_id='$userId'");
                            $volunteer_result=mysqli_fetch_assoc($volunteer);
                            echo("<div class='card p-4 my-3'>
                            <div class='row my-1'>
                            <div class='col-12'><h5><img class='rounded-circle inline' width='60' height='60' src='Images/".$volunteer_result['image']."'> ".$volunteer_result['fullname']."</h5></div>
                            </div>
                            <div class='row my-1'>
                            <div class='col-12'><h6>".$rec['review']."");
                            for($i = 1; $i <= $rating; $i++){
                                echo " <span style='color:#f39c12'>&#x2606</span>";
                            }
                            echo("</h6></div>
                            </div>
                            </div>");
                        }
                        else if($user_result['type']=='organization'){
                            $organization=mysqli_query($this->conn,"SELECT * FROM organization WHERE user_id='$userId'");
                            $organization_result=mysqli_fetch_assoc($organization);
                            echo("<div class='card p-4 my-3'>
                            <div class='row my-1'>
                            <div class='col-12'><h5><img class='rounded-circle inline' width='60' height='60' src='Images/".$organization_result['logo']."'> ".$organization_result['name']."</h5></div>
                            </div>
                            <div class='row my-1'>
                            <div class='col-12'><h6>".$rec['review']."");
                            for($i = 1; $i <= $rating; $i++){
                                echo " <span style='color:#f39c12'>&#x2606</span>";
                            }
                            echo("</h6></div>
                            </div>
                            </div>");
                        }
                    }
                }
            }
            else if($type=="admin"){
                $query=mysqli_query($this->conn,"SELECT * FROM project_review WHERE project_id='$project_id'");
                $nor=mysqli_num_rows($query);
                $project=mysqli_query($this->conn,"SELECT * FROM project WHERE project_id='$project_id'");
                $rec=mysqli_fetch_assoc($project);
                $org_id=$rec['organization_id'];
                $organization=mysqli_query($this->conn,"SELECT * FROM organization WHERE organization_id='$org_id'");
                $result=mysqli_fetch_assoc($organization);
                echo("<div class='card p-4'>
                <div class='row mb-1'>
                <div class='col-4'>
                <h2 class='p-3 mb-0'>".$rec['name']."</h2>
                <h6 class='p-3 my-0'><img class='rounded-circle inline' width='60' height='60'src='Images/".$result['logo']."'> ".$result['name']."</h6>
                </div>
                <div class='col-6'>
                <h5 class='p-5 mb-0'>".$rec['social_outcome']."</h5>
                </div>
                <div class='col-2' style='color:#eb4d4b'>
                <h1 class='p-4 mb-0'>".$nor."</h1>
                <h4 class='mb-0'>Reviews</h4>
                </div>
                </div>
                </div></div>");


                if($nor==0){
                    echo("<div class='card my-3'>No Reviews</div>");
                }
                else{
                    While($rec=mysqli_fetch_assoc($query)){
                        $userId=$rec['user_id'];
                        $user=mysqli_query($this->conn,"SELECT * FROM user WHERE user_id='$userId'");
                        $user_result=mysqli_fetch_assoc($user);
                        $rating=$rec['rating'];
                        if($user_result['type']=='volunteer'){
                            $volunteer=mysqli_query($this->conn,"SELECT * FROM volunteer WHERE user_id='$userId'");
                            $volunteer_result=mysqli_fetch_assoc($volunteer);
                            echo("<div class='card p-4 my-3'>
                            <div class='row my-1'>
                            <div class='col-12'><h5><img class='rounded-circle inline' width='60' height='60' src='Images/".$volunteer_result['image']."'> ".$volunteer_result['fullname']."</h5></div>
                            </div>
                            <div class='row my-1'>
                            <div class='col-12'><h6>".$rec['review']." ".$rec['review_id']."");
                            for($i = 1; $i <= $rating; $i++){
                                echo " <span style='color:#f39c12'>&#x2606</span>";
                            }
                            echo("</h6></div>
                            </div>
                            <div class='row my-1'>
                            <form action='view-reviews.php' method='POST'>
                            <button type='submit' class='btn btn-primary btn-lg btn-block' name='delete_review'>Delete Review</button>
                            </form>
                            </div>
                            </div>");
                        }
                        else if($user_result['type']=='organization'){
                            $organization=mysqli_query($this->conn,"SELECT * FROM organization WHERE user_id='$userId'");
                            $organization_result=mysqli_fetch_assoc($organization);
                            echo("<div class='card p-4 my-3'>
                            <div class='row my-1'>
                            <div class='col-12'><h5><img class='rounded-circle inline' width='60' height='60' src='Images/".$organization_result['logo']."'> ".$organization_result['name']."</h5></div>
                            </div>
                            <div class='row my-1'>
                            <div class='col-12'><h6>".$rec['review']." ".$rec['review_id']."");
                            for($i = 1; $i <= $rating; $i++){
                                echo " <span style='color:#f39c12'>&#x2606</span>";
                            }
                            echo("</h6></div>
                            </div>
                            <div class='row my-1'>
                            <form method='POST'>
                            <button type='submit' class='btn btn-primary btn-lg btn-block' name='delete_review'>Delete Review</button>
                            </form></div>
                            </div>");

                        }
                    }

                }
            }
        }
        public function addReview($project_id, $user_id, $review, $rating){
            $query=mysqli_query($this->conn,"INSERT INTO project_review(project_id, user_id, review, rating) VALUES('$project_id', '$user_id', '$review', '$rating')");
            if($query>0){
                echo("<div>Review added.</div>");
            }
            else{
                echo("<div>Unable to add review</div>");
            }
        }

        /*public function deleteReview($review_id){
            $query=mysqli_query($this->conn,"DELETE FROM project_review WHERE review_id='$review_id'");
        }*/
    }
?>
