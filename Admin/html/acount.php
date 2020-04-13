
<?php
session_start();
$Id = $_SESSION['weekid']; 
require "../../includes/db.php";
require "../../includes/db.php";
if (!isset($_SESSION['role'])&&!isset($_SESSION['name'])) {
  header("Location:../../html/adminLogin.php");
  exit();
}
else{
  if ($_SESSION['role']!=="Admin" && $_SESSION['name']!=="Admin") {
     header("Location:../../html/adminLogin.php");
     exit();
  }else{
    if(isset($_GET['id'])){
  $id = $_GET['id'];

  $sql = "SELECT name FROM week WHERE id = $id";
  $result = mysqli_query($conn,$sql);
}

if (isset($_POST['submit'])) {
  $amt = $_POST['amount'];
  $status = $_POST['status'];

  if (empty($amt)||empty($status)) {
    header("Location:acount.php?error=Empty Fields");
    exit();
  }
  else{
    // if the ammount is greater than zero
    $sqll = "SELECT ammount FROM week WHERE id = $id";
     $resultt = mysqli_query($conn,$sqll);
     while ($row = mysqli_fetch_assoc($resultt)) {
        $amt1 = $row['ammount'];
     }

    $sql = "UPDATE week SET status = ? , ammount=? WHERE id = $id";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
       header("Location:acount.php?error=Failed");
       exit();
    }
    else{
      mysqli_stmt_bind_param($stmt,"ss",$status,$amt);
      mysqli_stmt_execute($stmt);


       $sql2 = "SELECT ammount FROM total WHERE week_id = $Id";
       $result2 =  mysqli_query($conn,$sql2);

       while ($row = mysqli_fetch_assoc($result2)) {
         $amtt = $row['ammount'];
       }
       if($amt1>0){
          $amtTotal = $amt + $amtt-$amt1;
       }else{
        $amtTotal = $amt + $amtt;
       }
       
       $sql3 ="UPDATE total SET ammount = ? WHERE week_id = $Id";
         $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt,$sql3)) {
             header("Location:acount.php?error=Failed");
             exit();
           }
           else{
                 mysqli_stmt_bind_param($stmt,"i",$amtTotal,);
                 mysqli_stmt_execute($stmt);
           }
       header("Location:admin.php?succes=Account Updated");
       exit();
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Account</title>
  <link rel="stylesheet" type="text/css" href="../css/account.css">
</head>
<body>
       <div class="modal hidden">
       <div class="modal_content">
        <div class="modal_close-bar">
          <span>X</span>
        </div>

        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
          }

        ?>
         <h3><?php  echo $name?></h3>
         <form  method="post" action="">
           <label for="amount">Amount</label>
           <input type="number" name="amount"><br><br>
           <label for="status">Status</label>
           <select name="status">
             <option value="PAID">PAID</option>
              <option value="NOTPAID">NOTPAID</option>
               <option value="NOTCOMPLETE">NOTCOMPLETE</option>
           </select><br><br>
           <button type="submit" name="submit">SUBMIT</button>
         </form>
       </div>
     </div>
</body>
</html>
<?php
  }
}
?>