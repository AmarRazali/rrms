<?php
session_start();
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Payment Controller.php';
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';
 
?>


<!DOCTYPE html>
<html>
<head>


<title>Successful Paid</title>

    <?php include '../../includes/cusPaymentTopNaviBar.php';


        $Role=$_SESSION['role'];
        $cusID=$_SESSION['customerID'];

        $viewOrderDetail = new paymentController();
		$data = $viewOrderDetail->viewOrderDetail($cusID);
		
		foreach ($data as $row){   
			$orderID= $row['Order_ID'];
			$details=  $row['OD_Details'];
			$date=  $row['OD_Date'];
			$totalPrice=  $row['OD_TotalPrice'];
			$deliveryAdd=  $row['DeliveryAddress'];
			$ServiceP_ID=  $row['ServiceP_ID'];

			$OrderF_ID= $row['OrderF_ID'];
			$OrderP_ID= $row['OrderP_ID'];
			$OrderG_ID= $row['OrderG_ID'];
			$OrderPA_ID= $row['OrderPA_ID'];
		  }


        if(isset($_POST['proceed'])){    
		
		  $addPayment = new paymentController();
		  $addTracking = new paymentController();
		  
		  if(!empty($OrderF_ID)){
			$addPayment->addPaymentF(); 
		  }
		  else if(!empty($OrderP_ID)){
			$addPayment->addPaymentP(); 
		  }
		  else if(!empty($OrderG_ID)){
			$addPayment->addPaymentG(); 
		  }
		  else if(!empty($OrderPA_ID)){
			$addPayment->addPaymentPA(); 
		  }

		  $addPayment->addTracking(); 
		  	      
          header('Location:/rrms/ApplicationLayer/ManagePaymentView/orderList.php');
        }


       
    ?>
</head>

<body>



<B>&nbsp;&nbsp;<i>Payment Page</i></B>
<br><br><br>

<center>
  <h1 style="color:green;" class="order__title no-margin">&nbsp; &nbsp;<b>Payment has been successfully made!</b>  <a >
   																												 <img src="/RRMS/images/Payment/success.png" width="50" height="50" />
  </a></h1>
  <div style="height: 50%; width: 60%; margin: 40px;">
	<div style="height: 100%; border: 2px solid black; ">

		<table border="0"; style="width: 50%;  margin: 30px; padding: 100px;">
			<tr>
				<td colspan="2" style="text-align: center;font-weight: bold;"><label>Order Information</label></td>
			</tr>
	
			<tr>
				<td align="left">Order ID: </td>
				<td align="right"> <?=$orderID?></td>
			</tr>
			<tr>
				<td align="left">Order Details:</td>
				<td align="right"> <?=$details?></td>
			</tr>
			<tr>
				<td align="left">Order Date: </td>
				<td align="right"> <?=$date?></td>
			</tr>
            <tr>
				<td align="left">Delivery Fees: </td>
				<td align="right"> Free Of Charge</td>
			</tr>
            <tr>
				<td align="left">Total Price: </td>
				<td align="right"> <?=$totalPrice?></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;font-weight: bold;"><label>Delivery Information</label></td>
			</tr>
			<tr>
				<td align="left">Delivery Address</td>
				<td align="right"><?=$deliveryAdd?></td>
			</tr>
	
		</table>
        
             <form action="" method="POST">
                <input type="hidden" name="cusID" value="<?=$cusID;?>">
				<input type="hidden" name="orderID" value="<?=$orderID;?>">
				<input type="hidden" name="totalPrice" value="<?=$totalPrice;?>">
				<input type="hidden" name="ServiceP_ID" value="<?=$ServiceP_ID;?>">
            <button class="btn btn-primary" type="submit" name="proceed">Continue</button>					
		 
        </form>
	</div>
</div>
 

    
</center>

 </body>


</html>
