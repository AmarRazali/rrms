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
		font-weight: bold;
		background-color: blue;
	}

#tableProductDetails {
		width: 80%;
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
		background-color:white;
		font-size: 20px;
		font-weight: bold;
	}

	#tableProductDetails th{
		width: 50%;
		border: 4px solid black;
		border-collapse: collapse;
		
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
	$Item_ID = $_GET['Item_ID'];

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Pharmacy Controller.php';

	$ItemDetails = new PharmacyController();
	$data = $ItemDetails->ItemDetails($Item_ID);
	?>
</head>
<body>
	<div>
		<?php include '../../includes/cusTopNaviBar.php';?>
	</div>

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">ITEM DETAILS</h2>
	</div>
	<!-- Product details Content -->
	<div style="margin: 30px;float: center;">
		<table id="tableProductDetails">
			<?php
			foreach ($data as $row) {
			?>
			<tr>
				<th colspan="2" rowspan="4"><img src="<?=$row['I_Image'];?>" style="width:50%;height: 50%;"></th>
				<th colspan="2"><h2><center> Details</center></h2></th>
			</tr>
			<tr>
				<td> Name</td>
				<td><?=$row['I_Name'];?></td>
			</tr>
			<tr>
				<td>Details</td>
				<td><?=$row['I_Description'];?></td>
			</tr>
			<tr>
				<td>Price per unit</td>
				<td>RM <?=$row['I_Price'];?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
	<div style="float: right;padding: 40px;margin-right: 200px;">
		<input type="button" name="order" value="Order Now" id="buttonOrder" onclick="location.href='/RRMS/ApplicationLayer/ManagePharmacyView/itemcart.php?Item_ID=<?=$row['Item_ID'];?>'">
		<input type="button" onclick="location.href='/RRMS/ApplicationLayer/ManageFoodView/cusFoodList.php'" value="Back Main Menu" id="buttonPaid">
	</div>
	<!-- Product details Content End-->
</body>
</html>