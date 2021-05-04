<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>RRMS</title>

	<?php
	$Role=$_SESSION['role'];
	?>
</head>
<body>

<?php

//Customer Account Interface
if ($Role==1) {
?>

	<div class="header">
		<?php include '../../includes/cusTopNaviBar.php';?>
	</div>
	

	<br style="clear: both;"> 

	<fieldset>
    <legend>MY ACCOUNT</legend>


	<!-- Customer Account Content -->
	<div class="contentRight">
		<?php
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

		$viewUserData = new registrationController();
		
		$custID = $_SESSION['customerID'];
		$data = $viewUserData->viewDataCustomer($custID);

		foreach ($data as $row) {
		
		
		?>
		<form action="" method="POST">
		<div  style="margin-top: 30px;">
		<fieldset>
		<table id="tableJoblist">
			<tr id="tableJoblisttr">
				<th colspan="2">BASIC INFORMATION</th>
			</tr>
			<tr>
				<td><label>Name</label></td>
				<td><input type="text" name="updateName" value="<?=$row['Cus_Name'];?>"></td>
			</tr>
			<tr>
				<td><label>Address</label></td>
				<td><textarea type="text" name="updateAddress"><?=$row['Cus_Address'];?></textarea></td>
			</tr>
			<tr>
				<td><label>Phone Number</label></td>
				<td><input type="text" name="updatePhoneNo" value="<?=$row['Cus_PhoneNo'];?>"></td>
			</tr>
			<tr id="tableJoblisttr">
				<th colspan="2">PROFILE</th>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input type="text" name="updateEmail" value="<?=$row['Cus_Email'];?>"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type="text" name="updatePassword" value="<?=$row['Cus_Password'];?>"></td>
			</tr>
		</table>
		</div>
		<div style="margin: 30px; float: right;">
			<input type="submit" name="updateinfo" value="Update" id="buttonPaid">
		</div>
	</div>
	</fieldset>
		</form>
	

<?php
		}
		if(isset($_POST['updateinfo'])){
			require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

			$custID = $_SESSION['customerID'];

			$updateCust = new registrationController();
			$updateCust->updateCust($custID);
		}
		?>

	<br style="clear: both;"> 
	</div>

	<!-- Customer Account Content End -->
<?php
}
//Runner Account Interface
elseif ($Role==2) {
?>
	<div class="header">
		<?php include 'Header.php'; ?>
	</div>

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">MY ACCOUNT</h2>
	</div>
	
	<?php include 'Navigation Menu.php'; ?>

	<!-- Runner Account Content -->
	<div class="contentRight">
		<?php
		require_once $_SERVER["DOCUMENT_ROOT"].'/Runner2You/RMS Business Services Layer/RMS Controller Package/Registration Controller.php';

		$viewUserData = new registrationController();
		
		$runnerID = $_SESSION['runnerID'];
		$data = $viewUserData->viewDataRunner($runnerID);

		foreach ($data as $row) {
		
		
		?>
		<form action="" method="POST">
		<div  style="margin-top: 30px;">
		<table id="tableJoblist">
			<tr id="tableJoblisttr">
				<th colspan="2">BASIC INFORMATION</th>
			</tr>
			<tr>
				<td><label>Name</label></td>
				<td><?=$row['RN_NAME'];?></td>
			</tr>
			<tr>
				<td><label>Address</label></td>
				<td><input type="text" name="updateAddress" value="<?=$row['RN_ADDRESS'];?>">, <input type="text" name="updatePostcode" value="<?=$row['RN_POSTCODE'];?>">, 
					<select name="updateState" style="height: 25px;">
						<option value="<?=$row['RN_STATE'];?>"><?=$row['RN_STATE'];?></option>
						<option value="Perlis">Perlis</option>
						<option value="Kedah">Kedah</option>
						<option value="Perak">Perak</option>
						<option value="Penang">Penang</option>
						<option value="Kelantan">Kelantan</option>
						<option value="Terengganu">Terengganu</option>
						<option value="Pahang">Pahang</option>
						<option value="Selangor">Selangor</option>
						<option value="Negeri Sembilan">Negeri Sembilan</option>
						<option value="Melaka">Melaka</option>
						<option value="Johor">Johor</option>
						<option value="Sarawak">Sarawak</option>
						<option value="Sabah">Sabah</option>
						<option value="Wilayah Persekutuan">Wilayah Persekutuan</option>
					</select></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><?=$row['RN_EMAIL'];?></td>
			</tr>
			<tr>
				<td><label>Phone Number</label></td>
				<td><input type="text" name="updatePhoneNo" value="<?=$row['RN_PHONE_NO'];?>"></td>
			</tr>
			<tr>
				<td><label>Gender</label></td>
				<td><?=$row['RN_GENDER'];?></td>
			</tr>
			<tr>
				<td><label>Age</label></td>
				<td><?=$row['RN_AGE'];?></td>
			</tr>
			<tr id="tableJoblisttr">
				<th colspan="2">BANK ACCOUNT INFORMATION</th>
			</tr>
			<tr>
				<td><label>Bank</td>
				<td>
					<select name="updateBanks" style="height: 25px;">
							<option value="<?=$row['RN_BANKS'];?>"><?=$row['RN_BANKS'];?></option>
							<option value="Bank Islam">Bank Islam (BIMB)</option>
							<option value="CIMB Bank">CIMB Bank</option>
							<option value="Hong Leong Islamic Bank">Hong Leong Islamic Bank</option>
							<option value="RHB Bank">RHB Bank</option>
							<option value="Bank Simpanan Nasional">Bank Simpanan Nasional (BSN)</option>
							<option value="Public Bank">Public Bank</option>
							<option value="AmBank Islamic Bhd">AmBank Islamic Berhad</option>
							<option value="Maybank Islamic Bhd">Maybank Islamic Berhad</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Account Number</label></td>
				<td><input type="text" name="updateAccount" value="<?=$row['RN_ACCOUNT'];?>"></td>
			</tr>
			<tr id="tableJoblisttr">
				<th colspan="2">DETAILS</th>
			</tr>
			<tr>
				<td><label>IC Photo</label></td>
				<td><img src="<?=$row['RN_IC_PHOTO'];?>" style="width: 100px;height: 50px;"></td>
			</tr>
			<tr>
				<td><label>License Photo</label></td>
				<td><img src="<?=$row['RN_LICENSE_PHOTO'];?>" style="width: 100px;height: 50px;"></td>
			</tr>
			<tr>
				<td><label>Vehicle</label></td>
				<td><?=$row['RN_VEHICLE'];?></td>
			</tr>
			<tr id="tableJoblisttr">
				<th colspan="2">PROFILE</th>
			</tr>
			<tr>
				<td><label>Username</label></td>
				<td><input type="text" name="updateUsername" value="<?=$row['RN_USERNAME'];?>"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type="text" name="updatePassword" value="<?=$row['RN_PASSWORD'];?>"></td>
			</tr>
		</table>
		</div>
		<div style="margin: 30px; float: right;">
			<input type="submit" name="updateinfo" value="Update" id="buttonPaid">
		</div>
	</form>
		<?php
		}
		if(isset($_POST['updateinfo'])){
			require_once $_SERVER["DOCUMENT_ROOT"].'/Runner2You/RMS Business Services Layer/RMS Controller Package/Registration Controller.php';

			$runnerID = $_SESSION['runnerID'];

			$updateRunner = new registrationController();
			$updateRunner->updateRunner($runnerID);
		}
		?>

	<br style="clear: both;"> 
	</div>
	<!-- Runner Account Content End-->
<?php
}
//Service Provider Account Interface
elseif ($Role==3) {
?>
	<div class="header">
		<?php include '../../includes/ServicePTopNaviBar.php';?>
	</div>

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">MY ACCOUNT</h2>
	</div>

	<!-- Service Provider Account Content -->
	<div class="contentRight">
		<?php
		require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

		$viewUserData = new registrationController();
		
		$providerID = $_SESSION['providerID'];
		$data = $viewUserData->viewDataProvider($providerID);

		foreach ($data as $row) {
		
		?>
		<form action="" method="POST">
		<div  style="margin-top: 30px;">

		<table id="tableJoblist">
			<tr id="tableJoblisttr">
				<fieldset>
				<th colspan="2">BASIC INFORMATION</th>
			</tr>
			<tr>
				<td><label>Name of Company</label></td>
				<td><input type="text" name="updateName" value="<?=$row['SP_Name'];?>"></td>
			</tr>
			<tr>
				<td><label>Address</label></td>
				<td><textarea type="text" name="updateAddress"><?=$row['SP_Address'];?></textarea></td>
			</tr>
			<tr>
				<td><label>Phone Number</label></td>
				<td><input type="text" name="updatePhoneNo" value="<?=$row['SP_PhoneNo'];?>"></td>
			</tr>
			<tr id="tableJoblisttr">
				<th colspan="2">PROFILE</th>
			</tr>
			<tr>
				<td><label>Bank Type</label></td>
				<td><input type="text" name="updateBank" value="<?=$row['SP_BankType'];?>"></td>
			</tr>
			<tr>
				<td><label>Account Number</label></td>
				<td><input type="text" name="updateAccount" value="<?=$row['SP_AccNo'];?>"></td>
			</tr>
			<tr>
				<td><label>Email</label></td>
				<td><input type="text" name="updateEmail" value="<?=$row['SP_Email'];?>"></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input type="text" name="updatePassword" value="<?=$row['SP_Password'];?>"></td>
			</tr>
			</fieldset>
		</table>
		</div>
		<div style="margin: 30px; float: right;">
			<input type="submit" name="updateinfo" value="Update" id="buttonPaid">
		</div>
	</div>
	
		</form>
<?php
		}
		if(isset($_POST['updateinfo'])){
			require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

			$providerID = $_SESSION['providerID'];

			$updateProvider = new registrationController();
			$updateProvider->updateProvider($providerID);
		}
		?>
	<br style="clear: both;"> 
	</div>
	<!-- Service Provider Account Content End -->
<?php
}
?>
</body>
</html>