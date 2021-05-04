<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Tracking</title>
   		<?php 
   			include '../../includes/runnerTopNaviBar.php';
		?>
  </head>

<style>

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

	<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Tracking Analytic Controller.php';
	$Runner_ID = $_SESSION['runnerID'];

	$Tracking_ID = $_GET['Tracking_ID'];

	$tracking = new trackingAnalyticController();
	$data = $tracking->viewTrackStatus($Tracking_ID);

	?>

    <div id="frm">
    	<h2>UPDATE TRACKING</h2>
		<form action="" method="POST">
			<table style="margin-top: 20px;" width="100%">
				<?php
    			foreach($data as $row){
    			?> 
				<tr id="first">
					<th>Tracking ID</th>
					<th>Customer Info</th>
					<th>Service Provider Info</th>
					<th>Current Status</th>
					<th>Update Status</th>
					<th>Action</th>
				</tr>
				<tr>
					<td><?=$row['Tracking_ID']?></td>
					<td style="text-align: left; width: 300px;">
						<label>Name: </label><?=$row['Cus_Name']?><br>
						<label>Address: </label><?=$row['Cus_Address']?><br>
						<label>Phone Number: </label><?=$row['Cus_PhoneNo']?>	
					</td>
					<td style="text-align: left; width: 300px;">
						<label>Company/Shop Name: </label><?=$row['SP_Name']?><br>
						<label>Address: </label><?=$row['SP_Address']?><br>
						<label>Phone Number: </label><?=$row['SP_PhoneNo']?>			
					</td>
					<td><?=$row['DeliveryStatus']?></td>
					<td>
						<select name="DeliveryStatus">
							<option value="Delivering">Delivering</option>
							<option value="Delivered">Delivered</option>
						</select>
					</td>

					<td>
						<br><input type="submit" name="update" value="UPDATE" id="updateButton"><br>
						<br><input type="button" onclick="location.href='trackingList.php'" value="BACK" id="backButton"><br>
					</td>
				</tr>

				<?php 
				} 
						if(isset($_POST['update'])){
				    	$tracking->editTrackStatus();
					}
				?>
			</table>
		</form>
   		
    </div>
</body>

</html>
