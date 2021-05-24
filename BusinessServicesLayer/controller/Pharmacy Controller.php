<?php 

require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/model/PharmacyServices.php';

class PharmacyController{

	//function to add product
	function addItem($ItemImage){
		$addItem = new PharmacyServicesModel();
		$addItem->providerID = $_POST['providerID'];
		$addItem->IName= $_POST['IName'];
		$addItem->IDescription = $_POST['IDescription'];
		$addItem->IPrice = $_POST['IPrice'];
		$addItem->IImage = $ItemImage;
		
		if($addItem->addItem()){
            $message = "Your product has been registered";
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
	}

	//function to view product details
	function viewItemDetails($providerID){
		$viewItem = new PharmacyServicesModel();
		$viewItem->providerID = $providerID;
		return $viewItem->viewItemDetails();
	}

	//function for provider to update their product
	function updateItem(){
		$updateItem = new PharmacyServicesModel();
		$updateItem->ItemID = $_POST['ItemID'];
		$updateItem->IName = $_POST['IName'];
		$updateItem->IDescription = $_POST['IDescription'];
		$updateItem->IPrice= $_POST['IPrice'];



		if($updateItem->updateItem()){
			$message = "Successfully updated";
            echo  "<script type='text/javascript'>alert('$message');</script>";
        }
	}

	//function for provider to delete their product
	function deleteItem(){
		$deleteItem = new PharmacyServicesModel();
		$deleteItem->ItemID = $_POST['ItemID'];
		
		if($deleteItem->deleteItem()){
            $message = "Successfully deleted";
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
	}

	//function to view all product on customer mainpage
    function allItem(){
        $allItem = new PharmacyServicesModel();
        return $allItem->allItem();
    }


	//function to view details on product
	function ItemDetails($ItemID){
		$ItemDetails = new PharmacyServicesModel();
		$ItemDetails->ItemID = $ItemID;
		return $ItemDetails->ItemDetails();
	}

	//function to view processed product
	//function checkoutData($ItemID){
	//	$checkoutData = new paymentModel();
	//	$checkoutData->ItemID= $ItemID;
	//	return $checkoutData->checkoutData();
	//}


}
?>