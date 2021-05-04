<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Order</title>
   	
   	<?php
	$Role = $_SESSION['role'];
	$providerID = $_SESSION['providerID'];



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
	<?php 
			   include '../../includes/spFoodTopNaviBar.php';
			   
			   if(isset($_POST['update'])){
				require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';
		
				$updateOrderSatus = new foodServicesController();
				$updateOrderSatus->updateManageOrder();
				header("Location:../ManageFoodView/spAcceptFood.php");
		
			}
		?>

<div>
</div>

	<?php
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

		$productdata = new foodServicesController();

		$data = $productdata->viewManageOrder($providerID);
	?>


    <div id="frm">
    	<center><h2>UPDATE ORDER</h2></center>
			<center><table style="margin-top: 20px;" width="90%">
				
				<form action="" method="POST">
				<tr id="first">
					<th style="width: 20px;">Order ID</th>
					<th>Customer Info</th>
					<th>Order Info</th>
					<th>Current Status</th>
					<th>Update Status</th>
					<th>Update Assignation</th>
					<th>Action</th>
				</tr>
				<?php
				$i=1;
				foreach ($data as $row) {
				?>
				<tr>
					<td><?=$row['Order_ID']?></td>
					<td style="text-align: left; width: 300px;">
						<label>Name: </label><?=$row['Cus_Name']?><br>
						<label>Address: </label><?=$row['Cus_Address']?><br>
						<label>Phone Number: </label><?=$row['Cus_PhoneNo']?>	
					</td>
					<td style="text-align: left; width: 300px;">
						<label>Food Description: </label><?=$row['OD_Details']?><br>
						<label>Price: </label><?=$row['OD_TotalPrice']?>			
					</td>
					<td><?=$row['ready']?></td>
					<td>
						<select name="Ready">
							<option value="Ready">Ready</option>
							<option value="Not Ready">Not Ready</option>
						</select>
					</td>
					<td>
						<select name="assignation">
							<option value="Ready">Ready</option>
							<option value="Not Ready">Not Ready</option>
						</select>
					</td>

					<td>
						<input type="hidden" name="OrderID" value="<?=$row['Order_ID']?>">
						<input type="hidden" name="TrackingID" value="<?=$row['Tracking_ID']?>">
						<br><input type="submit" name="update" value="update" id="updateButton"><br>
						<br><input type="button" onclick="location.href='spAcceptFood.php'" value="BACK" id="backButton"><br>
					</td>
				</tr>
				<?php
			$i = $i+1;
			}
			?>
			</table></center>
		</form>
		
   		
    </div>
</body>

</html>
