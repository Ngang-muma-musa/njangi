<?php
session_start();
 $id = $_SESSION['userId'];
 $Name = $_SESSION['userName'];
require"../../includes/db.php";
include"../includes/userimport.inc.php";
if (!isset($_SESSION['userId'])&&!isset($_SESSION['userName'])) {
  header("Location:../../html/Login.php");
  exit();
}
else{
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>PROFILE</title>
	<link rel="stylesheet" type="text/css" href="../css/fontend.css">
</head>
<body>
<section>
	<!--.......................................... Profile Head................................. -->
	<div class="profile-header">
			<div class="profile-img">
				<img src="../../images/<?php echo $image;?>" width="200">
			</div>
			<div class="profile-nav-info">
				<h3 class="user-name"><?php echo $Name;?></h3>
				<div class="address">
			
				</div>
			</div>
	
		</div>
		<!-- ............................Status................................................... -->
		<div class="status">
			<div class="status-info">

				<h3><?php 
				echo $Title;
                ?></h3>
				<?php    
				 $combined_id = $id . $week_id;
                  $sql = "SELECT * FROM payments WHERE payment_id = $combined_id";
                  $resullt = mysqli_query($conn,$sql);
                  if (mysqli_num_rows($resullt)>0) {
                    ?>
                  <p class="amt">PAID</p>
                    <?php
                  }
                  
                  else{
                  	  ?>
                  <p class="amt">NOTPAID</p>
                    <?php
                  }
                  ?>
			</div>
		</div>
		<!-- .................................Main................................................ -->
		<div class="right-side">
				<div class="nav">
					<ul>
						<li onclick="tabs(0)"class="user-post">MEMBERS</li>
						<li onclick="tabs(1)"class="user-reviews">BENEFICIARY</li>
						<li onclick="tabs(2)"class="user-settings">PROFILE</li>
					</ul>
				</div>
				<div  class="profile-body">
					<div class="profile-post tab">
						<?php
                            
                            while ($row =  mysqli_fetch_assoc($result3)) {
                            	$name = $row['name'];
	                            $image = $row['image'];
	                            $ID = $row['member_id'];
	                            ?>
                                   	<div class="members">
										<div class="image">
											<img src="../../images/<?php echo $image;?>" width="50">
										</div>
										<div class="name-status">
										<p style="text-transform: capitalize;"><?php echo $name; ?> <br><?php 

                                         
                                          $combined_id = $ID . $week_id;
                                          $sql = "SELECT * FROM payments WHERE payment_id = $combined_id";
                                          $resullt = mysqli_query($conn,$sql);
                                          if (mysqli_num_rows($resullt)>0) {
                                            ?>
                                           <small style="color: green;"> <?php echo "PAID";?></small>
                                          
                                            <?php
                                          }
                                          else{
                                            ?>
                                             
                                                 <small style="color: red;"> <?php echo "NOTPAID";?></small>
                                                
                                            <?php
                                          }
										?></p>
										</div>
										<div class="more">
										<div><a class="moree" href="more.php?id=<?php echo $ID;?>">more</a></div>
										</div>

									</div><br>
	                            <?php
                            }
                          
						?>
					</div>
					<div class="profile-review tab">
						<div class="contributions">
							<div><p><b>Amount</b></p><h1><?php echo $total;?>FCFA
							</h1>
							<?php
                                  if (!empty($benefiter)) {
                                  	?>
                                  	<p><b>Beneficiary</b></p><h4 style="text-transform: capitalize;"><?php echo $benefiter;?></h4></div>
                                  	<?php
                                
                                   }
                                   elseif(empty($benefiter)){
                                   	?>
                                   	<p><b>Beneficiary</b></p><h4 style="color: red;"><?php echo "NONE please contact your Admin";?></div>
                                   	<?php
                                   }
							?>
							<!-- <p><b>Beneficiary</b></p><h4>NGANG MUMA MUSA</h4></div> -->
						</div>	
						
					</div>
					<div class="profile-setting tab">
					<div class="account">
						<div><ul>
							<li> <p class="p"> Name</p> <?php echo $Name;?></li>
							<hr>
							<li> <p class="p">Location </p> <?php echo $Location;?></li>
							<hr>
							<li> <p class="p"> PhoneNumber</p> <?php echo $Phonenumber;?></li>
							<hr>
							<li> <p class="p"> Email</p> <?php echo $Email;?></li><br>
						</ul>
						</div>
						<div class="logout">
						<a href="Update.php">UPDATE</a><br><br>
						<form method="post" action="../../includes/logout.inc.php">
							<button type="submit" name="Logout">LOGOUT</button>
						</form>
					</div>
					</div>
					</div>
				</div>
			</div>
</section>
<script type="text/javascript" src="../JS/jquery-3.4.1.js"></script>
<script type="text/javascript" src="../JS/frontend.js"></script>
</body>
</html>
	<?php
}
?>
