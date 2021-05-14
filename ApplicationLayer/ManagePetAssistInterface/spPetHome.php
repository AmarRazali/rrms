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

<title>Service Provider Homepage</title>

    <?php include '../../includes/ServicePTopNaviBarPets.php';?>

    <?php
    $Role=$_SESSION['role'];

    require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

    $viewUserData = new registrationController();
    
    $providerID = $_SESSION['providerID'];
    $data = $viewUserData->viewDataProvider($providerID);
  ?>
</head>

<body>
<?php
//Service Provider Mainpage Interface
if ($Role==3){
?>
<center>
<div class="welcome">
    <?php
      foreach ($data as $row) {
    ?>
    <h1 style="padding-top: 200px;font-size: 70px;">Welcome <?=$_SESSION['SPName'];?></h1>
    <a href="../ManagePetAssistInterface/spAddService.php?ServiceP_ID=<?=$row['ServiceP_ID'];?>">
    <p>Click here to add information regarding your service!</p></a>
  </div>
</center>
<?php
}
?>
<?php
}
?>
 </body>

 </div>

</html>
