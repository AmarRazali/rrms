<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>TRACKING</title>
	<?php
	include '../../includes/cusTopNaviBar.php';
	?>
	 <!-- add extra navbar  -->
	 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="customerTracking.php">customer tracking list</a></li>
      <li><a href="receivedOrderTracking.php">Order History</a></li>
    </ul>
  </div>
</nav>
</head>

<style>


	table, th, td {
  		border: 1px solid black;
  		border-collapse: collapse;
  		text-align: center;
  		background-color: ;
	}

	table tr#first {border:inset 4px solid black; color:white;  background-color:rgb(51, 63, 80);}
	table td#second {border:inset 4px solid black; color:white;  background-color:rgb(51, 63, 80);}

</style>
</style>

</head>
<body>

<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Tracking Analytic Controller.php';
	$Cus_ID=$_SESSION['customerID']; 

	$tracking = new trackingAnalyticController();
	$data = $tracking->viewOrderTracking($Cus_ID);

	?>

    <div id="frm">
    	<h2>ORDER TRACKING</h2>
		
			<table style="margin-top: 20px;" width="100%">
				
				<tr id="first">
					<th>No</th>
					<th>Customer Info</th>
					<th>Service Provider Info</th>
					<th>Delivery Status</th>
					<th>Customer Receive Status</th>
					<th>Action</th>  
				</tr>
				<?php
				$i=1;
    			foreach($data as $row){
    			?>
    			<form action="" method="POST">
				<tr>
					<td id="styleTr"><?=$i?></td>
					<td style="text-align: left; width: 300px;">
						<label>Name: </label><?=$row['Cus_Name']?><br>
						<label>Address: </label><?=$row['Cus_Address']?><br>
						<label>Tracking: </label><?=$row['Tracking_ID']?><br>
						<label>Phone Number: </label><?=$row['Cus_PhoneNo']?>	
					</td>
					<td style="text-align: left; width: 300px;">
						<label>Company/Shop Name: </label><?=$row['SP_Name']?><br>
						<label>Address: </label><?=$row['SP_Address']?><br>
						<label>Phone Number: </label><?=$row['SP_PhoneNo']?>			
					</td>
					<td><?=$row['DeliveryStatus']?></td>
					<td><?=$row['ReceiveStatus']?></td>
					<td>
						<input type="hidden" name="Tracking_ID" value="<?=$row['Tracking_ID']?>">
						<input type="submit" name="Receive" value="Receive">
					</td>
				</tr>
				</form>
				<?php 
					if(isset($_POST['Receive'])){

						$Cus_ID=$_SESSION['customerID']; 

						$custUpdate = new trackingAnalyticController();
						$custUpdate->custUpdateTracking();
						$i=$i+1;
					}
					
				}
				?>
			</table>   		
    </div>
</body>
</html>
