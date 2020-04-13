<?php
session_start();
require "../../includes/db.php";
if (isset($_POST['new_week'])) {
    
    $sql = "UPDATE Week SET active = 'INACTIVE' WHERE active  = 'ACTIVE'";
    $result = mysqli_query($conn,$sql);

	$Title = $_POST['Title'];
    $ammount = $_POST['ammount'];
    $active = $_POST['active'];
    $benefiter  = $_POST['benefiter'];
    $timestamp = mktime();
  
    $sql = "INSERT INTO week (week_id,title,ammount,benefiter,active) VALUES (?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
    	header("Location:../html/admin.php?error=FAILED");
    	exit();
    }
    else{
    	mysqli_stmt_bind_param($stmt,"isiss",$timestamp,$Title,$ammount,$benefiter,$active);
    	mysqli_stmt_execute($stmt);
    	header("Location:../html/admin.php?succes=Beneficiary successfuly added");
    	exit();
    }
}