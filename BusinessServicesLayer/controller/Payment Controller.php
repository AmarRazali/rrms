<?php 

require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/model/Payment.php';

class paymentController {

//function to insert into receipt table
	function insertReceipt(){
		$orderdetails = new paymentModel();
		$orderdetails->custID = $_POST['custID'];
		$orderdetails->providerID = $_POST['providerID'];
		$orderdetails->productID = $_POST['productID'];
		$orderdetails->quantity = $_POST['quantity'];
		$orderdetails->totalprice = $_POST['totalprice'];
		$orderdetails->date = $_POST['date'];
		$orderdetails->trackno = $_POST['trackno'];

		$orderdetails->insertReceipt();		
	}


	function viewOrderDetail($cusID){
		$viewOrderDetail = new paymentModel();
		$viewOrderDetail->cusID = $cusID;
		return $viewOrderDetail->viewOrderDetail();
	}

	function viewMyOrderDetail($Cus_ID){
		$viewOrderDetail = new paymentModel();
		$viewOrderDetail->Cus_ID = $Cus_ID;
		return $viewOrderDetail->viewMyOrderDetail();
	}

	
	function viewReceipt($Payment_ID){
		$viewReceipt = new paymentModel();
	
		$viewReceipt->Payment_ID = $Payment_ID;
	
		return $viewReceipt->viewReceipt();
	}

	function viewGoodsDetails($idnum){
		$viewGoodsDetails = new paymentModel();
		$viewGoodsDetails->idnum = $idnum;
		return $viewGoodsDetails->viewGoodsDetails();
	}

	function addTracking(){
		$addTracking = new paymentModel();
		$addTracking->cusID = $_POST['cusID'];
		$addTracking->orderID = $_POST['orderID'];
		$addTracking->ServiceP_ID = $_POST['ServiceP_ID'];
		$addTracking->addTracking();
      }
	
	function addFoodOrder(){
		$addFoodOrder = new paymentModel();
		$addFoodOrder->OrderF_ID = $_POST['OrderF_ID'];
		$addFoodOrder->cusID = $_POST['cusID'];
		$addFoodOrder->providerID=$_POST['spID'];
		$addFoodOrder->totalPrice= $_POST['totalPrice'];
		$addFoodOrder->OF_Date= $_POST['date'];
		$addFoodOrder->cusAdd= $_POST['cusAdd'];
		$addFoodOrder->addFoodOrder();
	}

	function addPharOrder(){
		$addPharOrder = new paymentModel();
	
		$addPharOrder->CusID = $_POST['cusID'];
		$addPharOrder->Item_ID = $_POST['Item_ID'];
		$addPharOrder->ServiceP_ID=$_POST['spID'];
		$addPharOrder->cusAdd= $_POST['cusAdd'];
		$addPharOrder->totalPrice= $_POST['totalPrice'];

		$I_Name = $_POST['I_Name'];	
		$I_Qty = $_POST['I_Qty'];
		
		
		$addPharOrder->OP_Details="Pharmacy Delivery: ". $I_Name ." x (".(string)$I_Qty .")" ;
		
		return $addPharOrder->addPharOrder();
    
        

	}

	function addGoodsOrder($OrderG_ID, $Cus_ID, $ServiceP_ID, $OF_Details,$OG_Price, $Address){
		$addGoodsOrder = new paymentModel();
		$addGoodsOrder->OrderG_ID = $OrderG_ID;
		$addGoodsOrder->Cus_ID = $Cus_ID;
		$addGoodsOrder->ServiceP_ID=$ServiceP_ID;
		$addGoodsOrder->OF_Details= $OF_Details;
		$addGoodsOrder->OG_Price= $OG_Price;
		$addGoodsOrder->Address= $Address;
	

		if($addGoodsOrder->addGoodsOrder()){
            $message = "Your has Pre-Order";
       		 echo "<script type='text/javascript'> alert('$message'); </script>";
        }
	
	}




		function addPaymentF(){
			$addPayment = new paymentModel();
			$addPayment->cusID = $_POST['cusID'];
			$addPayment->orderID = $_POST['orderID'];
			$addPayment->totalPrice=$_POST['totalPrice'];
			$addPayment->ServiceP_ID=$_POST['ServiceP_ID'];
		
		
			if($addPayment->addPaymentF()){
				$message = "Your Order has been notify by seller";
				echo "<script type='text/javascript'> alert('$message'); </script>";
			}
		
		}

		
		function addPaymentP(){
			$addPayment = new paymentModel();
			$addPayment->cusID = $_POST['cusID'];
			$addPayment->orderID = $_POST['orderID'];
			$addPayment->totalPrice=$_POST['totalPrice'];
			$addPayment->ServiceP_ID=$_POST['ServiceP_ID'];
		
			if($addPayment->addPaymentP()){
				$message = "Your Order has been notify by seller";
				echo "<script type='text/javascript'> alert('$message'); </script>";
			}
		
		}

		function addPaymentG(){
			$addPayment = new paymentModel();
			$addPayment->cusID = $_POST['cusID'];
			$addPayment->orderID = $_POST['orderID'];
			$addPayment->totalPrice=$_POST['totalPrice'];
			$addPayment->ServiceP_ID=$_POST['ServiceP_ID'];
		
			if($addPayment->addPaymentG()){
				$message = "Your Order has been notify by seller";
				echo "<script type='text/javascript'> alert('$message'); </script>";
			}
		
		}

		function addPaymentPA(){
			$addPayment = new paymentModel();
			$addPayment->cusID = $_POST['cusID'];
			$addPayment->orderID = $_POST['orderID'];
			$addPayment->totalPrice=$_POST['totalPrice'];
			$addPayment->ServiceP_ID=$_POST['ServiceP_ID'];
		
			if($addPayment->addPaymentPA()){
				$message = "Your Order has been notify by seller";
				echo "<script type='text/javascript'> alert('$message'); </script>";
			}
		
		}




}
?>