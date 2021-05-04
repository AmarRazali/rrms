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

    //function to view all product data for customer 
   function allFood(){
        $sql = "select * from foodservices";
        return FoodServicesModel::connect()->query($sql);;
    }

    //fucntion to view details data on product
    function foodDetails(){
        $sql = "select * from foodservices where Food_ID=:FoodID";
        $args = [':FoodID'=>$this->FoodID];
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