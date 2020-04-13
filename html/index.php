<?php
session_start();

if (!isset($_SESSION['userId'])) {
	header("Location:login.php");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
      if (isset($_SESSION['userId'])) {
      	?>
      <form method="post" action="../includes/logout.inc.php">
	       <button type="submit" name="Logout">Logout</button>
      </form>
<?php
      }

	?>

</body>
</html>