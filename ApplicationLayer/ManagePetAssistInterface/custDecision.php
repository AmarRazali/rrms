<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    .myUpdate{
      width: 50%;
      height: 600px;
      border: 5px outset #221A57;
      text-align: left;
      font-family: Itim, cursive;
    }

  </style>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>RRMS</title>

  <?php
  include '../../includes/custTopNaviBarPets.php';
  ?>

  <?php
  $Role=$_SESSION['role'];
  ?>
</head>
<body>

<?php

//Service Provider Account Interface
if ($Role==1) {
?>

    <br style="clear: both;"> 


    <?php
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';
  $customerID = $_SESSION['customerID']; 
  $OrderPA_ID = $_GET['OrderPA_ID'];


  $myBookingsDetails = new petController();
  $data = $myBookingsDetails->myBookingsDetails($OrderPA_ID);

  

  foreach ($data as $row) {


  ?>

    <center>
    <div class=myUpdate>
    <h1 style="font-size: 20px; text-align: center;">Booking Information</h1><br>
        <div style="padding-left: 50px;">
        <label style="padding-right:50px; width: 200px;">Service Provider ID:</label>
        <label><?=$row['ServiceP_ID'];?></label><br>  
        <label style="padding-right:50px; width: 200px;">Drop Off Date:</label>
        <label><?=$row['OPA_Dropoff'];?></label><br>   
        <label style="padding-right:50px; width: 200px;">Pick Up Date:</label>
        <label><?=$row['OPA_Pickup'];?></label><br>
        <label style="padding-right:50px; width: 200px;">Drop off Time:</label>
        <label><?=$row['OPA_TimeStart'];?></label><br> 
        <label style="padding-right:50px; width: 200px;">Pick up Time:</label>
        <label><?=$row['OPA_TimeEnd'];?></label><br> 
        <label style="padding-right:50px; width: 200px;">Number of Pets:</label>
        <label><?=$row['NumOfPets'];?></label><br> 
        <label style="padding-right:50px; width: 200px;">Number of Days:</label>
        <label><?=$row['NumOfDays'];?></label><br> 
        <label style="padding-right:50px; width: 200px;">Breed:</label>
        <label><?=$row['Breed'];?></label><br>
        <label style="padding-right:50px; width: 200px;">Total Price:</label>
        <label><?=$row['OPA_TotalPrice'];?></label><br> 
        <label style="padding-right:50px; width: 200px;">Pet Image:</label>
        <img src="<?=$row['Pet_Image'];?>" style="width: 40%;height: 200px;margin-left: 12px; margin-top: 20px;"><br><br>

   <form action="" method="POST">
   <div style="padding-left: 200px">
      <input type="submit" name="acceptcust" value="Accept" <?php if ($row['statusSP'] == 'Pending'){ ?> disabled <?php   } ?> class="w3-circle w3-button w3-black">
      <input type="submit" name="declinecust" value="Decline" <?php if ($row['statusSP'] == 'Pending'){ ?> disabled <?php   } ?> class="w3-circle w3-button w3-black">
    </div><br>
  </form>

  </div>
  </div>
    </center>

<?php
    }
     if(isset($_POST['acceptcust'])){
      require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

      $custDec = new petController();
      $custDec->custDec($OrderPA_ID);
    }

    if(isset($_POST['declinecust'])){
      require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

      $custDec1 = new petController();
      $custDec1->custDec1($OrderPA_ID);
    }
?>
 <br style="clear: both;"> 
  </div>
<?php
}
?>
</body>
</html>