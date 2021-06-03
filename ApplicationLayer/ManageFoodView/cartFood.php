<?php
	session_start();
	$Role=$_SESSION['role'];
	$CusID=$_SESSION['customerID'] ;
	$FoodID = $_GET['Food_ID'];

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';
	$viewUserData = new registrationController();
	$data = $viewUserData->viewDataCustomer($CusID);
	
	foreach ($data as $row) {
		$cusAdd=$row['Cus_Address'];
	}
	$date = date("Y-m-d"); 

	require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';

?>

<!DOCTYPE html>
<style>
	.subHeader{
		text-align: center;
		padding-top: 30px;
		padding-bottom: 30px;
		color: black;
		margin: 0px;
	}

	#tableCart {
		width: 100%;
		border: 1px solid black;
		border-collapse: collapse;
	}

	#tableCart td{
		border: 1px solid black;
		border-collapse: collapse;
		padding: 10px;
		text-align: center;
	}

	#tableCart th{
		background-color: #D1D3D6;
	}

	.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:600px;
	right:140px;
	}

	#foodList {
		position:fixed;
		bottom:560px;
		right:90px;
		background-color: red;
		color: white;
		width: 150px;
		height: 30px;
		border: 1px solid red;
		border-radius: 20px;
	}
</style>

<html>
<head>
	<title>RRMS</title>

	<link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">

	<?php
		$viewCart = new foodServicesController();
		$result = $viewCart->viewCart($CusID);

		if(isset($_POST['addcart'])){
            if($result==0)
            {
                $createCart = new foodServicesController();
                $createCart->createCart();
				$getCart = new foodServicesController();
				$orderfid = $getCart->getCart($CusID);
				$addCart = new foodServicesController();
				$addCart->addCart($orderfid);
				header('Location:cartFood.php');
            }
			else if($result==1)
			{
				$getCart = new foodServicesController();
		  		$orderfid = $getCart->getCart($CusID);

				$checkCart = new foodServicesController();
				$emptycart = $checkCart->checkCart($orderfid);

				$checkRestaurant = new foodServicesController();
				$samerestaurant = $checkRestaurant->checkRestaurant($orderfid);

				if($samerestaurant==0)
				{
					$updateofID = new foodServicesController();
					$updateofID->updateofID($orderfid);
					echo '<script type ="text/JavaScript">alert("Your food in cart has been removed because you select item from different restaurant")</script>';  
				}
				else if($samerestaurant==1)
				{
						if($emptycart==0)
					{
						$addCart = new foodServicesController();
						$addCart->addCart($orderfid);
					}
					else if($emptycart==1)
					{
						$updateCart = new foodServicesController();
						$updateCart->updateCart($orderfid);
					}
				}
			}
	
          }

		  $getCart = new foodServicesController();
		  $orderfid = $getCart->getCart($CusID);

		  $getspID = new foodServicesController();
		  $spid = $getspID->getspID($orderfid);
		  
	?>
</head>

<body>
	<div>
		<?php include '../../includes/cusTopNaviBar.php';?>
	</div>
	

	<br style="clear: both;"> 

	<a href="cartfood.php"><img src="../../Images/Food/cart.png" class="float"></a>
	<input type="button" onclick="location.href='/RRMS/ApplicationLayer/ManageFoodView/cusFoodList.php?ServiceP_ID=<?=$spid;?>'" value="Back to Food List" id="foodList">

	<div>
		<h2 class="subHeader">CART ITEM</h2>
	</div>
	<!-- Cart Content -->
	<div style="width: 60%;float: center;margin: 40px; margin-left: 350px;">
		<table id="tableCart">
			<tr id="tableCart">
				<th style="width: 40px;">No</th>
				<th><center>Food Name</center></th>
				<th><center>Quantity</center></th>
				<th><center>Price</center></th>
				<th><center>Action</center></th>
			</tr>
			<?php
			if($result==1)
			{	
				$viewfoodID = new foodServicesController();
				$data1 = $viewfoodID->viewfoodID($orderfid);
				$i = 1;
				$totalprice = 0;
				foreach ($data1 as $row1) 
				{
				$foodDetails = new foodServicesController();
				$data2 = $foodDetails->foodDetails($row1['Food_ID']);
				foreach ($data2 as $row2) 
				{
			?>
				<form action="" method="POST">
				<tr>
					<td><?=$i;?></td>
					<td><?=$row2['F_Name'];?></td>
					<td style="width: 40px;">
						<input type="number" name="quantity" value="<?=$row1['OF_Quantity'];?>">
						<input type="hidden" name="cartid" value="<?=$row1['Cart_ID'];?>">
					</td>
					<td>
						<?php
							$totalprice = $totalprice + $row2['F_Price']*$row1['OF_Quantity'];
						?>RM <?=$row2['F_Price']*$row1['OF_Quantity'];?>
					</td>
					<td style="width: 200px;">
						<input type="submit" name="update" value="Update">
						<input type="submit" name="delete" value="Delete">
					</td>
				</tr>
				</form>
				<?php
				}$i++;
				}
				if(isset($_POST['update'])){
					$quantity = $_POST['quantity'];
					$cartid = $_POST['cartid'];
					$updateQuan = new foodServicesController();
					$updateQuan->updateQuan($quantity, $cartid);
					echo "<meta http-equiv='refresh' content='0'>";
				}
				if(isset($_POST['delete'])){
					$cartid = $_POST['cartid'];
					$deleteCart = new foodServicesController();
					$deleteCart->deleteCart($cartid);
					echo "<meta http-equiv='refresh' content='0'>";
				}
			}
				?>

			<tr>
				<td colspan="3" style="text-align: right;">Total Price</td>
				<td>RM <?=$totalprice;?></td>
				<?php
					$updatetotalP = new foodServicesController();
            		$updatetotalP->updatetotalP($totalprice,$orderfid);
				?>
				<form action="/RRMS/ApplicationLayer/ManagePaymentView/paymentCheckout.php" method="POST">
					<input type="hidden" name="OrderF_ID" value="<?=$orderfid;?>">
					<input type="hidden" name="cusID" value="<?=$CusID;?>">
					<input type="hidden" name="spID" value="<?=$spid;?>">
					<input type="hidden" name="totalPrice" value="<?=$totalprice;?>">	
					<input type="hidden" name="date" value="<?=$date;?>">		
					<input type="hidden" name="cusAdd" value="<?=$cusAdd;?>">		
					<td><input type="submit" name="checkoutF" value="CheckOut!"></td>						
				</form>
			</tr>
		</table>
	</div>
	<!-- Cart Content End -->

</div>

</body>
</html>