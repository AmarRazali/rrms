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
        $Role = $_SESSION['role'];
    ?>
</head>

<body>
<?php
//Service Provider Mainpage Interface
if ($Role==3){
?>
<center>
<div class="welcome">
    <h1 style="padding-top: 200px;font-size: 70px;">Welcome <?=$_SESSION['SPName'];?></h1>
  </div>
</center>
<?php
}
?>
 </body>

 </div>

</html>
