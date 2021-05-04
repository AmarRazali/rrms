<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Runner Profile</title>

	<?php
			$role=$_SESSION['runnerID'];
			include '../../includes/runnerTopNaviBar.php';
	?>

</head>
<body>

<!-- Runner Account -->

	<br style="clear: both;"> 
	<center>
	<fieldset>
    <legend>Runner INFOMATION</legend>


	<!-- Runner Account Content -->
	<div class="contentRight">
		<?php
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

		$viewUserData = new registrationController();
		
		$runID = $_SESSION['runnerID'];
		$data = $viewUserData->viewDataRunner($runID);

		foreach ($data as $row) {
		
		
		?>
        		

		<form action="" method="POST">
		<div  style="margin-top: 30px;">
		<table id="tableJoblist">
			<tr id="tableJoblisttr">
				<th colspan="2"><u>Basic Infomation:</u></th>
			</tr>
			<tr>
				<td><label>Your Name	</label></td>
				<td><input type="text" name="updateName" value="<?=$row['Run_Name'];?>" readonly></td>
			</tr>
			<tr>
				<td><label>Identification No.	</label></td>
				<td><input type="text" name="updateIC" value="<?=$row['Run_ICNum'];?>" readonly></td>

			</tr>
			<tr>
				<td><label>Phone Number	</label></td>
				<td><input type="text" name="updatePhoneNo" value="<?=$row['Run_PhoneNo'];?>" readonly></td>
			</tr>
			<tr>
				<td><label>Address	</label></td>
				<td><input type="text" name="updateAddress" value="<?=$row['Run_Address'];?>" readonly></td>
			</tr>

			<tr>
				<td>&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;</td>
			</tr>
			<tr id="tableJoblisttr">
				<th colspan="2"><u>Bank Information:</u></th>
			</tr>
			<tr>
				<td><label>Bank Type	</label></td>
				<td><input type="text" name="updateBankType" value="<?=$row['Run_BankType'];?>" readonly></td>
			</tr>
			<tr>
				<td><label>Bank Account No	</label></td>
				<td><input type="text" name="updateBankNo" value="<?=$row['Run_AccNum'];?>" readonly></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;</td>
				<td>&nbsp;&nbsp;</td>
			</tr>

		</table>
	</div>
	</fieldset>
		</form>
		</center>

<?php
		}
		?>

	<br style="clear: both;"> 
	</div>

	<!-- Runner Account Content End -->
</body>
</html>