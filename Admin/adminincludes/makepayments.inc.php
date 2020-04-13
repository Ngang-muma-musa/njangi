<?php
if (isset($_GET['id'])) {
	require "../../includes/db.php";
	$id = $_GET['id'];
     

	$sql = "SELECT * FROM week WHERE active = 'ACTIVE'";
	$result = mysqli_query($conn,$sql);
	while ($rows = mysqli_fetch_assoc($result)) {
	  $Title = $rows['title'];
	  $week_id = $rows['week_id'];
	  $amt = $rows['ammount'];

     
     }
        $payment = $id . $week_id;
        $sql2 = "INSERT INTO payments (member_id,payment_id,week_id,amount) VALUES ($id,'$payment',$week_id,$amt)";
        $result2 = mysqli_query($conn,$sql2);

      header("Location:../html/admin.php");
   exit();
}