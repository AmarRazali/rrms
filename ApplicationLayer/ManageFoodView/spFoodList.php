<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Runner2You</title>

	<?php
	$Role = $_SESSION['role'];
	$providerID = $_SESSION['providerID'];

	if(isset($_POST['update'])){
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

		$updateFood = new foodServicesController();
		$updateFood->updateFood();
	}

	if(isset($_POST['delete'])){
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

		$deleteFood= new foodServicesController();
		$deleteFood->deleteFood();
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
		<?php include '../../includes/spFoodTopNaviBar.php';?>
	</div>
	

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">UPDATE MY PRODUCT</h2>
	</div>
	<!-- Product list Content -->
	<?php
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

		$productdata = new foodServicesController();

		$data = $productdata->viewFoodDetails($providerID);
	?>

	<div>
		<table id="tableJoblist" style="margin-top: 20px;">
			<tr id="tableJoblisttr">
				<th style="width: 20px;"><center>No</center></th>
				<th><center>Product ID</center></th>
				<th><center>Image</center></th>
				<th><center>Product Name</center></th>
				<th><center>Product Details</center></th>
				<th><center>Product Price</center></th>
				<th><center>Action</center></th>
			</tr>
			<?php
				$i=1;
				foreach ($data as $row) {
			?>
			<form action="" method="POST">
			<tr>
				<td><?=$i?></td>
				<td><?=$row['Food_ID']?></td>
				<td><img src="<?=$row['F_Image']?>" style="width: 80px;height: 80px;"></td>
				<td><input type="text" name="FName" value="<?=$row['F_Name']?>"></td>
				<td><textarea style="height: 50px;" name="FDescription"><?=$row['F_Description']?></textarea></td>
				<td><input type="text" name="FPrice" value="<?=$row['F_Price']?>"></td>
				<td>
					<input type="hidden" name="FoodID" value="<?=$row['Food_ID']?>">
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
