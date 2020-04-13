<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="../css/login2.css">
</head>
<body>
<section>
	<div class="main">
		<div class="header">
			<h1>Njangi And 	Savings Corporation</h1>
			<h3>REGISTER</h3>
		</div>
		<div class="body">
			<form action="../includes/Register.inc.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="size" value="1000000"><br>
	    		<div>
	    			<label for="image">Choose Profile Image</label><br><br>
	    			<input type="file" name="image">
	    		</div><br>
				<div>
					<label for="name">Enter Name</label><br>
					<input type="text" name="name">
				</div><br>
				<div>
					<input type="hidden" name="role" value="member">
				</div>
					<div>
					<input type="hidden" name="user_acc_status" value="UNAPPROVED">
				</div>
				<div>
					<label for="location">Location</label><br>
					<input type="text" name="location">
				</div><br>
				<div>
					<label for="email">Email</label><br>
					<input type="email" name="email">
				</div><br>
				<div>
					<label for="phonenumber">Phonenumber</label><br>
					<input type="text" name="phonenumber">
				</div><br>
				<div>
					<label for="password">Enter Password</label><br>
					<input type="password" name="password"><br><br>
					<label for="password2">Repeat Password</label><br>
					<input type="password" name="password2">
				</div><br>
				<div class="submit">
					<button type="submit" name="submit">SUBMIT</button>
				</div>
			</form>
		</div>
		<div><h6><a href="login.php">ALREADY HAVE AN ACCOUNT <small>LOGIN</small></a></h6></div>
	</div>
</section>
</body>
</html>