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

    <?php

        $footer = $code->footer();
        $end_code = $code->endCode();
    ?>


  </body>
  </html>
