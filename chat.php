<?php
require_once("User.php");
$config = new User();

require_once("Components.php");
$code = new Components();
$starter_code = $code->dashboardStarterCode();
$header = $code->dashboardHeader();
$sidebar = $code->dashboardSidebar();

echo $starter_code;
echo("<head><title>Direct Messages</title></head>");
?>

<body>

<div class="container">
    <?php
    echo $header;
    echo $sidebar;
    ?>

    <div class="row">
        <div class="col-lg-12 my-4">

            <h2>Welcome to Direct Messages!</h2>

            <br>
            <div class="card" style="width: ;">
                <div class="card-body">
                    <?php
                    // Fetch direct messages for the logged-in user
                    $user_id = $_SESSION['user_id'];
                    $messages_query = mysqli_query($config->conn, "SELECT * FROM direct_messages WHERE receiver_id = $user_id");
                    if (mysqli_num_rows($messages_query) > 0) {
                        while ($message_row = mysqli_fetch_assoc($messages_query)) {
                            ?>
                            <div class="message">
                                <p>
                                    <span><?php echo $message_row['sender_name']; ?> :</span>
                                    <?php echo $message_row['message']; ?>
                                </p>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div class="container-fluid">
                            <div class="row col-lg-6">
                                <div class="message">
                                    <p>
                                        No messages available.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Form to send direct messages -->
            <form class="form-horizontal" method="post" action="sendDirectMessage.php">
                <div class="row">
                    <div class="col-sm-5">
                        <input type="text" name="recipient" class="form-control" placeholder="Recipient email">
                    </div>
                    <div class="col-sm-5">
                        <textarea name="msg" class="form-control" placeholder="Type your message here..."></textarea>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
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
