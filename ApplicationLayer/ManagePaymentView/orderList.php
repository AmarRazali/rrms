<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order List</title>
	<?php
	include '../../includes/cusTopNaviBar.php';
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
	table td#second {border:inset 4px solid black; color:white;  background-color:rgb(51, 63, 80);}

</style>
</style>

</head>
<body>

<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Payment Controller.php';
	$Cus_ID=$_SESSION['customerID']; 

	$myOrder = new paymentController();
	$data = $myOrder->viewMyOrderDetail($Cus_ID);



	?>

    <div id="frm">
    	<h2>MY ORDER LIST</h2>
		
			<table style="margin-top: 20px;" width="100%">
				
				<tr id="first">
					<th>No</th>
					<th>Order ID</th>
					<th>Order Date</th>
			
					<th>Order Details</th>
					<th>Total Price</th>
					<th>Delivery Status</th>
					<th>Payment ID</th>
					<th>Action</th>  
				</tr>
				<?php
				$i=1;
    			foreach($data as $row){
    			?>
    		
				<tr>
					<td id="styleTr"><?=$i?></td>
					<td> <?=$row['Order_ID']?> </td>
					<td> <?=$row['OD_Date']?> </td>
			
					<td><?=$row['OD_Details']?></td>
					<td><?=$row['OD_TotalPrice']?></td>
					<td><?=$row['DeliveryStatus']?></td>
					<td><?=$row['Payment_ID']?></td>
					<td>
					<form action="/rrms/ApplicationLayer/ManagePaymentView/invoice.php" method="POST">
						<input type="hidden" name="Payment_ID" value="<?=$row['Payment_ID']?>">
						<input type="hidden" name="Order_ID" value="<?=$row['Order_ID']?>">
						<input type="hidden" name="ServiceP_ID" value="<?=$row['ServiceP_ID']?>">
						<button class="btn btn-link" type="submit" name="Receipt">View Invoice</button>	
					</td>
				</tr>
				</form>
				<?php 
				
					
				}
				?>
			</table>   		
    </div>
</body>
</html>
