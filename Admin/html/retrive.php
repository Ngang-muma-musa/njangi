
<?php 
require "../../includes/db.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>RETRIVAL</title>
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <style type="text/css">
    section{
      position: absolute;
      left: 50%;
      top: 10%;
      transform: translate(-50%);
      background-color: white;
      padding: 2rem;
     box-shadow:0 1px 5px rgba(104, 104, 104, 0.8);
    }
    h4{
      text-align: center;
      color: green;
    }
    a{
      text-decoration: none;
      background-color: green;
      padding: 0.5rem;
      border-radius: 3px;
      color: white;
      box-shadow: 0px 4px 5px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>
<section>
   <div class="retrive-table">
                  
                  <?php

// ............................................ if members transactions where found.............................

                  if (isset($_POST['retriv'])) {

                          $week =  $_POST['retrive_week'];
                          $name =  $_POST['retrive_name'];

                          $retrival_code = $name . $week;

                          $sql5  = "SELECT * FROM payments WHERE payment_id = $retrival_code";
                          $result5 = mysqli_query($conn,$sql5);
                          
                          $sql6  = "SELECT title FROM week WHERE week_id = $week";
                          $result6 = mysqli_query($conn,$sql6);
                          while ($row = mysqli_fetch_assoc($result6)) {
                            $title = $row['title'];
                          }

                          $sql7  = "SELECT name FROM members WHERE member_id = $name";
                          $result7 = mysqli_query($conn,$sql7);
                          while ($row = mysqli_fetch_assoc($result7)) {
                            $name = $row['name'];
                          }


                          if (mysqli_num_rows($result5)>0) {
                            ?>
                            <h1><?php echo $title; ?></h1><h4>TRANSACTION FOUND</h4>

                              <table>
                                <thead>
                                     <th>Name</th>
                                     <th>Status</th>
                                     <th>Ammount</th>
                                </thead>
                                <tbody>
                            <?php
                         while ($row = mysqli_fetch_assoc($result5)) {
                         $ID = $row['payment_id'];
                         $amt = $row['amount'];
                         ?>
                          <tr>
                                <td><?php echo $name;?></td>
                                <td style="color: green;"><?php echo "PAID"?></td>
                                <td><?php echo $amt;?></td>
                          </tr>

                         <?php
                              }
                              ?>
                            </tbody>
                            </table>
                              <?php
                          }

                         // ................. ..........................If members transactions where not fond..............................
                        else{
                                      echo "<h1 style='color: red;'>TRANSCTION NOT FOUND NO PAYMENT MADE</h1>";
                        }

                        }
// ....................
            ?>
             
     </div><br><br>
     <a href="admin.php">HOME</a>
</section>
</body>
</html>