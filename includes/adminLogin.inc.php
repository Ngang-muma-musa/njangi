<?php
require "db.php";
if (isset($_POST['login'])) {
	$name = $_POST['name'];
	$password = $_POST['password'];
	if (empty($name)||empty($password)) {
		header("Location:../html/adminlogin.php?error=Pleasefillallfields");
		exit();
	}
	else{
		$sql ="SELECT * FROM admin WHERE name = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../html/adminlogin.php?error=error");
		    exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$name);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$passwordCheck = password_verify($password,$row['pwd']);
				if ($passwordCheck == false) {
					header("Location:../html/adminlogin.php?error=Wrongpassword");
		             exit();
				}
				elseif($passwordCheck == true){
                    session_start();

                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['userName'] = $row['name'];
                    $_SESSION['role'] = $row['role'];

                                       // ........................
                            $sql6 = "SELECT * FROM session";
						     $result6 = mysqli_query($conn,$sql6);
						       if (mysqli_num_rows($result6) > 0) {
						        while ($row = mysqli_fetch_assoc($result6)) {
						          $id =  $row['id'];
						          $general_id = $row['week_id'];
						        }

						         $_SESSION['weekid'] = $general_id; 
						 } 

                    header("Location:../Admin/html/admin.php");
		            exit();
				}
				else{
					header("Location:../html/adminlogin.php?error=Wrongpassword");
		            exit();
				}
			}
			else{
				header("Location:../html/adminlogin.php?error=Nouser");
		        exit();
			}
		}
	}
}