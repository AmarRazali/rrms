<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    .myUpdate{
      width: 50%;
      height: 530px;
      border: 5px outset #221A57;
      font-family: Itim, cursive;
    }
  </style>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>RRMS</title>

  <?php
  $Role=$_SESSION['role'];
  $providerID = $_SESSION['providerID'];
  ?>
</head>
<body>

  <div class="header">
    <?php include '../../includes/servicePTopNaviBarPets.php';?>
  </div>

    <br style="clear: both;"> 

    <div class="contentRight">

    <center>
    <div class=myUpdate>
    <form action="" method="POST" enctype="multipart/form-data">
    <h1 style="font-size: 20px;">Service Information</h1><br>
        <div style="padding-left: 50px;">
        <label style="padding-right:50px;">Name of Boarding Centre:</label>
        <input style="padding-right:50px;" type="text" name="PName"><br><br>
      
        <label style="padding-right: 70px;">Service Description:</label>
        <textarea style="float: center;" type="text" name="PDescription"></textarea><br><br><br>
      
        <label style="width: 200px;">Price per day:</label>
        <input type="text" name="PPrice"><br><br>

        <label style="width: 200px;">Accepted Pets:</label>
        <input type="text" name="APets"><br><br>

        <label style="width: 200px;">Accepted Sizes:</label>
        <input type="text" name="APetSize"><br><br>

        <label style="width: 200px;">Available Days:</label>
        <input type="text" name="ADays"><br><br>

        <label for="image" style="width: 200px;">Company Image:</label>
        <input type="file" name="pImage" required><br>
    <div>
          <input type="hidden" name="ServiceP_ID" value="<?=$providerID;?>">
      <input type="submit" name="add" value="Add Service" class="w3-circle w3-button w3-black">
    </div>
  </div>
  </div>
  </div>
    </center>

  
    </form>
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';
    $addPet = new petController();

    if(isset($_POST['add'])){

    $pImage = "/RRMS/Images/Pet/".basename($_FILES['pImage']['name']);  
    $addPet->addPet($pImage);
    }
    ?>
 <br style="clear: both;"> 
  </div>
</body>
</html>