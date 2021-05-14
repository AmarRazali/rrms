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
  ?>
</head>
<body>

<?php

//Service Provider Account Interface
if ($Role==3) {
?>
  <div class="header">
    <?php include '../../includes/servicePTopNaviBarPets.php';?>
  </div>

    <br style="clear: both;"> 

    <div class="contentRight">
    <?php
    require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

    $petDetails = new petController();
    
    $providerID = $_SESSION['providerID'];
    $data = $petDetails->petDetails($providerID);

    foreach ($data as $row) {
    
    ?>

    <center>
    <div class=myUpdate>
    <form action="" method="POST" enctype="multipart/form-data">
    <h1 style="font-size: 20px;">Service Information</h1><br>
        <div style="padding-left: 50px;">
        <label style="padding-right:50px;">Name of Boarding Centre:</label>
        <input style="padding-right:50px;" type="text" name="updateName" value="<?=$row['P_Name'];?>"><br><br>
      
        <label style="padding-right: 70px;">Service Description:</label>
        <textarea style="float: center;" type="text" name="updateDescription"><?=$row['P_Description'];?></textarea><br><br><br>
      
        <label>Price per day:</label>
        <input type="text" name="updatePrice" value="<?=$row['P_Price'];?>"><br><br>

        <label>Accepted Pets:</label>
        <input type="text" name="updatePets" value="<?=$row['A_Pets'];?>"><br><br>

        <label>Accepted Sizes:</label>
        <input type="text" name="updatePetSize" value="<?=$row['A_PetSize'];?>"><br><br>

        <label>Available Days:</label>
        <input type="text" name="updateDay" value="<?=$row['Days'];?>"><br><br>

        <label>Company Image:</label>
        <input type="file" name="updateImage" value="<?=$row['P_Image'];?>"><br>
    <div>
      <input type="submit" name="updateinfo" value="Update" class="w3-circle w3-button w3-black">
    </div>
  </div>
  </div>
  </div>
    </center>

  
    </form>
<?php
    }
    if(isset($_POST['updateinfo'])){
      require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

      $providerID = $_SESSION['providerID'];

      $updateServiceDetails = new petController();
      $updateServiceDetails->updateServiceDetails($providerID);
    }
    ?>
 <br style="clear: both;"> 
  </div>
<?php
}
?>
</body>
</html>