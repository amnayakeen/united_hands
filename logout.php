<?php
	require_once("User.php");
    $user = new User();
    $logout = $user->logout();
    echo $logout;

?>
