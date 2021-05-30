</<?php 


class FoodServicesModel {
	
	//function DB connection
    function connect()  
    {
        $pdo = new PDO('mysql:host=localhost;dbname=rrms', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    //function to insert product data
    function addFood(){
    	$sql = "insert into foodservices (ServiceP_ID, F_Name, F_Description, F_Price, F_Image) values (:providerID, :FName, :FDescription, :FPrice, :FImage)";
    	$args = [':providerID'=>$this->providerID, ':FName'=>$this->FName, ':FDescription'=>$this->FDescription, ':FPrice'=>$this->FPrice, ':FImage'=>$this->FImage];
    	$stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

     //function to view product details for provider
    function viewFoodDetails(){
    	$sql = "select * from foodservices where ServiceP_ID=:providerID";
    	$args = [':providerID'=>$this->providerID];
    	$stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to update product data for provider
    function updateFood(){
        $sql = "update foodservices set F_Name=:FName, F_Description=:FDescription, F_Price=:FPrice where Food_ID=:FoodID";
        $args = [':FoodID'=>$this->FoodID, ':FName'=>$this->FName, ':FDescription'=>$this->FDescription, ':FPrice'=>$this->FPrice];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to delete product from system
    function deleteFood(){
        $sql = "delete from foodservices where Food_ID=:FoodID";
        $args = [':FoodID'=>$this->FoodID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to view all restaurant data for customer 
    function allRestaurant(){
        $sql = "select * from serviceprovider where SP_Type='Food'";
        return FoodServicesModel::connect()->query($sql);;
    }

    //function to view all product data for customer 
   function allFoodbyRestaurant(){
        $sql = "SELECT * FROM foodservices WHERE ServiceP_ID=:ServicePID";
        $args = [':ServicePID'=>$this->ServicePID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //fucntion to view foodID on cart
    function viewfoodID(){
        $sql = "SELECT * FROM cartfood WHERE OrderF_ID=:orderfID";
        $args = [':orderfID'=>$this->orderfID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
    
    //fucntion to view details data on product
    function foodDetails(){
        $sql = "select * from foodservices where Food_ID=:FoodID";
        $args = [':FoodID'=>$this->FoodID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to view cart data
    function viewCart(){
        $sql = "SELECT EXISTS(SELECT * FROM orderfood WHERE Cus_ID=:CusID AND OF_Status='Check Out')" ;
        $args = [':CusID'=>$this->CusID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        $result = $stmt->fetchColumn();
        return $result;
    }

    //fucntion to create cart
    function createCart(){
        $sql = "INSERT INTO orderfood(Cus_ID, ServiceP_ID) values (:custID, :providerID)";
        $args = [':custID'=>$this->cusID, ':providerID'=>$this->providerID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to get forderid
    function getCart(){
        $sql = "SELECT OrderF_ID FROM orderfood WHERE Cus_ID=:CusID AND OF_Status='Check Out'" ;
        $args = [':CusID'=>$this->CusID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        $orderfid = $stmt->fetchColumn();
        return $orderfid;
    }

    //fucntion to check food in cart
    function checkCart(){
        $sql = "SELECT EXISTS(SELECT * FROM cartfood WHERE OrderF_ID=:orderfID AND Food_ID=:food_ID)";
        $args = [':orderfID'=>$this->orderfID, ':food_ID'=>$this->food_ID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        $emptycart = $stmt->fetchColumn();
        return $emptycart;
    }

    //fucntion to add food cart
    function addCart(){
        $sql = "INSERT INTO cartfood(OrderF_ID, Food_ID, OF_Quantity) values (:orderfID, :food_ID, '1')";
        $args = [':orderfID'=>$this->orderfID, ':food_ID'=>$this->food_ID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //fucntion to update food cart
    function updateCart(){
        $sql = "UPDATE cartfood SET OF_Quantity = OF_Quantity +1 WHERE OrderF_ID=:orderfID AND Food_ID=:food_ID";
        $args = [':orderfID'=>$this->orderfID, ':food_ID'=>$this->food_ID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //fucntion to add food cart
    function updatetotalP(){
        $sql = "UPDATE orderfood SET OF_TotalPrice=:totalprice WHERE OrderF_ID=:orderfID";
        $args = [':totalprice'=>$this->totalprice, ':orderfID'=>$this->orderfID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //fucntion to add food cart
    function updateQuan(){
        $sql = "UPDATE cartfood SET OF_Quantity=:quantity WHERE Cart_ID=:cartID";
        $args = [':quantity'=>$this->quantity, ':cartID'=>$this->cartID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //delete item from food cart
    function deleteCart(){
        $sql = "DELETE FROM cartfood WHERE Cart_ID=:cartID";
        $args = [':cartID'=>$this->cartID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to view customer order in service provider
    function viewManageOrder(){
        $sql = "select * from orderdetails 
        inner join serviceprovider 
        inner join tracking 
        inner join customer 
        inner join paymentorder
        on orderdetails.Cus_ID = customer.Cus_ID and 
        tracking.Order_ID = orderdetails.Order_ID and 
        tracking.ServiceP_ID = serviceprovider.ServiceP_ID AND
        paymentorder.Cus_ID = customer.Cus_ID AND
        paymentorder.Order_ID = orderdetails.Order_ID AND
        orderdetails.ServiceP_ID = serviceprovider.ServiceP_ID
        where serviceprovider.ServiceP_ID=:providerID";

        $args = [':providerID'=>$this->providerID];
        $stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }

    //function to update ready to delivery by service provider
    function updateManageOrder(){

            $sql = "UPDATE orderdetails set ready=:Ready where Order_ID=:OrderID";
            $args = [':OrderID'=>$this->OrderID, ':Ready'=>$this->Ready];
            $stmt = FoodServicesModel::connect()->prepare($sql);
            $stmt->execute($args);
            

            $sq2 = "UPDATE tracking set Assignation=:assignation where Tracking_ID=:TrackingID";
            $args2 = [':TrackingID'=>$this->TrackingID, ':assignation'=>$this->assignation];
            $stmt2 = FoodServicesModel::connect()->prepare($sq2);
            $stmt2->execute($args2);

            return $stmt;
        }

            
            


}

?>