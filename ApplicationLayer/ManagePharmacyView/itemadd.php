<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>RRMS</title>

	<?php include '../../includes/servicePTopNaviBarPharmacy.php';?>

	<?php
	$Role = $_SESSION['role'];
	$providerID = $_SESSION['providerID'];
	$providerCompany = $_SESSION['SPName'];
	$providerPhoneNo = $_SESSION['SPPhoneNo'];
	$providerServiceType = $_SESSION['SPType'];

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Pharmacy Controller.php';

	$addItem = new PharmacyController();

	if(isset($_POST['registerItem'])){
		$ItemImage = "/RRMS/Images/Pharmacy/".basename($_FILES['IImage']['name']);
		$addItem->addItem($ItemImage);
	}
	?>
</head>
<style>
	.subHeader{
		text-align: center;
		padding-top: 30px;
		padding-bottom: 30px;
		color: blue;
		margin: 0px;
	}

	#buttonLogin{
		width: 90px;
		height: 40px;
		background-color: tomato;
		color: black;
		font-size: 15px;
		font-weight: bold;
		margin-left: 100px;
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
			<h2 style="color: #088A85;text-align: center;font-weight: bold;">Please insert your product</h2>
			<hr>
			<form action="" method="POST" enctype="multipart/form-data">
				<table style="width: 100%; margin-left: 100px;margin-bottom: 50px;">
					<tr>
						<td colspan="2" style="color:#088A85;"><h3>Photo</h3></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Product Image</label></td>
						<td><input type="file" name="IImage" required></td>
					</tr>
					<tr>
						<td colspan="2" style="color:#088A85;"><h3>Details</h3></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Product Name</label></td>
						<td><input type="text" name="IName" maxlength="50" required></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Product Price</label></td>
						<td>RM <input type="float" name="IPrice"  style="width: 90px;" required></td>
					</tr>
					<tr>
						<td><label style="font-weight: bold;">Details</label></td>
						<td><input type="text" name="IDescription"  style="height: 70px;" required></td>
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
				<input type="submit" name="registerItem" value="REGISTER MY FOOD" id="buttonLogin" style="width: 250px;margin-bottom: 25px;">
			</form>
		</div>
	</div>
	<!-- Add product Content End-->
</div>

</body>
</html>