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
	function allRestaurant(){
		$allRestaurant = new FoodServicesModel();
		return $allRestaurant->allRestaurant();
	}

	//function to view all product on customer mainpage
    function allFoodbyRestaurant($ServiceP_ID){
        $allFood = new FoodServicesModel();
		$allFood->ServicePID = $ServiceP_ID;
        return $allFood->allFoodbyRestaurant();
    }

	//function to view foodID on cart
	function viewfoodID($orderfid){
		$viewfoodID = new FoodServicesModel();
		$viewfoodID->orderfID = $orderfid;
		return $viewfoodID->viewfoodID();
	}
	
	//function to view details on product
	function foodDetails($FoodID){
		$foodDetails = new FoodServicesModel();
		$foodDetails->FoodID = $FoodID;
		return $foodDetails->foodDetails();
	}

	//function to view cart 
	function viewCart($CusID){
		$viewCart = new FoodServicesModel();
		$viewCart->CusID = $CusID;
		return $viewCart->viewCart();
	}	

	//function to add cart
	function createCart(){
		$createCart = new FoodServicesModel();
		$createCart->cusID = $_POST['cusID'];
		$createCart->providerID=$_POST['spID'];
		$createCart->createCart();
	}

	//function to get orferf id
	function getCart($CusID){
		$getCart = new FoodServicesModel();
		$getCart->CusID = $CusID;
		return $getCart->getCart();
		}	

	//function to check item in cart
	function checkCart($orderfid){
		$checkCart = new FoodServicesModel();
		$checkCart->orderfID = $orderfid;
		$checkCart->food_ID=$_POST['Food_ID'];
		return $checkCart->checkCart();
	}

	//function to add food into cart
	function addCart($orderfid){
		$addCart = new FoodServicesModel();
		$addCart->orderfID = $orderfid;
		$addCart->food_ID=$_POST['Food_ID'];
		$addCart->addCart();
	}

	//function to update food into cart
	function updateCart($orderfid){
		$updateCart = new FoodServicesModel();
		$updateCart->orderfID = $orderfid;
		$updateCart->food_ID=$_POST['Food_ID'];
		$updateCart->updateCart();
	}

	//update item quantity
	function updateQuan($quantity,$cartID){
		$updateQuan = new FoodServicesModel();
		$updateQuan->quantity = $quantity;
		$updateQuan->cartID = $cartID;
		$updateQuan->updateQuan();
	}

	//delete item from cart
	function deleteCart($cartID){
		$deleteCart = new FoodServicesModel();
		$deleteCart->cartID = $cartID;
		$deleteCart->deleteCart();
	}

	//update cart total price
	function updatetotalP($totalprice,$orderfid){
		$updatetotalP = new FoodServicesModel();
		$updatetotalP->totalprice = $totalprice;
		$updatetotalP->orderfID = $orderfid;
		$updatetotalP->updatetotalP();
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