<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/manageGoodsController.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Place Goods Delivery!</title>

<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">
<?php include '../../includes/cusTopNaviBar.php';?>

<style>
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

	select {
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
</style>

<?php
	$custID = $_SESSION['customerID'];
?>
</head>

<body>
<br><br>
<center>
<table border="0" cellpadding="0">
	<tr>
		<td><img src="deliveryserviceimg.png" height="250"></td>
		<td rowspan="2">
			<form action="" method="POST">
			<table border="0" cellpadding="0">
			<tr style="height:30px;">
				<th colspan="2"><center>RECEPIENT INFORMATION</center></th>
			</tr>
			<tr style="height:0px;">
				<td colspan="2">Recipient name:</td>
			</tr>
			<tr style="height:0px;">
				<td colspan="2"><input type="text" name="recepientname" id="recepientname"></td>
			</tr>
			<tr>
				<td colspan="2">Recipient phone number:</td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" name="recipientpn" id="recipientpn"></td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
			<tr>
				<td>Item Type:
					<select name="itemtype" id="itemtype">
						<option value="Parcel">Parcel</option>
						<option value="Envelope">Envelope</option>
						<option value="Food">Food</option>
						<option value="Furniture">Furniture</option>
						<option value="Vehicle">Vehicle</option>
					</select>
				</td>
				<td>Preferred delivery:
					<select name="preferreddelivery" id="preferreddelivery">
						<option value="Motorcycle">Motorcycle</option>
						<option value="Car">Car</option>
						<option value="Van">Van</option>
						<option value="Lorry">Lorry</option>
					</select>
				</td>
			</tr>
			<tr style="height:40px;">
				<td>Item Size:<br>
					<select name="itemsize" id="itemsize">
						<option value="Small">Small</option>
						<option value="Medium">Medium</option>
						<option value="Large">Large</option>
					</select>
				</td>
				<td>Item Weight (kg):<br><input type="number" step="0.01" id="itemweight" name="itemweight" min="0"></td>
			</tr>
			<tr>
				<td>Delivery Date:<br><input type="date" id="deliverdate" name="deliverdate"></td>
				<td>Receive Date:<br><input type="date" id="receivedate" name="receivedate"></td>
			</tr>
			<tr style="height:35px;">
				<td colspan="2">
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<button type="submit" name="proceed" value="Submit">PROCEED</button>
			</tr>
			</table>

		</td>
	</tr>
	<tr style="height:40px;">
		<td>
			Pickup Location:<br><input type="text" name="pickupLoc" id="pickupLoc">
			<br>
			Dropoff Location:<br><input type="text" name="dropoffLoc" id="dropoffLoc">
		</td>
	</tr>
		</form>
</table>
</center>

<?php
	$placeDelivery = new manageGoodsController();

	if(isset($_POST['proceed']))
	{
		$placeDelivery->placeDelivery($custID);
	}
?>

</body>

</html>
