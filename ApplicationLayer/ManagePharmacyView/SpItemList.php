<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>RunnerManagement</title>

	<?php
	$Role = $_SESSION['role'];
	$providerID = $_SESSION['providerID'];

	if(isset($_POST['update'])){
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Pharmacy Controller.php';

		$updateItem = new PharmacyController();
		$updateItem->updateItem();
	}

	if(isset($_POST['delete'])){
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Pharmacy Controller.php';

		$deleteItem= new PharmacyController();
		$deleteItem->deleteItem();
	}
	?>
</head>
<style>
#tableJoblist{
		width: 100%;
		border:2px solid #000000;
		border-collapse: collapse;
	}
#tableJoblist td,th{
		padding: 10px;
		text-align: center;
		border: 1px solid black;
	}
#tableJoblisttr {
		background-color: #f2f2f2;
	}
.subHeader{
		text-align: center;
		padding-top: 30px;
		padding-bottom: 30px;
		color: black;
		margin: 0px;
	}
</style>
<body>
	<div class="header">
		<?php include '../../includes/servicePTopNaviBarPharmacy.php';?>
	</div>
	

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">UPDATE MY PRODUCT</h2>
	</div>
	<!-- Product list Content -->
	<?php
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Pharmacy Controller.php';

		$productdata = new PharmacyController();

		$data = $productdata->viewItemDetails($providerID);
	?>

	<div>
		<table id="tableJoblist" style="margin-top: 20px;">
			<tr id="tableJoblisttr">
				<th style="width: 20px;"><center>No</center></th>
				<th><center>Product ID</center></th>
				<th><center>Image</center></th>
				<th><center> Name</center></th>
				<th><center> Details</center></th>
				<th><center> Price</center></th>
				<th><center>Action</center></th>
			</tr>
			<?php
				$i=1;
				foreach ($data as $row) {
			?>
			<form action="" method="POST">
			<tr>
				<td><?=$i?></td>
				<td><?=$row['Item_ID']?></td>
				<td><img src="<?=$row['I_Image']?>" style="width: 80px;height: 80px;"></td>
				<td><input type="text" name="IName" value="<?=$row['I_Name']?>"></td>
				<td><textarea style="height: 50px;" name="IDescription"><?=$row['I_Description']?></textarea></td>
				<td><input type="text" name="IPrice" value="<?=$row['I_Price']?>"></td>
				<td>
					<input type="hidden" name="ItemID" value="<?=$row['Item_ID']?>">
					<input type="submit" name="update" value="Update"><input type="submit" name="delete" value="Delete">
				</td>
			</tr>
			</form>
			<?php
			$i = $i+1;
			}
			?>
		</table>
	</div>
	<!-- Product list Content -->
</body>
</html>
