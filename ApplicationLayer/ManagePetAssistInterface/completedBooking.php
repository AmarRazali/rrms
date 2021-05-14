<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    .welcome{
      font-family: Itim, cursive;
    }
  </style>

<title>Complete Booking</title>

    <?php include '../../includes/custTopNaviBarPets.php';?>

    <?php
    $Role=$_SESSION['role'];
    $OrderPA_ID = $_GET['OrderPA_ID'];
    ?>
</head>

<body>
<center>
<div class="welcome">
    <h1 style="padding-top: 200px;font-size: 70px;">Was the appointment completed successfully?</h1>
    <form action="" method="POST">
    <div style="padding-left: 200px">
      <input type="submit" name="yes" value="Yes" class="w3-circle w3-button w3-black">
	  <input type="button" onclick="location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/myBookingsAll.php'" value="No" class="w3-circle w3-button w3-black">    
	</div><br>
  </form>
  </div>
</center>
<?php
     if(isset($_POST['yes'])){
      require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

      $complete = new petController();
      $complete->complete($OrderPA_ID);
    }
?>
 </body>
 </div>
</html>

