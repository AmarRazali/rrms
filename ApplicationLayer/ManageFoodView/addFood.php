<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>RRMS</title>

	<?php include '../../includes/spFoodTopNaviBar.php';?>

	<?php
	$Role = $_SESSION['role'];
	$providerID = $_SESSION['providerID'];
	$providerCompany = $_SESSION['SPName'];
	$providerPhoneNo = $_SESSION['SPPhoneNo'];
	$providerServiceType = $_SESSION['SPType'];

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

	$addFood = new foodServicesController();

	if(isset($_POST['registerFood'])){
		$foodImage = "/RRMS/Images/Food/".basename($_FILES['foodImage']['name']);
		$addFood->addFood($foodImage);
	}
	?>
</head>
<style>
	.subHeader{
		text-align: center;
		padding-top: 30px;
		padding-bottom: 30px;
		color: black;
		margin: 0px;
	}

	#buttonLogin{
		width: 90px;
		height: 40px;
		background-color: #088A85;
		color: white;
		font-size: 15px;
		font-weight: bold;
		border: #088A85;
		border-collapse: collapse;
		border-radius: 20px;
		margin-left: 300px;
	}
</style>
<body>
	

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">ADD PRODUCT</h2>
	</div>
	<!-- Add product Content -->
	<div style="margin: 20px; width: 90%;height: 90%;">
		<div style="width: 50%;margin-left: 410px;border:2px solid black;">
			<h2 style="color: #088A85;text-align: center;">Please insert your product</h2>
			<hr>
			<form action="" method="POST" enctype="multipart/form-data">
				<table style="width: 100%; margin-left: 150px;margin-bottom: 20px;">
					<tr>
						<td colspan="2" style="color:#088A85;"><h3>Photo</h3></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Food Image</label></td>
						<td><input type="file" name="foodImage" required></td>
					</tr>
					<tr>
						<td colspan="2" style="color:#088A85;"><h3>Details</h3></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Food Name</label></td>
						<td><input type="text" name="FName" maxlength="50" required></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Food Price</label></td>
						<td>RM <input type="float" name="FPrice"  style="width: 90px;" required></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Food Details</label></td>
						<td><input type="text" name="FDescription"  style="height: 70px;" required></td>
					</tr>
					<tr>
						<td colspan="2" style="color:#088A85;"><h3>Provider Info</h3></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Company/Shop</label></td>
						<td><?=$providerCompany;?></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Phone Number</label></td>
						<td><?=$providerPhoneNo;?></td>
					</tr>
					<tr>
						<td colspan="2" style="color:#088A85;"><h3>Category</h3></td>
					</tr>
					<tr>
						<td><label>Product Type</label></td>
						<td><?=$providerServiceType;?></td>
					</tr>
					<tr>
	
					</tr>
				</table>
				<input type="hidden" name="providerID" value="<?=$providerID;?>">
				<input type="hidden" name="proServiceType" value="<?=$providerServiceType;?>">
				<input type="submit" name="registerFood" value="REGISTER MY FOOD" id="buttonLogin" style="width: 250px;margin-bottom: 25px;">
			</form>
		</div>
	</div>
	<!-- Add product Content End-->
</div>

</body>
</html>