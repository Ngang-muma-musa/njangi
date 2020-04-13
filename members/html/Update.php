<?php
session_start();
 $id = $_SESSION['userId'];
 $Name = $_SESSION['userName'];
require"../../includes/db.php";
if (!isset($_SESSION['userId'])&&!isset($_SESSION['userName'])) {
  header("Location:../../html/Login.php");
  exit();
}
else{

$sql  = "SELECT * FROM members WHERE member_id = $id";
$result = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_assoc($result)) {
	$name = $row['name'];
	$location = $row['location'];
	$phonenumber = $row['phonenumber'];
	$email = $row['email'];
	$image = $row['image'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="../css/Update.css">
</head>
<body>
<section>
<div class="main">
	<form method="post" action="../includes/update.inc.php" enctype="multipart/form-data"">
		<h1>Update  Account</h1>
		<div>
			<label for="name">Enter Name</label><br>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div><br>
		<div>
			<label for="location">Location</label><br>
			<input type="text" name="location" value="<?php echo $location; ?>">
		</div><br>
		<div>
			<label for="email">Email</label><br>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div><br>
		<div>
			<label for="phonenumber">Phonenumber</label><br>
			<input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>">
		</div><br>
		<div>
			<label for="image">Choose Profile Image</label><br><br>
			<input type="file" name="image" value="<?php echo $image; ?>">
		</div><br>
		<div class="submit">
			<button type="submit" name="update">UPDATE</button>
		</div>
	</form>
</div>
</section>
</body>
</html>
<?php
}
?>