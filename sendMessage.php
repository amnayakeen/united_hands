<?php

require_once("User.php");
$user= new User();
session_start();
if($_POST)
{
	$user_id=$_SESSION["user_id"];
	$query=mysqli_query($user->conn,"SELECT * FROM user WHERE user_id='$user_id'");
	$rec=mysqli_fetch_assoc($query);
	$name=$rec['name'];
	$_SESSION["name"]=$name;
    $msg=$_POST['msg'];
	echo $name;

	$sql="INSERT INTO `chat`(`name`, `message`) VALUES ('".$name."', '".$msg."')";

	$query = mysqli_query($user->conn,$sql);
	if($query)
	{
		header('Location: groupchat.php');
	}
	else
	{
		echo "Something went wrong";
	}

	}
?>
