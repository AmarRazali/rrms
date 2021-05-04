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

	#tableCart {
		width: 100%;
		border: 1px solid black;
		border-collapse: collapse;
	}

	#tableCart td{
		border: 1px solid black;
		border-collapse: collapse;
		padding: 10px;
		text-align: center;
	}

	#tableCart th{
		background-color: #D1D3D6;
	}
</style>
<html>
<head>
	<title>RRMS</title>

	<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">

	<?php
	$Role=$_SESSION['role'];
	$FoodID = $_GET['Food_ID'];

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

	$foodDetails = new foodServicesController();
	$data = $foodDetails->foodDetails($FoodID);
	?>

</head>
<body>
	<div>
		<?php include '../../includes/cusTopNaviBar.php';?>
	</div>
	

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">CART ITEM</h2>
	</div>
	<!-- Cart Content -->
	<div style="width: 60%;float: center;margin: 40px; margin-left: 350px;">
		<table id="tableCart">
			<tr id="tableCart">
				<th style="width: 20px;">No</th>
				<th>Food Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
			<?php
			foreach ($data as $row) {
			?>
			<form action="" method="POST">
			<tr>
				<td>1</td>
				<td><?=$row['F_Name'];?></td>
				<td><input type="number" name="quantity" value="1" style="width: 40px;"></td>
				<td>
					<?php $totalprice = $row['F_Price'];?>
					RM <?=$row['F_Price'];?>
				</td>
				<td>
					<?php
					$date = date("Y-m-d"); 
					$FoodID = $row['Food_ID']; 
					?>
					<input type="submit" name="update" value="Update">
				</td>
			</tr>
			</form>
			<?php
			}

			if(isset($_POST['update'])){
				$quantity = $_POST['quantity'];
				$totalprice = $totalprice * $quantity;
			}
			else{
				$totalprice = $totalprice;
			}
			?>

			<tr>
				<td colspan="3" style="text-align: right;">Total Price</td>
				<td colspan="2">RM <?=$totalprice;?></td>
			</tr>
		</table>
		<div style="float: right;margin: 20px;">
			<form action="../ManagePaymentView/FoodCheckOut.php" method="POST">

			<input type="hidden" name="FoodID" value="<?=$FoodID;?>">
			<input type="hidden" name="Quantity" value="<?=$quantity;?>">
			<input type="hidden" name="totalPrice" value="<?=$totalprice;?>">
			<input type="hidden" name="Date" value="<?=$date;?>">
				
			<input type="submit" name="checkout" value="Checkout">
			</form>
		</div>
	</div>
	
	<!-- Cart Content End -->
</div>

</body>
</html>