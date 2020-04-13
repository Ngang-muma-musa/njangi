<?php
// session_start();
$sql = "SELECT * FROM members WHERE member_id = $id";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
	 $Name = $row['name'];
	 $Location = $row['location'];
	 $Phonenumber = $row['phonenumber'];
	 $Email = $row['email'];
	 $image = $row['image'];
}


$sql2 = "SELECT week_id,Title,benefiter FROM week WHERE active = 'ACTIVE'";
$result2 = mysqli_query($conn,$sql2);
	while ($rows = mysqli_fetch_assoc($result2)) {
	  $Title = $rows['Title'];
	  $week_id = $rows['week_id'];
	   $benefiter = $rows['benefiter'];
     }


$sql3 = "SELECT name,image,member_id FROM members";
$result3 = mysqli_query($conn,$sql3);

$sql4 = "SELECT sum(amount) AS total FROM payments WHERE week_id = $week_id ";
$result4 = mysqli_query($conn,$sql4);
while ($row = mysqli_fetch_assoc($result4)) {
 $total =  $row["total"];
}