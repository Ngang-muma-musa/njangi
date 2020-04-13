<?php

require "db.php";
if (isset($_POST['submit'])) {
	$target = "../images/".basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

	$name = $_POST['name'];
	$role = $_POST['role'];
	$location = $_POST['location'];
	$phonenumber = $_POST['phonenumber'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$user_acc_status = $_POST['user_acc_status'];
	$email = $_POST['email'];

	

	if(empty($name)||empty($role)||empty($location)||empty($phonenumber)||empty($password)||empty($phonenumber)||empty($email)){
		header("Location:../html/Register.php?error=Empty Fields");
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
		header("Location:../html/Register.php?error=invalid fields");
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header("Location:../html/Register.php?error=Invalid email");
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
		
	}
	elseif ($password !== $password2) {
		header("Location:../html/Register.php?error=Wrong Password");
		exit();
	}
	else{
		$sql = "SELECT name FROM members WHERE name = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../html/Register.php?error=Registration Failedd");
		    exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$name);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultcheck = mysqli_stmt_num_rows($stmt);
			if ($resultcheck > 0) {
				header("Location:../html/Register.php?error=User Taken");
		        exit();
			}
			else{

				$sql = "INSERT INTO members (role,name,location,phonenumber,email,pwd,image,user_acc_status) VALUES (?,?,?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
					header("Location:../html/Register.php?error=sqlerror");
				    exit();
				}
				else{
					$hashedpassword = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,"ssssssss",$role,$name,$location,$phonenumber,$email,$hashedpassword,$image,$user_acc_status);
					mysqli_stmt_execute($stmt);
					move_uploaded_file($_FILES['image']['tmp_name'],$target);
				  	header("Location:../html/Register.php?signup=Registration succesful waiting for appruval");
                    exit();
				}

				if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
	                header("Location:../html/Register.php?signup=picture not uploaded");
			        exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}

else{
	header("Location:../html/Register.php");
    exit();
}
