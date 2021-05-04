<?php

require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/model/manageGoods.php';

class manageGoodsController{

	//function to place delivery
	function placeDelivery($custID){
		$placeDelivery = new manageGoods();
		$placeDelivery->customerID = $custID;
		$placeDelivery->pickupLoc= $_POST['pickupLoc'];
		$placeDelivery->dropoffLoc = $_POST['dropoffLoc'];
		$placeDelivery->recepientname = $_POST['recepientname'];
    $placeDelivery->recipientpn = $_POST['recipientpn'];
		$placeDelivery->itemtype= $_POST['itemtype'];
		$placeDelivery->preferreddelivery = $_POST['preferreddelivery'];
		$placeDelivery->itemsize = $_POST['itemsize'];
    $placeDelivery->itemweight = $_POST['itemweight'];
		$placeDelivery->deliverdate= $_POST['deliverdate'];
		$placeDelivery->receivedate = $_POST['receivedate'];

		if($placeDelivery->placeDelivery()){
		echo "<script type='text/javascript'>window.location = 'proceedOrder.php';</script>";
		$_SESSION['pickupLoc'] = $_POST['pickupLoc'];
		$_SESSION['dropoffLoc'] = $_POST['dropoffLoc'];
		$_SESSION['itemweight'] = $_POST['itemweight'];
		}

	}

	//function to set delivery cost
	function setDeliveryCost($spID){
		$setDeliveryCost = new manageGoods();
		$setDeliveryCost->providerID = $spID;
		$setDeliveryCost->costdistance= $_POST['costdistance'];
		$setDeliveryCost->weightcost = $_POST['weightcost'];

		if($setDeliveryCost->setDeliveryCost()){
		echo "<script type='text/javascript'>window.location = 'spServiceRate.php';</script>";
		}

	}

	//function to view delivery cost
	function viewDeliveryCost($spID){
		$viewDeliveryCost = new manageGoods();
		$viewDeliveryCost->providerID = $spID;
		return $viewDeliveryCost->viewDeliveryCost();
	}

	function registerSPRunner($spID){
			$register = new manageGoods();
			$register->spid = $spID;
			$register->role = 2;
			$register->RunName = $_POST['RunName'];
			$register->RunPhoneNo = $_POST['RunPhoneNo'];
			$register->RunICNum = $_POST['RunICNum'];
			$register->RunLicense = $_POST['RunLicense'];
			$register->RunAddress = $_POST['RunAddress'];
			$register->RunEmail = $_POST['RunEmail'];
			$register->RunPassword = $_POST['RunPassword'];
			$register->RunBankType = $_POST['RunBankType'];
			$register->RunAccNum= $_POST['RunAccNum'];
			if($register->addSPRunner()){
					$message = "Runner added into the system.";
	echo "<script type='text/javascript'>alert('$message');
	window.location = 'spManageRunner.php';</script>";
			}
	}

	//function to view product details
	function viewSpRunner($providerID){
		$viewRunner = new manageGoods();
		$viewRunner->providerID = $providerID;
		return $viewRunner->viewSpRunner();
	}

	//function for provider to remove the runner
	function deleteRunner(){
		$deleteRunner = new manageGoods();
		$deleteRunner->runnerID = $_POST['runnerID'];

		if($deleteRunner->deleteRunner()){
            $message = "Runner has been removed.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
	}

	//function to calculate courier
    function calculateCourier(){
        $calculationdata = new manageGoods();
        return $calculationdata->calculateCourier();
    }

		//function to view courier name
		function viewCourName($providerID){
			$viewspname = new manageGoods();
			$viewspname->providerID = $providerID;
			return $viewspname->viewCourName();
		}

		function getDistance($addressFrom, $addressTo){

		    // Google API key
		    $apiKey = 'AIzaSyBOTCwXFGhlIEkeD8JdUSBWyRGFSECnGKg';

		    // Change address format
		    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
		    $formattedAddrTo     = str_replace(' ', '+', $addressTo);

		    // Geocoding API request with start address
		    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
		    $outputFrom = json_decode($geocodeFrom);
		    if(!empty($outputFrom->error_message)){
		        return $outputFrom->error_message;
		    }

		    // Geocoding API request with end address
		    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
		    $outputTo = json_decode($geocodeTo);
		    if(!empty($outputTo->error_message)){
		        return $outputTo->error_message;
		    }

		    // Get latitude and longitude from the geodata
		    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
		    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
		    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
		    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

		    // Calculate distance between latitude and longitude
		    $theta    = $longitudeFrom - $longitudeTo;
		    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
		    $dist    = acos($dist);
		    $dist    = rad2deg($dist);
		    $miles    = $dist * 60 * 1.1515;

		    return round($miles * 1.609344, 2);
		}

		function selectOrderGoods($custID){
			$selectid = new manageGoods();
			$selectid->custID = $custID;
			return $selectid->selectOrderGoods();
		}

		function insertPrice($idnum){
				$insertprice = new manageGoods();
				list($value1,$value2) = explode('|', $_POST['pricenspid']);
				$insertprice->idnum = $idnum;
				$insertprice->spid = $value2;
				$insertprice->orderprice = $value1;

				return $insertprice->insertPrice();
		
		}

		//function to view order details
		function viewOrder($providerID){
			$vieworder = new manageGoods();
			$vieworder->providerID = $providerID;
			return $vieworder->viewOrder();
		}

		function viewassignedOrder($providerID){
			$vieworder = new manageGoods();
			$vieworder->providerID = $providerID;
			return $vieworder->viewassignedOrder();
		}

		function runnerAssign(){
				$assignrunner = new manageGoods();
				$assignrunner->idnum = $_POST['orderid'];
				$assignrunner->runnerid = $_POST['runner'];
				$assignrunner->spID = $_POST['spID'];

				if($assignrunner->runnerAssign()){
		echo "<script type='text/javascript'>window.location = 'spAssignOrder.php';</script>";
				}
		}

		function runnerName($R_ID){
			$runnername = new manageGoods();
			$runnername->runnerid = $R_ID;
			return $runnername->runnerName();
		}

}
?>
