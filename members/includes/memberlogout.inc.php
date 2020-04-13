<?php
if (isset($_POST['submit'])) {
	session_unset();
	session_destroy();
	header("Location:../html/login.php");
	exit();
}