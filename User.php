<?php

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
    }

    class Volunteer extends User{
        public function volunteerRegistration($user_id, $full_name, $dob, $image, $contact, $email, $gender, $interests, $abilities, $talents){

            $interests = implode(", " ,$interests);
            $abilities = implode(", " ,$abilities);
            $talents = implode(", " ,$talents);

            $query=mysqli_query($this->conn,"INSERT INTO volunteer(user_id, fullname, date_of_birth, image, contact, email, gender, interests, abilities, talents) VALUES('$user_id', '$full_name', '$dob', '$image', '$contact', '$email', '$gender', '$interests', '$abilities', '$talents')"); //inserts data into user table

            if($query>0){
                session_start();
                $_SESSION["user_id"] = $user_id;

                header('Location: register-volunteer-complete.php');
            }
            else{
                echo("<script>alert('Registration unsuccessful')</script>");
            }

        }

    }

    class Organization extends User{
        public function organizationRegistration($user_id, $name, $logo, $contact, $address, $email, $org_type, $reg_no, $no_of_years, $website){

            $query=mysqli_query($this->conn,"INSERT INTO organization(user_id, name, logo, contact, address, email, type, registration_no, no_of_years, website, approval_status) VALUES('$user_id', '$name', '$logo', '$contact', '$address', '$email', '$org_type', '$reg_no', '$no_of_years', '$website', 'pending')"); //inserts data into user table

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
