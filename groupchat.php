<?php
 require_once("User.php");
 $config= new User();


    /*session_start();
	if(isset($_SESSION['name'])){
        //include "config.php";

		//$sql="SELECT * FROM chat";

		//$query = mysqli_query($config->conn,$sql);

        $query=mysqli_query($config->conn,"SELECT * FROM chat");
    }*/


        require_once("Components.php");
        $code = new Components();
        $starter_code = $code->dashboardStarterCode();
        $header = $code->dashboardHeader();
        $sidebar = $code->dashboardSidebar();



        echo $starter_code;
        echo("<head><title>Group Chat</title></head>");
    ?>



<body>

<div class="container">
<?php
        echo $header;
        echo $sidebar;

        ?>
    <div class="row">
        <div class="col-lg-12 my-4">

        <h2>Welcome to the group chat!</h2>

            <br>
            <div class="card" style="width: ;">
                <div class="card-body">
                    <?php
                    $query=mysqli_query($config->conn,"SELECT * FROM chat");
                    $row = mysqli_fetch_assoc($query);
                    $_SESSION["name"]=$row['name'];
                    if(mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_assoc($query)) {
                    ?>
                            <div class="message">
                                <p>
                                    <span><?php echo $row['name']; ?> :</span>
                                    <?php echo $row['message']; ?>
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
                                        No previous chat available.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <form class="form-horizontal" method="post" action="sendMessage.php">
                <div class="row">
                    <div class="col-sm-11">
                        <textarea name="msg" class="form-control" placeholder="Type your message here..."></textarea>
                    </div>
                    <div class="col-sm-1">
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
