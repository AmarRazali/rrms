<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/manageGoodsController.php';
?>

<!DOCTYPE html>
<html>
<head>

<title>Manage Runner</title>

    <?php include '../../includes/ServicePTopNaviBarGoods.php';?>

		<?php
		$Role = $_SESSION['role'];
		$providerID = $_SESSION['providerID'];

		if(isset($_POST['delete'])){
			require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/manageGoodsController.php';

			$deleteRunner= new manageGoodsController();
			$deleteRunner->deleteRunner();
		}
		?>

		<style>
			form{
					width: 320px;
					height: auto;
					border: 1px solid #ccc;
					padding:10px;
					background-color:white;
					border-radius: 20px;
			}

			input{
					width: 70px;
					border:2px solid #ccc;
					padding:1px;
					margin:5px auto;
					border-radius: 5px;
			}

			button{
					background:#333f50;
					padding: 5px 5px;
					color:#fff;
					border-radius:5px;
					margin-right:10px;
					border:none;
			}
		</style>

</head>
<body>

<br><br>

<?php
	$runnerdata = new manageGoodsController();

	$data = $runnerdata->viewSpRunner($providerID);
?>

<center>
<form action="" method="post">
<table id="SPrunnerList" border="0" cellpadding="5">
<tr>
	<th colspan="2"><center>REGISTERED RUNNER</center><hr></th>
</tr>
<tr>
	<td colspan="2"><center><a href="regiSpRunner.php">+ Register new runner<hr></center></td>
</tr>

<?php
	foreach ($data as $row) {
?>
<tr>
	<td colspan="2">Name: <?=$row['Run_Name']?></td>
</tr>
<tr>
	<td>  Phone Number: <?=$row['Run_PhoneNo']?></td>
	<td>&nbsp;
		<input type="hidden" name="runnerID" value="<?=$row['Runner_ID']?>">
		<input type="submit" name="delete" value="Delete">
	</td>
</tr>
<tr>
	<td colspan="2"><hr></td>
</tr>
</form>
<?php
}
?>


</table>
</center>

</body>

</html>
