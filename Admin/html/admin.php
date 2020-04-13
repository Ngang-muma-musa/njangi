<?php
session_start(); 
require "../../includes/db.php";
if (!isset($_SESSION['role'])&&!isset($_SESSION['name'])) {
  header("Location:../../html/adminLogin.php");
  exit();
}
else{
  if ($_SESSION['role']!=="Admin" && $_SESSION['name']!=="Admin") {
     header("Location:../../html/adminLogin.php");
     exit();
  }
  else{

// require"../adminincludes/retrive.inc.php";
$sql = "SELECT * FROM week WHERE active = 'ACTIVE'";
$result = mysqli_query($conn,$sql);
while ($rows = mysqli_fetch_assoc($result)) {
  $Title = $rows['title'];
  $week_id = $rows['week_id'];
  $amt = $rows['ammount'];
  $benefiter = $rows['benefiter'];
}

$sql2 = "SELECT * FROM members WHERE user_acc_status = 'APPROVED' ";
$result2 = mysqli_query($conn,$sql2);

$sql4 = "SELECT sum(amount) AS total FROM payments WHERE week_id = $week_id ";
$result4 = mysqli_query($conn,$sql4);
while ($row = mysqli_fetch_assoc($result4)) {
 $total =  $row["total"];
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
  <div class="main">
     <section>
      <div class="ad">
          <ul>
            <div class="ul">
                 <div><li><a  class="link" href="admin.php">Home</a></li></div>
                 <div><li><a  class="link" href="aprove.php">Approve</a></li></div>
            </div>
          </ul>
      </div>
          <div class="admincontent">
               <div class="btn">
                   <a onclick="tabs(0)" href="#">Manage-Week</a> 
                    <a onclick="tabs(1)" href="##">Create-New-Week</a>
                   <a onclick="tabs(2)" href="##">Retrive-transaction</a>    
               </div><br> 
               <div class="logout" style="float: right; margin-top:0px;"> 
                   <form method="post" action="../../includes/logout.inc.php"> 
                       <button type="submit" name="logout">LOGOUT</button>
                   </form>
               </div> 
               <div class="content tab">
                    <h1><?php echo $Title; ?></h1>
                   <!--  Week Code -->:<!-- <h4><?php echo $Id;?></h4><br> -->
                    <table>
                         <thead>
                              <th>Name</th>
                              <th>Status</th>
                              <th>Amount</th>
                              <th>Action</th>
                         </thead>
                         <tbody>
                          <?php
                                while ($row = mysqli_fetch_assoc($result2)) {
                                      $id = $row['member_id'];
                                      // $weekId = $row['week_id'];
                                      $name = $row['name'];
                                      // $status = $row['status'];
                                     ?>
                                    <tr>
                                       <td><?php echo $name;?></td>

                                       <?php 
                                          $combined_id = $id . $week_id;
                                          $sql = "SELECT * FROM payments WHERE payment_id = $combined_id";
                                          $resullt = mysqli_query($conn,$sql);
                                          if (mysqli_num_rows($resullt)>0) {
                                            ?>
                                           <td style="color: green;"> <?php echo "PAID";?></td>
                                            <td> <?php echo $amt;?></td>
                                             <td><?php echo "PaymentMade";?></td> 
                                            <?php
                                          }
                                          else{
                                            ?>
                                             
                                                 <td style="color: red;"> <?php echo "NOTPAID";?></td>
                                                  <td> <?php echo "0FCFA";?></td>
                                                    <td><a class="edit" href="../adminincludes/makepayments.inc.php?id=<?php echo $id;?>">MakePayments</a></td>
                                            <?php
                                          }

                                       ;?></td>
                              
                                       
                                  </tr>

                              <?php 
                                }
                          ?>
                              
                            <tr>
                              <td style="color: red;">TOTAL</td>
                              <td></td>
                              <td><?php echo $total; ?>FCFA</td>
                               <td></td>  
                            </tr> 
                            <tr>
                              <td style="color: green";>BENEFITER</td>
                              <td></td>
                              <td style="text-transform:capitalize;"><?php echo $benefiter; ?></td>
                              <td></td>
                            </tr>   
                         </tbody>
                    </table><br><br>
                     </div>
                    <!--................................................... create new week ................................................................................. -->
                    <div class="beneficiary tab">
                      <h1>CREATE NEW WEEK</h1>
                     <form method="post" action="../adminincludes/new_week.inc.php">
                       <input type="text" name="Title" placeholder="Enter Title For The Week"><br><br>
                       <input type="number" name="ammount" placeholder="Enter Amount For The Week"><br><br>
                       <input type="text" name="benefiter" placeholder="Enter benefiter"><br><br>
                       <input type="hidden" name="active" value="ACTIVE">
                       <button type="submit" name="new_week">Create-Week</button>
                     </form>
                    </div>
                    <!--................................................. retrive......................................................... -->
                    <div class="retrive tab">
                         <br><br>
                          <h1>RETRIVE TRANSACTIONS</h1>
                         <div class="input">
                              <form method="post" action="retrive.php">
                                    <label for="retrive_name">Choose member</label><br>
                                  <select name="retrive_name">
                                    <?php
                                    $sql3 = "SELECT * FROM members WHERE user_acc_status = 'APPROVED' ";
                                    $result3 = mysqli_query($conn,$sql3);
                                          while ($rows = mysqli_fetch_assoc($result3)) {
                                            $Retrive_name = $rows['name'];
                                            $Retrive_id = $rows['member_id'];
                                            ?>
                                              <option value="<?php echo $Retrive_id;?>"><?php echo $Retrive_name;?></option>
                                            <?php
                                          }
                                    ?>

                                  </select><br><br>
                                  <!-- querry to bring out all weeks -->
                                   <label for="retrive_week">Choose week</label><br>
                                  <select name="retrive_week">
                                    <?php
                                    $sql4 = "SELECT * FROM week";
                                    $result4 = mysqli_query($conn,$sql4);
                                          while ($rows = mysqli_fetch_assoc($result4)) {
                                            $Retrive_title = $rows['title'];
                                            $Retrive_id = $rows['week_id'];
                                            ?>
                                              <option value="<?php echo $Retrive_id;?>"><?php echo $Retrive_title;?></option>
                                            <?php
                                          }
                                    ?>

                                  </select><br><br>


                                   <button type="submit" name="retriv">Retrive</button>
                              </form>
                              </div>
                              <br><br>
                             
                    </div>
                    
          </div>
     </section>
     </div>
     <script type="text/javascript" src="../JS/jquery-3.4.1.js"></script>
     <script type="text/javascript" src="../JS/mainn.js"></script>
</body>
</html>
<?php
  }
}
?>
