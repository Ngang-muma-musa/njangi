<?php
require "../../includes/db.php";
session_start();
 $id = $_SESSION['userId'];

if (isset($_POST['update'])) {
	 $target = "../../images/".basename($_FILES['image']['name']);
	$name = $_POST['name'];
	$location = $_POST['location'];
	$phonenumber = $_POST['phonenumber'];
	$email = $_POST['email'];
	$Image = $_FILES['image']['name'];

    
    if (empty($name)||empty($location)||empty($phonenumber)||empty($email)) {
    	header("Location:../html/frontend.php?error=empty fields");
    	exit();
    }
    else{
    	$stmt = mysqli_stmt_init($conn);
    	$sql2 = "UPDATE members SET name=? , location=? , phonenumber=? , email=?, image=? WHERE member_id= $id";
    	if (!mysqli_stmt_prepare($stmt,$sql2)) {
    		header("Location:../html/frontend.php?error=error");
    	    exit();
    	}
    	else{
    		mysqli_stmt_bind_param($stmt,"sssss",$name,$location,$phonenumber,$email,$Image);
    		mysqli_stmt_execute($stmt);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
    		header("Location:../html/frontend.php?succes=updated succesfully");
    	    exit();
    	}
    }
 mysqli_stmt_close($stmt);
     mysqli_close($conn);
}