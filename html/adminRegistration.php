<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="../css/adminRegistration.css">
</head>
<body>
<section>
	<div class="main">
		<div class="header">
			<h1>Njangi And 	Savings Corporation</h1>
			<h3>ADMIN REGISTER</h3>
		</div>
		<div class="body">
			<form method="post" action="../includes/adminRegistration.inc.php">
				<div>
					<label for="name">Enter Name</label><br>
					<input type="text" name="name">
				</div><br>
				<div>
					<label for="role">Enter Name</label><br>
					<input type="hidden" name="role" value="Admin">
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
		<div><h6><a href="adminLogin.php">ALREADY HAVE AN ACCOUNT <small>LOGIN</small></a></h6></div>
	</div>
</section>
</body>
</html>