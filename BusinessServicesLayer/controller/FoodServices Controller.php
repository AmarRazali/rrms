<?php 

require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/model/FoodServices.php';

class foodServicesController{

	//function to add product
	function addFood($foodImage){
		$addFood = new FoodServicesModel();
		$addFood->providerID = $_POST['providerID'];
		$addFood->FName= $_POST['FName'];
		$addFood->FDescription = $_POST['FDescription'];
		$addFood->FPrice = $_POST['FPrice'];
		$addFood->FImage = $foodImage;
		
		if($addFood->addFood()){
            $message = "Your Food has been registered";
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
	}

	//function to view product details
	function viewFoodDetails($providerID){
		$viewFood = new FoodServicesModel();
		$viewFood->providerID = $providerID;
		return $viewFood->viewFoodDetails();
	}

	//function for provider to update their product
	function updateFood(){
		$updateFood = new FoodServicesModel();
		$updateFood->FoodID = $_POST['FoodID'];
		$updateFood->FName = $_POST['FName'];
		$updateFood->FDescription = $_POST['FDescription'];
		$updateFood->FPrice= $_POST['FPrice'];

		if($updateFood->updateFood()){
			$message = "Update Success";
            echo  "<script type='text/javascript'>alert('$message');</script>";
        }
	}

	//function for provider to delete their product
	function deleteFood(){
		$deleteFood = new FoodServicesModel();
		$deleteFood->FoodID = $_POST['FoodID'];
		
		if($deleteFood->deleteFood()){
            $message = "Your product has been deleted";
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
	}

	//function to view restaurant list on customer mainpage
	function allRestaurant){
		$allRestaurant = new FoodServicesModel();
		return $allRestaurant->allRestaurant();
	}

	//function to view all product on customer mainpage
    function allFood(){
        $allFood = new FoodServicesModel();
        return $allFood->allFood();
    }

	//function to view details on product
	function foodDetails($FoodID){
		$foodDetails = new FoodServicesModel();
		$foodDetails->FoodID = $FoodID;
		return $foodDetails->foodDetails();
	}

	//function to view customer order in service provider
	function viewManageOrder($providerID){
        $viewManage = new FoodServicesModel();
        $viewManage->providerID = $providerID;
        return $viewManage->viewManageOrder();
    }

    //function to update ready to delivery
    function updateManageOrder(){
        $updateManageOrder = new FoodServicesModel();
        $updateManageOrder->OrderID  = $_POST['OrderID'];
		$updateManageOrder->Ready= $_POST['Ready'];
		$updateManageOrder->TrackingID  = $_POST['TrackingID'];
		$updateManageOrder->assignation= $_POST['assignation'];
        
        if($updateManageOrder->updateManageOrder()){
            $message = "The current Status Successfully Updated!";
			echo "<script type='text/javascript'>alert('$message');
			</script>";
        }
    }


}
?>