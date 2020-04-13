<?php
session_start();
if (isset($_POST['Logout'])) {
	session_unset();
	session_destroy();
	header("Location:../html/login.php");
	exit();
}
if (isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	header("Location:../html/adminlogin.php");
	exit();
}
