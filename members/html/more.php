<?php
session_start();
 $id = $_SESSION['userId'];
 $Name = $_SESSION['userName'];
require"../../includes/db.php";
include"../includes/more.inc.php";
if (!isset($_SESSION['userId'])&&!isset($_SESSION['userName'])) {
  header("Location:../../html/Login.php");
  exit();
}
else{
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../css/more.css">
</head>
<body>
 <section>
 	<div class="user">
 		<div class="img">
 			<img src="../../images/<?php echo $image;?>" width="200">
 		</div>
 		<div class="name" class="name">
 			<h1><?php echo $Name;?></h1>
 		</div>
 	</div>
 	<div class="info">
 		<div class="information">
 		<p class="p">Name</p>
 		<p style="text-transform: capitalize;" ><?php echo $Name;?></p>
 		<p class="p">Location</p>
 		<p ><?php echo $location;?></p>
 		<p class="p">Phonenumber</p>
 		<p ><?php echo $phonenumber;?></p>
 		<p class="p">Email</p>
 		<p><?php echo $email;?></p>
 		<p class="p">Status</p>
 		<?php
         if (mysqli_num_rows($result)==0) {
         	?>
         	<p style="color: red;" class="p"><?php echo 'NOTPAID'?></p>
         	<?php
         }
         else{?>
         	<p style="color: green;" class="p"><?php echo 'PAID'?></p>
         	<?php
         	$sql = "SELECT amount FROM payments WHERE payment_id =  $combined_id ";
         	 $result = mysqli_query($conn,$sql);
         	     while ($rows = mysqli_fetch_assoc($result)) {
                $amt = $rows['amount'];    
            }
         }
 		?>
 		<p class="p">Amount</p>
 		<p><?php if (isset( $amt)) {
 			echo  $amt;
 		} else{
 				echo  "0FCFA";
 		}?></p>
 		<!-- <p class="p">Contact</p> -->
 		<p><a href="https://wa.me/<?php echo $phonenumber;?>">Message</a> <a href="frontend.php">Home</a></p>

 		<!-- <p>Name</p> -->
 		<!-- <p style="color: black;">NGANG MUMA MUSA</p> -->
 		</div>
 	</div>
 </section>
</body>
</html>
<?php
}
?>