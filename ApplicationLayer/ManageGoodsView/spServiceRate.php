<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/manageGoodsController.php';
?>

<!DOCTYPE html>
<html>
<head>

<title>Service Rate</title>

    <?php include '../../includes/ServicePTopNaviBarGoods.php';?>

		<style>
			form{
					width: 320px;
					height: auto;
					border: 1px solid #ccc;
					padding:10px;
					background-color:white;
					border-radius: 20px;
			}

			input{
					width: 70px;
					border:2px solid #ccc;
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

</head>
<body>

	<?php
		$viewDeliveryCost = new manageGoodsController();
    $spID = $_SESSION['providerID'];
		$data = $viewDeliveryCost->viewDeliveryCost($spID);
		$distancecost = NULL;
    $weightcost = NULL;

    foreach ($data as $row) {
      $distancecost = $row['G_DistanceCost'];
      $weightcost = $row['G_WeightCost'];
    }

	?>

<br><br>
	<center>
	<form action="" method="POST">
	<table border="0" cellpadding="5">
    <tr>
  		<th>Cost per distance</th>
  		<th>:</th>
  		<th><?php echo "RM<input type='number' step='0.01' id='weightcost' name='weightcost' min='0' value='$weightcost' >"; ?></th>
      <th>\km</th>
  	</tr>
	<tr>
		<th>Cost per weight</th>
		<th>:</th>
		<th> <?php echo "RM<input type='number' step='0.01' id='costdistance' name='costdistance' min='0' value='$distancecost' >"; ?> </th>
		<th>\kg</th>
	</tr>
	<tr>
		<td colspan="6"><center><button type="submit" name="proceed" value="Submit">UPDATE</button></center>
	</tr>
	</table>
	</form>
</center>

<?php
	$setDeliveryCost = new manageGoodsController();

	if(isset($_POST['proceed']))
	{
		$setDeliveryCost->setDeliveryCost($spID);
	}
?>

</body>

</html>
