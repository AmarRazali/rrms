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
	#buttonPaid {
		background-color: red;
		color: white;
		width: 150px;
		height: 30px;
		border: 1px solid red;
		border-radius: 20px;
	}

</style>
<html>
<head>
	<title>RRMS</title>

	<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">

	<?php
	$Role=$_SESSION['role'];
	$Food_ID = $_GET['Food_ID'];

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

	$foodDetails = new foodServicesController();
	$data = $foodDetails->foodDetails($Food_ID);
	?>
</head>
<body>
	<div>
		<?php include '../../includes/cusTopNaviBar.php';?>
	</div>

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">FOOD DETAILS</h2>
	</div>
	<!-- Product details Content -->
	<div style="margin: 30px;float: center;">
		<table id="tableProductDetails">
			<?php
			foreach ($data as $row) {
			?>
			<tr>
				<th colspan="2" rowspan="4"><img src="<?=$row['F_Image'];?>" style="width: 100%;height: 100%;"></th>
				<th colspan="2"><h2><center>Food Details</center></h2></th>
			</tr>
			<tr>
				<td>Food Name</td>
				<td><?=$row['F_Name'];?></td>
			</tr>
			<tr>
				<td>Details</td>
				<td><?=$row['F_Description'];?></td>
			</tr>
			<tr>
				<td>Price per unit</td>
				<td>RM <?=$row['F_Price'];?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
	<div style="float: right;padding: 40px;margin-right: 200px;">
		<input type="button" name="order" value="Order Now" id="buttonOrder" onclick="location.href='/RRMS/ApplicationLayer/ManageFoodView/cartFood.php?Food_ID=<?=$row['Food_ID'];?>'">
		<input type="button" onclick="location.href='/RRMS/ApplicationLayer/ManageFoodView/cusFoodList.php?ServiceP_ID=<?=$row['ServiceP_ID'];?>'" value="Back Main Menu" id="buttonPaid">
	</div>
	<!-- Product details Content End-->
</body>
</html>