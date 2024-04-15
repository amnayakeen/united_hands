<?php
    session_start();
    if(!isset($_SESSION["user_id"]))
    {
        header ("location:index.php");
    }
    unset($_SESSION["user_id"]);
    session_destroy();
	require_once("Components.php");
    $code = new Components();
    $starter_code = $code->starterCode();
    $header = $code->header();
    echo $starter_code;
    echo("<head><title>Organization Registration Complete</title></head>");

?>
    <body>

    <?php
        echo $header;
    ?>

<div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-8">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-12 col-lg-12 d-flex  justify-content-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <div class="d-flex align-items-center mb-5 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                <span class="h2 fw-bold mb-0">Thank you for registering at United Hands</span>
                                </div>
                                <div class="d-flex align-items-center mb-5 pb-1">
                                <i class="fas fa-cubes fa-2x me-3"></i>
                                <h6>Please note that your organization details have been sent to the admin for approval. Once it has been approved you will be notified through mail. This procedure will take 2-3 working days.</h6>
                                </div>


                                <div class="pt-1 mb-4">
                                <a href="index.php"><button type="button" class="btn btn-primary btn-lg btn-block">Go home</button></a> <!--sends to home page-->
                                </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

        $footer = $code->footer();
        $end_code = $code->endCode();
        echo $footer;
        echo $end_code;
    ?>


  </body>
  </html>
