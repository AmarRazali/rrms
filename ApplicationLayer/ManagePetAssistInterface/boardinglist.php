<?php
session_start();
?>

<!DOCTYPE html>
<style>
#boxProduct {
		float: left;
		clear: right;
		width: 250px; 
		height: 300px;
		border-radius: 30px;
		margin: 30px;
		margin-left: 53px;
		border: 2px solid black;
		box-shadow: 10px 10px rgb(51, 63, 80);
	}
.subHeader{
		text-align: center;
		padding-top: 30px;
		padding-bottom: 30px;
		color: black;
		margin: 0px;
	}
</style>
<html>
<head>
	<title>RRMS</title>

	<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">



<?php
		$Role = $_SESSION['role'];
	?>	

</head>

<!-- Content Mainpage Customer -->
<body>

	<div>
		<?php include '../../includes/custTopNaviBarPets.php';?>
	</div>

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">Boarding Centres Available</h2>
	</div>
	<div>
	<!-- Content Mainpage Customer-->
	<?php
	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

	$pet = new petController();
	$data = $pet->allPet();


		foreach ($data as $row) {
			?>
			<a href="../ManagePetAssistInterface/placedetails.php?ServiceP_ID=<?=$row['ServiceP_ID'];?>">
			<div id="boxProduct">
				<div style="height: 60%;">
					<img src="<?=$row['P_Image'];?>" style="width: 90%;height: 90%;margin-left: 12px; margin-top: 20px;">
				</div>
				<div style="height: 80px; width: 250px; background-color: rgb(51, 63, 80);text-align: center;color: white;">
					<h3 style="text-align: center;color: white;padding-top: 10px;font-size: 14px;"><?=$row['P_Name'];?></h3>
					<label style="font-size: 12px;">RM <?=$row['P_Price'];?></label>
				</div>
			</div></a>
			<?php
			}
			?>
 	<!-- Content Mainpage Customer End -->
	</div>
</body>
</html>