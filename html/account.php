
<?php
require "../../includes/db.php";
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $sql = "SELECT name FROM week WHERE id = $id";
  $result = mysqli_query($conn,$sql);
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
         <h3><?php  echo $name?></h3><br>
         <form id="update">
           <label for="amount">Amount</label>
           <input type="number" name="amount"><br><br>
           <label for="amount">Status</label>
           <select>
             <option value="PAID">PAID</option>
              <option value="NOTPAID">NOTPAID</option>
           </select><br><br>
           <button>SUBMIT</button>
         </form>
       </div>
     </div>
</body>
</html>