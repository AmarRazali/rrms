<?php
session_start();
$role=$_SESSION['customerID'];
?>

<!DOCTYPE html>
<html>
<head>



</body>
</html>

<title>Customer Homepage</title>
	<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">
    <?php include '../../includes/cusTopNaviBar.php';?>
<style>
	body {
  		background-image: url("pharmacy background.jpg");
  		background-color: #cccccc;
	}

	
</style>

<body>
<center>

<br></br><br></br><br></br><br></br><br></br>
<p style="color:white;">WELCOME TO PHARMACY WEBSITE</p>
<p style="color:white;">ENJOY OUR SERVICE HERE</p>

<form action="/RRMS/ApplicationLayer/ManagePharmacyView/customerList.php" method="POST">
<button class="button button2 buttonlength" type="submit" name ="view_more" value="customerList">VIEW MORE</button>
</form>

</center>

 </body>
</head>





  

	

</div>

</html>
