<?php 


class PharmacyServicesModel {
    
    //function DB connection
    function connect()  
    {
        $pdo = new PDO('mysql:host=localhost;dbname=rrms', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    //function to view all service provider data 
    function providerlist(){
        $sql = "select * from serviceprovideraccount where SP_POSTCODE=:area";
        $args = [':area'=>$this->area];
        $stmt = PharmacyServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to insert product data
    function addItem(){
        $sql = "insert into pharmacyservices(ServiceP_ID,I_Name,I_Description,I_Price,I_Image) values (:providerID, :I_Name, :IDescription,  :IPrice, :IImage)";
        $args = [ ':providerID'=>$this->providerID, ':I_Name'=>$this->IName, ':IDescription'=>$this->IDescription, ':IPrice'=>$this->IPrice, ':IImage'=>$this->IImage];
        $stmt = PharmacyServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }



    //function to view product details for provider
    function viewItemDetails(){
        $sql = "select * from pharmacyservices where ServiceP_ID=:providerID";
        $args = [':providerID'=>$this->providerID];
        $stmt = PharmacyServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to update product data for provider
    function updateItem(){
        $sql = "update pharmacyservices set I_Name=:I_Name, I_Description=:I_Description, I_Price=:I_Price where Item_ID=:I_ID";
        $args = [ ':I_Name'=>$this->IName, ':I_Description'=>$this->IDescription, ':I_Price'=>$this->IPrice, ':I_ID'=>$this->ItemID];
        $stmt = PharmacyServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;



    }


    //function to delete product from system
    function deleteItem(){
        $sql = "delete from pharmacyservices where Item_ID=:Item_ID";
        $args = [':Item_ID'=>$this->ItemID];
        $stmt = PharmacyServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to view all product data for customer 
    function allItem(){
        $sql = "select * from pharmacyservices";
        return PharmacyServicesModel::connect()->query($sql);;
      
    }

   //fucntion to view details data on product
   function ItemDetails(){
    $sql = "select * from pharmacyservices where Item_ID=:Item_ID";
    $args = [':Item_ID'=>$this->Item_ID];
    $stmt = PharmacyServicesModel::connect()->prepare($sql);
    $stmt->execute($args);
    return $stmt;}
}

   
?>