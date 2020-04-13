<?php
require "../../includes/db.php";
if (isset($_GET['Approve'])) {
	$Id  = $_GET['Approve'];

	$sql = "UPDATE members SET user_acc_status = 'APPROVED' WHERE member_id = $Id";
	$result = mysqli_query($conn,$sql);
		header("Location:../html/aprove.php?Approve=succesful");
		exit();
}