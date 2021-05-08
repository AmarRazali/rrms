<?php
class petModel{
    public $petgroom_id,$name,$details,$quantity,$price,$image;
    
    function connect()  
    {
        $pdo = new PDO('mysql:host=localhost;dbname=rrms', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function allPet(){
        $sql = "select * from petservices";
        return petModel::connect()->query($sql);;
    }

    function petDetails(){
        $sql = "select * from petservices where ServiceP_ID=:providerID";
        $args = [':providerID'=>$this->providerID];
        $stmt = petModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function myBookings(){
        $sql = "select * from orderpetassist where Cus_ID=:customerID";
        $args = [':customerID'=>$this->customerID];
        $stmt = petModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

   function updateServiceDetails(){
        $sql = "update petservices set P_Name=:PName, P_Description=:PDescription, P_Price=:PPrice, A_Pets=:APets, A_PetSize=:APetSize, Days=:Days, P_Image=:PImage where  ServiceP_ID=:providerID";
        $args = [':providerID'=>$this->providerID, ':PName'=>$this->PName, ':PDescription'=>$this->PDescription, ':PPrice'=>$this->PPrice, ':APets'=>$this->APets, ':APetSize'=>$this->APetSize, ':Days'=>$this->Days, ':PImage'=>$this->PImage];
        $stmt = petModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }


     function addPet(){
        $sql = "insert into petservices (ServiceP_ID, P_Name, P_Description, P_Price, P_Image) values (:providerID, :PName, :PDescription, :PPrice, :PImage)";
        $args = [':providerID'=>$this->providerID, ':PName'=>$this->PName, ':PDescription'=>$this->PDescription, ':PPrice'=>$this->PPrice, ':PImage'=>$this->PImage];
        $stmt = petModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function makeBooking(){
        $sql = "insert into orderpetassist (Cus_ID, ServiceP_ID, OPA_Dropoff, OPA_Pickup, OPA_TimeStart, OPA_TimeEnd, NumOfPets, Breed, Pet_Image) values (:customerID, :ServiceP_ID, :Pdate, :Rdate, :PTime, :RTime, :Numpets, :Breed, :PetImage)";
        $args = [':customerID'=>$this->customerID, ':ServiceP_ID'=>$this->ServiceP_ID, ':Pdate'=>$this->Pdate, ':Rdate'=>$this->Rdate, ':PTime'=>$this->PTime, ':RTime'=>$this->RTime, 'Numpets'=>$this->Numpets, 'Breed'=>$this->Breed, 'PetImage'=>$this->PetImage];
        $stmt = petModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }  
    
}
?>