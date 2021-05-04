<?php
session_start();
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Payment Controller.php';

?>


<!DOCTYPE html>
<html>
<head>


<title>Receipt</title>

    <?php include '../../includes/cusPaymentTopNaviBar.php';


        $Role=$_SESSION['role'];
        $cusID=$_SESSION['customerID'];
		

        if(isset($_POST['back'])){    
		  	      
          header('Location:/rrms/ApplicationLayer/ManagePaymentView/orderList.php');
		}
		
		if(isset($_POST['Receipt'])){

			$Payment_ID= $_POST['Payment_ID'];
			$Order_ID=  $_POST['Order_ID'];
			$ServiceP_ID=  $_POST['ServiceP_ID'];
			//header('Location:/rrms/ApplicationLayer/ManagePaymentView/receipt.php');
		}

		$receipt = new paymentController();
		$data = $receipt->viewReceipt($Payment_ID);

		foreach ($data as $row){   
			$Cus_Name= $row['Cus_Name'];
			$Cus_PhoneNo=  $row['Cus_PhoneNo'];
			$Cus_Address=  $row['Cus_Address'];
			$Cus_Email=  $row['Cus_Email'];

			$Order_ID=  $row['Order_ID'];
			$OD_Details=  $row['OD_Details'];
			$OD_TotalPrice= $row['OD_TotalPrice'];
			$OD_Date= $row['OD_Date'];

			$ServiceP_ID= $row['ServiceP_ID'];
			$SP_Name= $row['SP_Name'];
			$SP_Address= $row['SP_Address'];
			$SP_PhoneNo= $row['SP_PhoneNo'];

			$Payment_ID= $row['Payment_ID'];
			$Payment_Time= $row['Payment_Time'];
			$Payment_Amount= $row['Payment_Amount'];
		  }


       
    ?>
</head>

<body>



<B>&nbsp;&nbsp;<i>Invoice Page</i></B>
<br>

<center>
  <h1 style="color:teal;" class="order__title no-margin">&nbsp; &nbsp;<b>Payment Invoice</b>  <a >
   																												 <img src="/RRMS/images/Payment/invoice.png" width="50" height="50" />
  </a></h1>
  <div style="height: 50%; width: 60%; margin: 40px;">
	<div style="height: 100%; border: 2px solid black; ">

		<table border="0"; style="width: 50%;  margin: 30px; padding: 100px;">
			<tr>
				<td colspan="2" style="text-align: left;font-weight: bold;"><label>Payment Information</label></td>
			</tr>
			<tr>
				<td align="left">Payment ID: </td>
				<td align="right"> <?=$Payment_ID?></td>
			</tr>
			<tr>
				<td align="left">Payment Time:</td>
				<td align="right"> <?=$Payment_Time?></td>
			</tr>
			<tr>
				<td align="left">Payment Ammount: </td>
				<td align="right">RM <?=$Payment_Amount?></td>
			</tr>
			<tr>
				<td align="left">&nbsp;</td>
	
			</tr>
			<tr>
				<td colspan="2" style="text-align: left;font-weight: bold;"><label>Recipient Infomation</label></td>
			</tr>

			<tr>
				<td align="left">Name:</td>
				<td align="right"><?=$Cus_Name?></td>
			</tr>
			<tr>
				<td align="left">Phone No.</td>
				<td align="right"><?=$Cus_PhoneNo?></td>
			</tr>
			<tr>
				<td align="left">Delivery Address:</td>
				<td align="right"><?=$Cus_Address?></td>
			</tr>
			<tr>
				<td align="left">&nbsp;</td>
	
			</tr>

			<tr>
				<td colspan="2" style="text-align: left;font-weight: bold;"><label>Order Information</label></td>
			</tr>
			<tr>
				<td align="left">Order ID:</td>
				<td align="right"><?=$Order_ID?></td>
			</tr>
			<tr>
				<td align="left">Order Details:</td>
				<td align="right"><?=$OD_Details?></td>
			</tr>
			<tr>
				<td align="left">Total Price</td>
				<td align="right">RM<?=$OD_TotalPrice?></td>
			</tr>
			<tr>
				<td align="left">&nbsp;</td>
	
			</tr>

			<tr>
				<td colspan="2" style="text-align: left;font-weight: bold;"><label>Company/Shop Information</label></td>
			</tr>
			<tr>
				<td align="left">SP ID:</td>
				<td align="right"><?=$ServiceP_ID?></td>
			</tr>
			<tr>
				<td align="left">Shop Name:</td>
				<td align="right"><?=$SP_Name?></td>
			</tr>
			<tr>
				<td align="left">Phone Num:</td>
				<td align="right">RM<?=$SP_PhoneNo?></td>
			</tr>
			<tr>
				<td align="left">Address:</td>
				<td align="right"><?=$SP_Address?></td>
			</tr>
			<tr>
				<td align="left">&nbsp;</td>
	
			</tr>
	

        
             <form action="" method="POST">
                <input type="hidden" name="cusID" value="<?=$cusID;?>">
				<input type="hidden" name="orderID" value="<?=$orderID;?>">
				<input type="hidden" name="totalPrice" value="<?=$totalPrice;?>">
				<input type="hidden" name="ServiceP_ID" value="<?=$ServiceP_ID;?>">
			<tr>
				<td colspan="2" style="text-align: center;font-weight: bold;"> <button class="btn btn-primary" type="button" name="back" onclick="location.href='orderList.php'">Back</button></td>
			</tr>
           			
			</table>
        </form>
	</div>
</div>
 

    
</center>

 </body>


</html>
