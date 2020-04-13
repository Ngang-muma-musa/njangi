<?php
if (isset($_GET['id'])) {
	$more_id = $_GET['id'];
    $sql3 = "SELECT week_id FROM week WHERE active = 'ACTIVE'";
    $result3 = mysqli_query($conn,$sql3);
        while ($rows = mysqli_fetch_assoc($result3)) {
        $week_id = $rows['week_id'];    
    }
      $combined_id = $more_id . $week_id;

    $sql = "SELECT * FROM payments WHERE payment_id = $combined_id";
    $result = mysqli_query($conn,$sql);

    $sql2 = "SELECT * FROM members WHERE member_id = $more_id";
    $result2 = mysqli_query($conn,$sql2);

    while ($rows = mysqli_fetch_assoc($result2)) {
    	$Name = $rows['name'];
    	$location = $rows['location'];
    	$phonenumber = $rows['phonenumber'];
    	$email = $rows['email'];
    	$image = $rows['image'];	
    }
}