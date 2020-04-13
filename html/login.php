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
			<h3>LOGIN</h3>
		</div>
		<div class="body">
			<form method="post" action="../includes/login.inc.php">
				<div>
					<label for="name">Enter Name</label><br>
					<input type="text" name="name">
				</div><br>
			<!-- 	<div>
					<label for="email">Email</label><br>
					<input type="email" name="email">
				</div><br> -->
				<div>
					<label for="password">Enter Password</label><br>
					<input type="password" name="password"><br><br>
				</div><br>
				<div class="submit">
					<button type="submit" name="login">SUBMIT</button>
				</div>
			</form>
		</div>
		<div><h6><a href="Register.php">CREATE ACCOUNT</a></h6></div>
	</div>
</section>
</body>
</html>