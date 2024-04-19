<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    class User{

        public function __construct(){
            $this->conn= mysqli_connect("localhost","root","","unitedhands") or die('Could not connect: ' . mysqli_error());
        }

        public function userRegistration($email, $password, $confirm_password, $user_type){
            session_start();
            $check_availability = mysqli_query($this->conn,"SELECT * FROM user WHERE email='$email'"); //checks if email already exists

            if (mysqli_num_rows($check_availability)>0){ //user can't register if email already exists
                echo("<script>alert('This email already exists')</script>");
            }
            else if($password !== $confirm_password){ //checks if the both passwords are same
                echo("<script>alert('Passwords do not match')</script>");
            }
            else {
                $this->conn;
                $query=mysqli_query($this->conn,"INSERT INTO user(email, password, type) VALUES('$email', '$password', '$user_type')"); //inserts data into user table

                if($query>0){

                    $result=mysqli_query($this->conn,"SELECT * FROM user WHERE email='$email'");
                    $rec=mysqli_fetch_assoc($result);
                    $user_id=$rec['user_id'];
                    $_SESSION["user_id"] = $user_id;

                        if($rec['type']=="volunteer")
                        {
                            header('Location: register-volunteer.php');
                        }

                        else
                        {
                            header('Location: register-organization.php');
                        }
                }
                else{
                    echo("<script>alert('Registration unsuccessful')</script>");
                }
            }
        }
        public function login($email, $password){
            $query=mysqli_query($this->conn,"SELECT * FROM user WHERE email='$email'");
            $nor=mysqli_num_rows($query);
            if($nor==0){
                echo("<script>alert('This email is not registered')</script>");
            }
            else{
                $rec=mysqli_fetch_assoc($query);

                if($rec['password']==$password){        //checking whether password matches
                    session_start();
                    $user_id=$rec['user_id'];
                    $name= $rec['name'];
                    $_SESSION["user_id"]=$user_id;
                    $_SESSION["name"]=$name;

                        if($rec['type']=="volunteer")
                        {
                            header('Location: volunteer-dashboard.php');
                        }

                        else if($rec['type']=="organization")
                        {
                            $org=mysqli_query($this->conn,"SELECT * FROM organization WHERE user_id='$user_id'");
                            $rec=mysqli_fetch_assoc($org);
                            $approval_status=$rec['approval_status'];

                            if($rec['approval_status']=="approved"){    //checking approval status
                                echo ("<script>alert($approval_status)</script>");      //if org is approved, directed to org dashboard
                                header('Location: organization-dashboard.php');
                            }
                            else if($rec['approval_status']=="pending"){
                                echo ("<script>alert($approval_status)</script>");
                                header('Location: register-organization-complete.php');
                            }
                            else{
                                echo ("<script>alert($approval_status)</script>");
                                header('Location: organization-disapproved.php');
                            }

                        }
                        else{
                            header('Location: admin-dashboard.php');
                        }
                }
                else{
                    echo("<script>alert('Incorrect password')</script>");
                }
            }
            mysqli_close($this->conn);
        }

        public function logout(){
            session_start();
            unset ($_SESSION["user_id"]);           //user id is no longer passed
            session_destroy();

            header("location: index.php");
        }

        public function notifyUser($user_name, $email, $event_name, $event_start_date, $event_start_time, $event_end_time){
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication

                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->Username   = 'unitedhandslanka@gmail.com';                     //SMTP username
                        $mail->Password   = 'touc vqhk letg gltv';                               //SMTP password
                        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('unitedhandslanka@gmail.com', 'Admin');
                        $mail->addAddress($email, $user_name);     //Add a recipient

                        //Attachments
                        $mail->addAttachment('Images/Logo-nbg.png', 'UnitedHands.png');         //Add attachments

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'New Project Sign Up';
                        $mail->Body    = 'Hi ' .$user_name. '<br>You have registered for the ' .$event_name. ', which will be held on ' .$event_start_date. ' from ' .$event_start_time. ' to ' .$event_end_time. '.<br>Hoping to see you there!<br><br>United Hands';

                        $mail->send();
                        echo ("<script>alert('Message sent.')</script>");
                    }
                    catch (Exception $e) {
                        echo ("<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>");
                    }
        }
    }

    class Volunteer extends User{
        public function volunteerRegistration($user_id, $full_name, $dob, $image, $contact, $email, $gender, $interests, $abilities, $talents){

            $interests = implode(", " ,$interests);
            $abilities = implode(", " ,$abilities);
            $talents = implode(", " ,$talents);

            $query=mysqli_query($this->conn,"INSERT INTO volunteer(user_id, fullname, date_of_birth, image, contact, email, gender, interests, abilities, talents) VALUES('$user_id', '$full_name', '$dob', '$image', '$contact', '$email', '$gender', '$interests', '$abilities', '$talents')"); //inserts data into user table

            $query2=mysqli_query($this->conn,"UPDATE user SET name='$full_name' WHERE user_id='$user_id'"); //inserts data into user table

            if($query>0){
                session_start();
                $_SESSION["user_id"] = $user_id;

                header('Location: register-volunteer-complete.php');
            }
            else{
                echo("<script>alert('Registration unsuccessful')</script>");
            }

        }

        public function signupProject($user_id, $project_id, $qualification, $pcc, $issued_date, $expiry_date, $yes_or_no){

            if($yes_or_no=="Yes"){

                $project=mysqli_query($this->conn,"SELECT * FROM project WHERE project_id='$project_id'");
                $rec=mysqli_fetch_assoc($project);
                $start_time=$rec['start_time'];
                $end_time=$rec['end_time'];
                $volunteer_hours=round((strtotime($end_time) - strtotime($start_time))/3600);

                $query=mysqli_query($this->conn,"INSERT INTO project_registration(project_id, user_id, qualification_proof, pcc, issued_date, expiry_date, volunteer_hours) VALUES('$project_id', '$user_id', '$qualification', '$pcc', '$issued_date', '$expiry_date', '$volunteer_hours')");
                if($query>0){
                    echo("<script>alert('Sign Up successful')</script>");
                    $user=mysqli_query($this->conn,"SELECT * FROM volunteer WHERE user_id='$user_id'");
                    $project=mysqli_query($this->conn,"SELECT * FROM project WHERE project_id='$project_id'");
                    $user_result=mysqli_fetch_assoc($user);
                    $project_result=mysqli_fetch_assoc($project);
                    $user_name=$user_result['fullname'];
                    $email=$user_result['email'];
                    $event_name=$project_result['name'];
                    $event_start_date=$project_result['start_date'];
                    $event_start_time=$project_result['start_time'];
                    $event_end_time=$project_result['end_time'];

                    $user = new User();
                    $user->notifyUser($user_name, $email, $event_name, $event_start_date, $event_start_time, $event_end_time);

                    //need to send mail
                }
                else{
                    echo("<script>alert('Sign Up unsuccessful')</script>");
                }
            }
            else{
                header("location:upcoming-projects.php");
            }
        }

        public function signupTraining($user_id, $training_id, $yes_or_no){

            $check_availability = mysqli_query($this->conn,"SELECT * FROM training_registration WHERE user_id='$user_id' AND training_id='$training_id'"); //checks if user id and training id combo already exists

            if (mysqli_num_rows($check_availability)>0){ //user can't sign up if combo already exists
                echo("<script>alert('You have already signed up for the training')</script>");
                echo("<div>You can head back to upcoming trainings page and explore other trainings</div>");
            }
            else{
                if($yes_or_no=="Yes"){

                    $query=mysqli_query($this->conn,"INSERT INTO training_registration(training_id, user_id, volunteer_hours) VALUES('$training_id', '$user_id', '$volunteer_hours')");
                    if($query>0){

                        echo("<script>alert('Sign Up successful')</script>");
                        //need to send mail
                    }
                    else{
                        echo("<script>alert('Registration unsuccessful')</script>");
                    }
                }
                else{
                    echo("<div>You can head back to upcoming trainings page and explore other trainings</div>");
                }
            }
        }

        public function signupGathering($user_id, $gathering_id, $yes_or_no){

            $check_availability = mysqli_query($this->conn,"SELECT * FROM gathering_registration WHERE user_id='$user_id' AND gathering_id='$gathering_id'"); //checks if user id and gathering id combo already exists
            if (mysqli_num_rows($check_availability)>0){ //user can't sign up if combo already exists
                echo("<script>alert('You have already signed up for the gathering')</script>");
                echo("<div>You can head back to upcoming gatherings and explore other gatherings</div>");
            }
            else{
                if($yes_or_no=="Yes"){

                    $query=mysqli_query($this->conn,"INSERT INTO gathering_registration(gathering_id, user_id) VALUES('$gathering_id', '$user_id')");
                    if($query>0){

                        echo("<script>alert('Registration successful')</script>");
                        //need to send mail
                    }
                    else{
                        echo("<script>alert('Registration unsuccessful')</script>");
                    }
                }
                else{
                    echo("<div>You can head back to upcoming gatherings and explore other gatherings</div>");
                }
            }
        }

    }

    class Organization extends User{
        public function organizationRegistration($user_id, $name, $logo, $contact, $address, $email, $org_type, $reg_no, $no_of_years, $website){

            $query=mysqli_query($this->conn,"INSERT INTO organization(user_id, name, logo, contact, address, email, type, registration_no, no_of_years, website, approval_status) VALUES('$user_id', '$name', '$logo', '$contact', '$address', '$email', '$org_type', '$reg_no', '$no_of_years', '$website', 'pending')"); //inserts data into user table

            $query2=mysqli_query($this->conn,"UPDATE user SET name='$name' WHERE user_id='$user_id'"); //inserts data into user table

            if($query>0){
                session_start();
                $_SESSION["user_id"] = $user_id;

                header('Location: register-organization-complete.php');
            }
            else{
                echo("<script>alert('Registration unsuccessful')</script>");
            }
        }
    }
?>
