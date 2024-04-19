<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unitedhands";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM organization WHERE organization_id = ?";
$stmt = $conn->prepare($sql);
$organization_id = 13; 
$stmt->bind_param("i", $organization_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $organization = $result->fetch_assoc();
} else {
    echo "No organization found with that ID";
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>United Hands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
</head>
<?php
require_once("Components.php");
$code = new Components();
$starter_code = $code->dashboardStarterCode();
$header = $code->dashboardHeader();
$sidebar = $code->dashboardSidebar();

echo $starter_code;
echo("<head><title>Create Project</title></head>");
?>
<body>
<?php
echo $header;
echo $sidebar;
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">


                <section>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                <img src="<?php echo isset($organization['logo']) ? $organization['logo'] : 'placeholder_image_url.jpg'; ?>" alt="avatar"
                                         class="rounded-circle img-fluid" style="width: 150px;">
                                    <h3><strong>Name:</strong> <?php echo isset($organization['name']) ? $organization['name'] : ''; ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><strong>Name:</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo isset($organization['name']) ? $organization['name'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><strong>contact:</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo isset($organization['contact']) ? $organization['contact'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><strong>Email:</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo isset($organization['email']) ? $organization['email'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><strong>Addres:</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo isset($organization['address']) ? $organization['address'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><strong>Type:</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo isset($organization['type']) ? $organization['type'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><strong>Resitration Number:</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo isset($organization['registration_no']) ? $organization['registration_no'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><strong>Number of Years:</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo isset($organization['no_of_years']) ? $organization['no_of_years'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p><strong>Website:</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo isset($organization['website']) ? $organization['website'] : ''; ?></p>
                                        </div>
                                    </div>
                                    <a href="change-password.php">
                                            <button type="button" class="btn btn-primary">Change Password</button>
                                        </a>
                                        <a href="edit-profile.php">
                                            <button type="button" class="btn btn-primary">Edit Profile</button>
                                        </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                        crossorigin="anonymous"></script>
                <?php
                $footer = $code->footer();
                $end_code = $code->endCode();
                echo $footer;
                echo $end_code;
                ?>
</body>
</html>
