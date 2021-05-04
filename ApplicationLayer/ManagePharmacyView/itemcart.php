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
	$ItemID = $_GET['Item_ID'];
	$CusID=$_SESSION['customerID'] ;


	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Pharmacy Controller.php';

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';
	$viewUserData = new registrationController();
	$data = $viewUserData->viewDataCustomer($CusID);
	
	foreach ($data as $row) {
		$cusAdd=$row['Cus_Address'];
	}

	$ItemDetails = new PharmacyController();
	$data = $ItemDetails->ItemDetails($ItemID);
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
				<th> Name</th>
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
				<td><?=$row['I_Name'];?></td>
				<td><input type="number" name="quantity" value="1" style="width: 40px;"></td>
				<td>
					<?php $totalprice = $row['I_Price'];?>
					RM <?=$row['I_Price'];?>
				</td>
				<td>
					<?php
					$date = date("Y-m-d"); 
	
					$Item_ID = $row['Item_ID']; 
					$I_Name = $row['I_Name'];
					$I_Price = $row['I_Price'];
					$I_Qty = $row['I_Qty']; 
					$spID = $row['ServiceP_ID']; 
					$I_Description = $row['I_Description'];
					

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
			<form action="/RRMS/ApplicationLayer/ManagePaymentView/paymentCheckout.php" method="POST">


				<input type="hidden" name="cusID" value="<?=$CusID;?>">
				<input type="hidden" name="Item_ID" value="<?=$Item_ID;?>">
				<input type="hidden" name="spID" value="<?=$spID;?>">
				<input type="hidden" name="I_Qty" value="<?=$quantity;?>">
				<input type="hidden" name="totalPrice" value="<?=$totalprice;?>">		
				<input type="hidden" name="cusAdd" value="<?=$cusAdd;?>">	
				<input type="hidden" name="I_Name" value="<?=$I_Name;?>">	
				<input type="hidden" name="I_Description" value="<?=$I_Description;?>">	

			<input type="submit" name="checkoutP" value="Checkout">
			</form>
		</div>
	</div>
	
	<!-- Cart Content End -->
</div>

</body>
</html>