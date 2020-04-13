<?php
require "../../includes/db.php";
if (isset($_POST['submit'])) {

	$timestamp = mktime();
	
	// $_SESSION['weekid'] = $timestamp; 
	$status = "NOTPAID";
    $ammount = 0;

   $sql = "SELECT * FROM members";
   $select_from_members = mysqli_query($conn,$sql);
   while ($row = mysqli_fetch_assoc($select_from_members)) {
   	      $id = $row['member_id'];
   	     $name = $row['name'];
// creating anew week with every bodies status being notpaid and amount 0france
       $sqll = "INSERT INTO week (week_id,name,status,ammount) VALUES ($timestamp,'$name','$status',$ammount)";
      $insert_into_week = mysqli_query($conn,$sqll);

   } 

       $sql2 = "INSERT INTO total (week_id,ammount) VALUES ($timestamp,$ammount)";
      $insert_into_total = mysqli_query($conn,$sql2);
// creating seesion to use all over the page for user
       $sql3 = "SELECT * FROM  session";
       $result3 = mysqli_query($conn,$sql3);
       if (mysqli_num_rows($result3) > 0) {
        while ($row = mysqli_fetch_assoc($result3)) {
          $id =  $row['id'];
        }
        $sql5 = "UPDATE session SET week_id = $timestamp  WHERE id = $id";
        $result5 = mysqli_query($conn,$sql5);
       }else{
          $sql4 = "INSERT INTO session (week_id) VALUES ($timestamp)";
          $result4 = mysqli_query($conn,$sql4);

       }

     $sql6 = "SELECT * FROM session";
     $result6 = mysqli_query($conn,$sql6);
       if (mysqli_num_rows($result6) > 0) {
        while ($row = mysqli_fetch_assoc($result6)) {
          $id =  $row['id'];
          $general_id = $row['week_id'];
        }

          session_start();
         $_SESSION['weekid'] = $general_id;

   header("Location:../html/admin.php");
   exit();
      
      // header("Location:generate.inc.php?error=none");
      // exit();  
 }    
}
// ...............................................RETRIVE................................................
// mumaDajuicebobo2000
