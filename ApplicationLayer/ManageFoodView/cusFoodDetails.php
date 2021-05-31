<?php
session_start();
?>

<!DOCTYPE html>
<style>

	.subHeader{
		text-align: center;
		padding-top: 30px;
		padding-bottom: 30px;
		color: black;
		margin: 0px;
	}

#tableProductDetails {
		width: 70%;
		height: 400px;
		border: 4px solid black;
		border-collapse: collapse;
		margin-left: 250px;
	}

	#tableProductDetails td{
		border: 4px solid black;
		border-collapse: collapse;
		width: 400px;
		padding-left: 20px;
		background-color: white;
		font-size: 20px;
		font-weight: bold;
	}

	#tableProductDetails th{
		width: 50%;
		border: 4px solid black;
		border-collapse: collapse;
		background-color: grey;
	}

	#buttonOrder {
		background-color: green;
		color: white;
		width: 150px;
		height: 30px;
		border: 1px solid green;
		border-radius: 20px;
	}

	#buttonOrder:hover {
		background-color: darkgreen;
		border: 1px solid darkgreen;
		cursor: pointer;
}
	#restaurantMenu {
		background-color: red;
		color: white;
		width: 150px;
		height: 30px;
		border: 1px solid red;
		border-radius: 20px;
	}

	#addcart {
		background-color: green;
		color: white;
		width: 150px;
		height: 30px;
		border: 1px solid green;
		border-radius: 20px;
	}

	.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:600px;
	right:140px;
}


</style>
<html>
<head>
	<title>RRMS</title>

	<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">

	<?php
	$Role=$_SESSION['role'];
	$CusID=$_SESSION['customerID'] ;
	$Food_ID = $_GET['Food_ID'];

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

	$foodDetails = new foodServicesController();
	$data = $foodDetails->foodDetails($Food_ID);
	
	foreach ($data as $row) {
		$spID = $row['ServiceP_ID']; 
		$foodImage = $row['F_Image']; 
		$foodName= $row['F_Name']; 
		$foodDesc = $row['F_Description']; 
		$foodPrice = $row['F_Price']; 
	}

	?>

</head>
<body>
	<div>
		<?php include '../../includes/cusTopNaviBar.php';?>
	</div>

	<br style="clear: both;"> 

	<a href="cartfood.php"><img src="../../Images/Food/cart.png" class="float"></a>

	<div>
		<h2 class="subHeader">FOOD DETAILS</h2>
	</div>
	<!-- Product details Content -->
	<div style="margin: 30px;float: center;">
		<table id="tableProductDetails">
			<tr>
				<th colspan="2" rowspan="4"><center><img src="<?=$foodImage;?>" style="width: 356px;height: 356px;"></center></th>
				<th colspan="2"><h2><center>Food Details</center></h2></th>
			</tr>
			<tr>
				<td>Food Name</td>
				<td><?=$foodName;?></td>
			</tr>
			<tr>
				<td>Details</td>
				<td><?=$foodDesc;?></td>
			</tr>
			<tr>
				<td>Price per unit</td>
				<td>RM <?=$foodPrice;?></td>
			</tr>
		</table>
	</div>
	<div style="float: right;padding: 40px;margin-right: 200px;">
		
		<form action="/RRMS/ApplicationLayer/ManageFoodView/cartFood.php" method="POST">
				<input type="hidden" name="cusID" value="<?=$CusID;?>">
				<input type="hidden" name="spID" value="<?=$spID;?>">
				<input type="hidden" name="Food_ID" value="<?=$Food_ID;?>">
				<input type="submit" name="addcart" value="Add to Cart" id="addcart">							
		</form>
		<br>
		<input type="button" onclick="location.href='/RRMS/ApplicationLayer/ManageFoodView/cusFoodList.php?ServiceP_ID=<?=$row['ServiceP_ID'];?>'" value="Back Main Menu" id="restaurantMenu">
	</div>
	<!-- Product details Content End-->
</body>
</html>