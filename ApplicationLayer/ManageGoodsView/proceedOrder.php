<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/manageGoodsController.php';
$custID = $_SESSION['customerID'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Proceed Order</title>
	<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">
  <?php include '../../includes/cusTopNaviBar.php';?>

	<style>

	table {
	background-color: white;
	border-radius: 25px;
	}

		form{
				width:100%;
				height: 400px;
				border: 1px solid #ccc;
				padding:10px;
				background-color:white;
				border-radius: 20px;
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


</head>

<body>

	<?php
	$distance = new manageGoodsController();
	$distancedata = $distance->getDistance($_SESSION['pickupLoc'],$_SESSION['dropoffLoc']);
	?>

<h1 style="margin-left: 50px;" >Select your preferred courier</h1>
<br>
<table border="0" style="margin-left: 50px;">
<tr>
	<th>Courier Service</th>
	<th>Cost</th>
	<td></td>
</tr>
<?php
	$calculationdata = new manageGoodsController();
	$data = $calculationdata->calculateCourier();


	$orderdata = new manageGoodsController();
	$idnum = $orderdata->selectOrderGoods($custID);


	foreach ($data as $row) {
	$couriername = new manageGoodsController();
	$data2 = $couriername->viewCourName($row['ServiceP_ID']);
		foreach($data2 as $row2)
		{

			$i=($_SESSION['itemweight']*$row['G_WeightCost'])+($distancedata*$row['G_DistanceCost']);
			$j=$row['ServiceP_ID'];

?>
<form action="/RRMS/ApplicationLayer/ManagePaymentView/paymentCheckout.php" method="POST">
<tr>
	<td> <input type="radio" name="pricenspid"  value="<?php echo "$i";?>|<?php echo "$j";?>" required><label>&nbsp;<?=$row2['SP_Name'];?></label><br></td>
	<td><?php echo "RM$i"; }$i = $i+1;$j = $j+1;} ?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<input type="hidden" name="orderGID" value="<?php echo $idnum;?>">		
	<td><button type="submit" name="checkoutG" value="Submit">Check Out</button></td>
</tr>
</form>
</table>



</body>

</html>
