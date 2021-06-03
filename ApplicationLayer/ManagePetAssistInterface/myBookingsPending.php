<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Booking List</title>
	<?php
	include '../../includes/custTopNaviBarPets.php';
	?>
</head>

<style>

	table, th, td {
  		border: 1px solid black;
  		border-collapse: collapse;
  		text-align: center;
  		background-color: ;
	}

	.isDisabled {
		color: currentColor;
        cursor: not-allowed;
        opacity: 0.5;
        text-decoration: none;
        pointer-events: none;
	}

	table tr#first {border:inset 4px solid black; color:white;  background-color:rgb(51, 63, 80);}
	table td#second {border:inset 4px solid black; color:white;  background-color:rgb(51, 63, 80);}

</style>

</head>
<body>

<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';
	$customerID = $_SESSION['customerID']; 

	$myBookings = new petController();
	$data = $myBookings->myBookings($customerID);



	?>

    <div id="frm">
    	<h2>MY PENDING BOOKINGS</h2>
		
			<table style="margin-top: 20px;" width="100%">
				
				<tr id="first">
					<th>No</th>
					<th>Booking ID</th>
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
    			<form action="" method="POST">
				<tr>
					<td id="styleTr"><?php echo $i; $i++;?></td>
					<td> <?=$row['OrderPA_ID']?> </td>
					<td> <?=$row['OPA_Dropoff']?> </td>
			
					<td><?=$row['OPA_Pickup']?></td>
					<td><?=$row['OPA_TotalPrice']?></td>
					<td><?=$row['statusSP']?></td>
					<td><?=$row['status']?></td>
					<td>
						<input type="hidden" name="ServiceP_ID" value="<?=$row['ServiceP_ID']?>">
						<a href="../ManagePetAssistInterface/custDecision.php?OrderPA_ID=<?=$row['OrderPA_ID'];?>">More Info&nbsp&nbsp&nbsp&nbsp</a>
						<input type="hidden" name="OrderPA_ID" value="<?=$row['OrderPA_ID']?>">					
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
