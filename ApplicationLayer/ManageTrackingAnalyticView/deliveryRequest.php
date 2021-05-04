<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delivery Request</title>
     	<?php
      		include '../../includes/runnerTopNaviBar.php';
			require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Tracking Analytic Controller.php';
			$Runner_ID=$_SESSION['runnerID'];
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
<div>
</div>
	<!-- Job List Content -->
<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Tracking Analytic Controller.php';

	$joblist = new trackingAnalyticController();
	$data = $joblist->viewDeliveryRequest();

?>
    <div id="frm">
    	<h2>DELIVERY REQUEST</h2>
		<table style="margin-top: 20px;" width="100%">
			<tr id="first">
				<th id="styleTr">No</th>
				<th>Customer Info</th>
				<th>Service Provider Info</th>
				<th>Process Date</th>
				<th>Assignation</th>
				<th>Action</th>
			</tr>
			<?php
				$i=1;
				foreach ($data as $row) {
			?>
			<form action="" method="POST">
			<tr>
				<td><?=$i?></td>
				<td style="text-align: left; width: 400px;">
					<label>ID: </label><?=$row['Cus_ID']?><br>
					<label>Name: </label><?=$row['Cus_Name']?><br>
					<label>Address: </label><?=$row['Cus_Address']?><br>
					<label>Phone Number: </label><?=$row['Cus_PhoneNo']?>
				</td>
				<td style="text-align: left; width: 400px;">
					<label>ID: </label><?=$row['ServiceP_ID']?><br>
					<label>Company/Shop Name: </label><?=$row['SP_Name']?><br>
					<label>Address: </label><?=$row['SP_Address']?>,<br>
					<label>Phone Number: </label><?=$row['SP_PhoneNo']?>	
				</td>
				<td><?=$row['date']?></td>
				<td style="color: red;"><?=$row['Assignation']?></td>
				<td>
					<input type="hidden" name="Tracking_ID" value="<?=$row['Tracking_ID']?>">
					<input type="submit" name="acceptjob" value="Accept">
				</td>
			</tr>
			</form>
			<?php
				if(isset($_POST['acceptjob'])){
					
					$insertTracking = new trackingAnalyticController();
					$insertTracking->insertTracking($Runner_ID);

				$i=$i+1;	
				}
			}
			?>
		</table>
	</div>
	<!-- Job List Content End-->

</body>
</html>