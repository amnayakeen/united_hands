<?php
    session_start();
    unset ($_SESSION["user_id"]);           //user id is no longer passed
    session_destroy();
    require_once("User.php");
	require_once("Components.php");
    $code = new Components();
    $starter_code = $code->starterCode();
    echo("<head><title>United Hands</title></head>");

?>
    <body>

    <?php
    $header = $code->header();
    ?>

    <div class="container my-3 p-4">
            <h3>About Us</h3>
            <p>United Hands is more than just an organization; we're a movement dedicated to empowering communities through collective action and collaboration.
                Our platform provides a central hub where volunteers and organizations come together to address the most pressing challenges facing our society today.</p>

            <h3>Our Mission</h3>
            <p>At United Hands, our mission is to foster a culture of compassion, solidarity, and civic engagement. We believe that by bringing people together, we can
                create lasting change and build a more equitable and inclusive world for all. Through our platform, we aim to inspire individuals to take meaningful action
                and make a positive impact in their communities.</p>

            <h3>Our Vision</h3>
            <p>We envision a future where every person has the opportunity to contribute their unique skills and talents towards building stronger, more resilient
                communities. By harnessing the collective power of volunteers and organizations, we strive to address systemic issues and create sustainable solutions
                that improve the quality of life for everyone.</p>

            <h3>Join Us</h3>
            <p>Whether you're a seasoned volunteer or new to community service, we invite you to join us in shaping the future of our communities.
                Together, we can build a world where everyone has the opportunity to thrive and where no one is left behind. Join United Hands today and let's create
                positive change, one hand at a time.</p>
    </div>

    <?php

        $footer = $code->footer();
        $end_code = $code->endCode();
    ?>


  </body>
  </html>
