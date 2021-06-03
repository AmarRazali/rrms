<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<?php
	$role=$_SESSION['customerID'];
	?>
<title>Food Homepage</title>
	<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">
    <?php include '../../includes/cusTopNaviBar.php';?>
<style>
	body {
  		background-image: url("../../includes/ExternalImage/bacground homepage.jpg");
  		background-color: #cccccc;
	}
</style>

<body>
<center>
<br></br><br></br><br></br><br></br><br></br>
<h1>Order Delicious Food Online</h1>
<h3>Order food online from the best restaurants near you</h3>

<form action="/RRMS/ApplicationLayer/ManageFoodView/cusFoodRestaurant.php" method="POST">
<button class="button button2 buttonlength" type="submit" name ="food" value="Foodlist">Restaurant List</button>
</form>

</center>

 </body>
</head>





  

	

</div>

</html>
