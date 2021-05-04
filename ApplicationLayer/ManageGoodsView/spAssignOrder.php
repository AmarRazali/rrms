<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/manageGoodsController.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Assign Order</title>

<?php include '../../includes/ServicePTopNaviBarGoods.php';?>

<style>

table {
background-color: white;
}

	form{
			width:100%;
			height: 400px;
			border: 1px solid #ccc;
			padding:10px;
			background-color:white;
			border-radius: 20px;
	}

	input{
			display:block;
			border:2px solid #ccc;
			width:95%;
			padding:1px;
			margin:5px auto;
			border-radius: 5px;
	}

	button{
			background:#333f50;
			padding: 5px 5px;
			color:#fff;
			border-radius:5px;
			margin-right:10px;
			border:none;
	}

	th, td {
	  padding: 15px;
	}
	}

</style>

<?php
$spID = $_SESSION['providerID'];
?>
</head>

<body>

<h1 style="margin-left: 50px;">Not Assigned Order</h1>

<?php
	$orderdata = new manageGoodsController();
	$data = $orderdata->viewOrder($spID);
?>

	<table border="1" style="margin-left: 50px;">
		<tr>
			<th style="width: 20px;"><center>No</center></th>
			<th><center>PickUp Address</center></th>
			<th><center>Delivery Address</center></th>
			<th><center>Item Type</center></th>
			<th><center>Item Weight</center></th>
			<th><center>Item Size</center></th>
			<th><center>Delivery Date</center></th>
			<th><center>Receive Date</center></th>
			<th><center>Preferred Runner</center></th>
			<th><center>Assign To:</center></th>
		</tr>
		<?php
			$i=1;
			foreach ($data as $row) {
		?>
		<form action="" method="POST">
		<tr>
			<td><?=$i?></td>
			<td><?=$row['OG_PickUpAdd']?></td>
			<td><?=$row['OG_DeliveryAdd']?></td>
			<td><?=$row['OG_itemType']?></td>
			<td><?=$row['OG_itemWeight']?></td>
			<td><?=$row['OG_itemSize']?></td>
			<td><?=$row['OG_DeliveryDate']?></td>
			<td><?=$row['OG_ReceiveDate']?></td>
			<td><?=$row['OG_RunnerType']?></td>
			<td>
				<input type="hidden" name="orderid" value="<?=$row['OrderG_ID']?>">
				<select name="runner">
					<?php
						$runnerdata = new manageGoodsController();
						$runnerdata = $runnerdata->viewSpRunner($spID);
						foreach ($runnerdata as $rowrunner) {
					?>
					<option value="<?=$rowrunner['Runner_ID']?>"><?=$rowrunner['Run_Name']?></option>
					<?php } ?>
				</select>
				<input type="hidden" name="spID" value="<?php echo $spID ?>">
				<button type="submit" name="proceed" value="Submit">ASSIGN</button>
			</td>
		</tr>
		</form>
		<?php
		$i = $i+1;
		}
		?>
	</table>

	<?php
		$updateassignrunner = new manageGoodsController();

		if(isset($_POST['proceed']))
		{
			$updateassignrunner->runnerAssign();
		}
	?>

<br>
<?php
	$orderdata = new manageGoodsController();
	$data = $orderdata->viewassignedOrder($spID);
?>
<h1 style="margin-left: 50px;">Assigned Order</h1>
<table border="1" style="margin-left: 50px;">
	<tr>
		<th style="width: 20px;"><center>No</center></th>
		<th><center>PickUp Address</center></th>
		<th><center>Delivery Address</center></th>
		<th><center>Item Type</center></th>
		<th><center>Item Weight</center></th>
		<th><center>Item Size</center></th>
		<th><center>Delivery Date</center></th>
		<th><center>Receive Date</center></th>
		<th><center>Preferred Runner</center></th>
		<th><center>Assigned To:</center></th>
	</tr>
	<?php
		$z=1;
		foreach ($data as $row) {
	?>
	<tr>
		<td><?=$z?></td>
		<td><?=$row['OG_PickUpAdd']?></td>
		<td><?=$row['OG_DeliveryAdd']?></td>
		<td><?=$row['OG_itemType']?></td>
		<td><?=$row['OG_itemWeight']?></td>
		<td><?=$row['OG_itemSize']?></td>
		<td><?=$row['OG_DeliveryDate']?></td>
		<td><?=$row['OG_ReceiveDate']?></td>
		<td><?=$row['OG_RunnerType']?></td>
		<td>

			<?php
				$runnername = new manageGoodsController();
				$runnernamedata = $runnername->runnerName($row['R_ID']);
				echo $runnernamedata;
			?>

		</td>
	</tr>
	<?php
	$z = $z+1;
	}
	?>
</table>


</body>

</html>
