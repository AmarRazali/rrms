<?php
session_start();
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Payment Controller.php';
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/FoodServices Controller.php';
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/manageGoodsController.php';
 
?>


<!DOCTYPE html>
<html>
<head>


<title>Check Out</title>

    <?php include '../../includes/cusTopNaviBar.php';


        $Role=$_SESSION['role'];
        $cusID=$_SESSION['customerID'];
        $viewOrderDetail = new paymentController();
        $data = $viewOrderDetail->viewOrderDetail($cusID);
      

        if(isset($_POST['checkoutF'])){
            $orderfid  = $_POST['OrderF_ID'];
            $viewfoodID = new foodServicesController();
            $data1 = $viewfoodID->viewfoodID($orderfid);
            foreach ($data1 as $row1) 
            {
              $foodDetails = new foodServicesController();
              $data2 = $foodDetails->foodDetails($row1['Food_ID']);
              foreach ($data2 as $row2) 
              {
                $updateofdetails = new foodServicesController();
                $updateofdetails->updateofdetails($orderfid, $row2['F_Name'], $row1['OF_Quantity']);
              }
            }
          
          $addFoodOrder = new paymentController();
          $addFoodOrder->addFoodOrder();
          header('Location:paymentCheckout.php');
          echo "<script>window.location.href='paymentCheckout.php';</script>";
          exit;
        }
        
        if(isset($_POST['checkoutG']))
        {
          $idnum = $_POST['orderGID'];
          $insertprice = new manageGoodsController();
          $insertprice->insertPrice($idnum);
          $viewGoodsDetails = new paymentController();
          $dataGoods = $viewGoodsDetails->viewGoodsDetails($idnum);

              foreach ($dataGoods as $row){   
                $OrderG_ID = $row['OrderG_ID'];
                $Cus_ID =  $row['Cus_ID'];
                $ServiceP_ID =  $row['ServiceP_ID'];
                $OG_itemType =  $row['OG_itemType'];
                $OG_PickUpAdd =  $row['OG_PickUpAdd'];
                $OG_DeliveryAdd =  $row['OG_DeliveryAdd'];
                $OG_recipient =  $row['OG_recipient'];
                $OG_DeliveryDate =  $row['OG_DeliveryDate'];
                $OG_ReceiveDate =  $row['OG_ReceiveDate'];
                $OG_DeliveryAdd =  $row['OG_DeliveryAdd'];
                $OG_RunnerType =  $row['OG_RunnerType'];
                $OG_Price =  $row['OG_Price'];
              
              }
               
            $OF_Details= "Goods Delivery: (".$OG_itemType.") ". $OG_PickUpAdd ." To ". $OG_DeliveryAdd ." [". $OG_DeliveryDate ." To ". $OG_ReceiveDate. "] - (".  $OG_RunnerType .")" ;   
            $Address= $OG_PickUpAdd ." To ". $OG_DeliveryAdd;
        
           $addGoodsOrder = new paymentController();
           $addGoodsOrder->addGoodsOrder($OrderG_ID, $Cus_ID, $ServiceP_ID, $OF_Details, $OG_Price,$Address); 
           header('Location:/RRMS/ApplicationLayer/ManagePaymentView/paymentCheckout.php');
        }

        if(isset($_POST['checkoutP'])){    
          $addPharOrder = new paymentController();
          $addPharOrder->addPharOrder(); 
          header('Location:paymentCheckout.php');
        }

           
        foreach ($data as $row){   
          $orderID= $row['OrderF_ID'];
          $details=  $row['OD_Details'];
          $date=  $row['OD_Date'];
          $totalPrice=  $row['OD_TotalPrice'];
          $deliveryAdd=  $row['DeliveryAddress'];
        }
        
       
       
    ?>
</head>

<body>

<link rel="stylesheet" type="text/css" href="/RRMS/includes/ExternalCSS/orderSummary.css"> 

<B>&nbsp;&nbsp;<i>Payment Page</i></B>
<br><br><br>

<center>
<section class="order">

  <h1 class="order__title no-margin">&nbsp; &nbsp;<b>Order Summary</b></h1>
  <svg id="svg-summary" width="45" height="45" viewBox="0 0 24 24">
  <path d="M7,8V6H5V19H19V6H17V8H7M9,4A3,3 0 0,1 12,1A3,3 0 0,1 15,4H19A2,2 0 0,1 21,6V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V6A2,2 0 0,1 5,4H9M12,3A1,1 0 0,0 11,4A1,1 0 0,0 12,5A1,1 0 0,0 13,4A1,1 0 0,0 12,3Z"></path>
</svg>
  <section class="order__sub-sections order__subtotal clearfix ">
    <h2 class="order__subtitles no-margin">Details</h2>

   
   
    <table id="values" border="1" class="order__subtotal__table">
      <tbody>
        <tr>
          <td class="first-row">   Order ID  </td>
          <td class="first-row" align="right"> <?php echo $orderID;?></td>
        </tr>
          
        <tr>
          <td>Details</td>
          <td align="right"><?php echo $details;?></td>
        </tr>
        <tr>
          <td>Order date:</td>
          <td align="right"><?php echo $date;?></td>
        </tr>
        <tr class="values--discounts">
          <td>Delivery Fee:</td>
          <td align="right">FREE OF CHARGE</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td class="values__total"><b>Total Price</b></td>
          <td class="values--total-price" align="right">RM <?php echo $totalPrice;?></td>
        </tr>
        <tr>
          <td colspan="2" align="center"> <i>Enjoy RRMS Free Delivery Service!</i></td>
        </tr>
      </tfoot>
    </table>
  </section>
  <section class="order__sub-sections order__address">
    <h2 class="order__subtitles no-margin">Delivery address</h2>
    <p class="address--client no-margin"><?php echo $deliveryAdd;?></p>
      <div id="paypay-payment-button">
  </section>
 

    
</center>

<script src="https://www.paypal.com/sdk/js?client-id=AfydF0URrTocPgU9BeWsSxVEN_SJjsF21Y-D3-4XigGP7Cq0bwLdg49ghhO40yS1XY_HucRYcQkGo3v1&currency=MYR"></script>
<script>paypal.Buttons({
  style: {
    color: 'blue',
    shape: 'pill'
  },
  createOrder:function(data,actions){
    return actions.order.create({
      purchase_units: [{
          amount:{
            currency_code: 'MYR',
            value: '<?= $totalPrice ?>'
          }

      }]

    } );
  },
  onApprove: function(data,actions){
      return actions.order.capture().then(function(details){
       console.log(details)
       alert('Transaction Has Been Made');
       window.location.href = "../../ApplicationLayer/ManagePaymentView/successPaid.php?cust_id=<?=$_SESSION['customerID']?>"    
        
      })
  }


}).render('#paypay-payment-button');</script>
 </body>


</html>
