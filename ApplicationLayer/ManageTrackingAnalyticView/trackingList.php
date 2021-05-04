<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>TRACKING LIST</title>
		<?php 
      		include '../../includes/runnerTopNaviBar.php';
		?>
  </head>

<style>
  	body { 
        background: url(../../includes/ExternalImage/background.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
	}

	table, th, td {
  		border: 1px solid black;
  		border-collapse: collapse;
  		text-align: center;
  		background-color: ;
	}

	table tr#first {border:inset 4px solid black; color:white;  background-color:rgb(51, 63, 80);}

</style>
</style>

</head>

<body>

<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Tracking Analytic Controller.php';
	$Runner_ID = $_SESSION['runnerID'];

	$tracking = new trackingAnalyticController();
	$data = $tracking->viewTrackList($Runner_ID);

	?>
    <div id="frm">
    	<h2>TRACKING LIST</h2>
    	
   		<table style="margin-top: 20px;" width="100%">
			<tr id="first">
				<th id="styleTr">No</th>
				<th>Tracking ID</th>
				<th>Delivery Address</th>
				<th>Date</th>
				<th>Delivery Status</th>
				<th>Action</th>
			</tr>
			<?php
			$i=1;
			foreach ($data as $row) {
			?>
			<tr>
				<td id="styleTr"><?=$i?></td>
				<td><?=$row['Tracking_ID']?></td>
				<td><?=$row['DeliveryAddress']?></td>
				<td><?=$row['date']?></td>
				<td><?=$row['DeliveryStatus']?></td>
				<td align="center">
					<input type="button" class="viewUpdateTrackButton" onclick="location.href='updateTracking.php?Tracking_ID=<?=$row['Tracking_ID']?>'" value="VIEW">&nbsp
				</td>
			</tr>
			<?php
			$i=$i+1;
			}
			?>
		</table>

    </div>
</body>

</html>

