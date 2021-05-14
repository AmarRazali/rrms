<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bookings List</title>
	<?php
	include '../../includes/servicePTopNaviBarPets.php';
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
	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';
	$providerID = $_SESSION['providerID']; 

	$myBookingsSPAll = new petController();
	$data = $myBookingsSPAll->myBookingsSPAll($providerID);



	?>

    <div id="frm">
    	<h2>MY BOOKINGS</h2>
		
			<table style="margin-top: 20px;" width="100%">
				
				<tr id="first">
					<th>No</th>
					<th>Customer ID</th>
					<th>Start Date</th>
			
					<th>End Date</th>
					<th>Total Price</th>
					<th>Status</th>
					<th>Payment Status</th>
					<th>Action</th>  
				</tr>
				<?php
				$i=1;
    			foreach($data as $row){
    			?>
    		
				<tr>
					<td id="styleTr"><?php echo $i; $i++;?></td>
					<td><?=$row['Cus_ID']?></td>
					<td><?=$row['OPA_Dropoff']?></td>
			
					<td><?=$row['OPA_Pickup']?></td>
					<td><?=$row['OPA_TotalPrice']?></td>
 					<td><?=$row['statusSP']?></td>
					<td><?=$row['status']?></td>
					<td>
					<form action="" method="POST">
						<input type="hidden" name="OrderPA_ID" value="<?=$row['Order_ID']?>">
						<input type="hidden" name="ServiceP_ID" value="<?=$row['ServiceP_ID']?>">
	
						<a href="../ManagePetAssistInterface/spViewMoreAll.php?OrderPA_ID=<?=$row['OrderPA_ID'];?>">More Info</a>	

	
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
