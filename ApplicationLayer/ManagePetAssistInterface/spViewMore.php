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
      height: 710px;
      border: 5px outset #221A57;
      text-align: left;
      font-family: Itim, cursive;
    }

    label{
      width:150px;
    }
  </style>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>RRMS</title>

  <?php
  $Role=$_SESSION['role'];
  ?>
</head>
<body>

<?php

//Service Provider Account Interface
if ($Role==3) {
?>
  <div class="header">
    <?php include '../../includes/ServicePTopNaviBarPets.php';?>
  </div>

    <br style="clear: both;"> 

    <div class="contentRight">

    <?php
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';
  $providerID = $_SESSION['providerID']; 
  $OrderPA_ID = $_GET['OrderPA_ID'];


  $spBookingDetails = new petController();
  $data = $spBookingDetails->spBookingDetails($OrderPA_ID);
  

  foreach ($data as $row) {


  ?>

    <center>
    <div class=myUpdate>
        <h1 style="font-size: 20px; text-align: center;">Booking Information</h1><br>
        <div style="padding-left: 50px;">
        <label style="padding-right:50px;">Customer ID:</label>
        <label><?=$row['Cus_ID'];?></label><br>  
        <label style="padding-right:50px;">Drop Off Date:</label>
        <label><?=$row['OPA_Dropoff'];?></label><br>   
        <label style="padding-right:50px;">Pick Up Date:</label>
        <label><?=$row['OPA_Pickup'];?></label><br>
        <label style="padding-right:50px;">Drop off Time:</label>
        <label><?=$row['OPA_TimeStart'];?></label><br> 
        <label style="padding-right:50px;">Pick up Time:</label>
        <label><?=$row['OPA_TimeEnd'];?></label><br> 
        <label style="padding-right:50px;">Number of Pets:</label>
        <label><?=$row['NumOfPets'];?></label><br> 
        <label style="padding-right:50px;">Number of Days:</label>
        <label><?=$row['NumOfDays'];?></label><br> 
        <label style="padding-right:50px;">Breed:</label>
        <label><?=$row['Breed'];?></label><br> 
        <label style="padding-right:50px;">Pet Image:</label>
        <img src="<?=$row['Pet_Image'];?>" style="width: 40%;height: 200px;margin-left: 12px; margin-top: 20px;"><br><br>

      <form action="" method="POST">
        <label for="totalprice">Total Price:</label>
        <input type="text" id="Totalprice" name="Totalprice"><br><br>
         
    <div>
      <input type="submit" name="accept" value="Accept" class="w3-circle w3-button w3-black">
      <input type="submit" name="decline" value="Decline" class="w3-circle w3-button w3-black">
    </div>
    <div>
      <input type="button" onclick="location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/spBookings.php'" value="Back" style="float: right; margin-right: 10px" class="w3-circle w3-button w3-black">
    </div><br>
    </form>
  </div>
  </div>
  </div>
    </center>

<?php
    }
     if(isset($_POST['accept'])){
      require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

      $updateBooking1 = new petController();
      $updateBooking1->updateBooking1($OrderPA_ID);
    }

    if(isset($_POST['decline'])){
      require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

      $updateBooking2 = new petController();
      $updateBooking2->updateBooking2($OrderPA_ID);
    }
?>
 <br style="clear: both;"> 
  </div>
<?php
}
?>
</body>
</html>