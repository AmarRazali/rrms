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
		font-family: Itim,cursive;
	}

	.myTable{
		width: 50%;
	}


	#tableProductDetails td{
		border: 1px solid black;
		border-collapse: collapse;
		width: 30%;
		background-color: white;
		font-size: 20px;
		font-weight: bold;
		padding-left: 20px;
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
	$ServiceP_ID = $_GET['ServiceP_ID'];


	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

	$petDetails = new petController();
	$data = $petDetails->petDetails($ServiceP_ID);
	?>
</head>
<body>
	<div>
		<?php include '../../includes/custTopNaviBarPets.php';?>
	</div>

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">Boarding Place Details</h2>
	</div>
	<!-- Product details Content -->
	<center>
	<div style="float: center;">
		<?php
			foreach ($data as $row) {
		?>
		<center><img src="<?=$row['P_Image'];?>" style="width: 20%;height: 250px;"></center>
		<div class="myTable">
		<table id="tableProductDetails">
			<tr>
				<td>Boarding Centre Name</td>
				<td><?=$row['P_Name'];?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?=$row['P_Description'];?></td>
			</tr>
			<tr>
				<td>Price per day</td>
				<td>RM <?=$row['P_Price'];?></td>
			</tr>
			<tr>
				<td>Accepted Pets</td>
				<td><?=$row['A_Pets'];?></td>
			</tr>
			<tr>
				<td>Accepted Pet Sizes</td>
				<td><?=$row['A_PetSize'];?></td>
			</tr>
			<tr>
				<td>Days Available</td>
				<td><?=$row['Days'];?></td>
			</tr>
			<?php
			}
			?>
		</table>
	</div>
	</center>
	<div style="float: right;padding: 40px;margin-right: 200px;">
		<input type="button" name="order" value="Proceed To Booking" id="buttonOrder" onclick="location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/bookingdetails.php?ServiceP_ID=<?=$row['ServiceP_ID'];?>'">
		<input type="button" onclick="location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/boardinglist.php'" value="Go back" id="buttonPaid">
	</div>
	<!-- Product details Content End-->
</body>
</html>