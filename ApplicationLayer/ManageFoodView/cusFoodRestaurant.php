<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

	$restaurantdata = new foodServicesController();
	$data = $restaurantdata->allRestaurant();

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
		<?php include '../../includes/cusTopNaviBar.php';?>
	</div>

	<br style="clear: both;"> 

	<div>
		<h2 class="subHeader">AVAILABLE RESTAURANT</h2>
	</div>
	<div>
	
	<?php
		foreach ($data as $row) {
			?>
            <a href="../ManageFoodView/cusFoodList.php?ServiceP_ID=<?=$row['ServiceP_ID'];?>">
			<div id="boxProduct">
				<div style="height: 60%;">
					<img src="<?=$row['SP_Image'];?>" style="width: 90%;height: 90%;margin-left: 12px; margin-top: 20px;">
				</div>
				<div style="height: 80px; width: 250px; background-color: rgb(51, 63, 80);text-align: center;color: white;">
					<h3 style="text-align: center;color: white;padding-top: 10px;font-size: 14px;"><?=$row['SP_Name'];?></h3>
					<label style="font-size: 12px;"><?=$row['SP_Address'];?></label>
				</div>
			</div></a>
		<?php
		}
		?>
	</div>
</body>
</html>