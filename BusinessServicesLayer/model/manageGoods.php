</<?php


class manageGoods {

	//function DB connection
  function connect()
  {
      $pdo = new PDO('mysql:host=localhost;dbname=rrms', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
  }

    //function to insert delivery data
    function placeDelivery(){
      $sql = "insert into ordergoods (Cus_ID, OG_PickUpAdd, OG_DeliveryAdd, OG_recipient, OG_recipientPhoneNum, OG_itemType, OG_RunnerType, OG_itemSize, OG_itemWeight, OG_DeliveryDate, OG_ReceiveDate) values (:customerID, :pickupLoc, :dropoffLoc, :recepientname, :recipientpn, :itemtype, :preferreddelivery, :itemsize, :itemweight, :deliverdate, :receivedate)";
      $args = [':customerID'=>$this->customerID, ':pickupLoc'=>$this->pickupLoc, ':dropoffLoc'=>$this->dropoffLoc, ':recepientname'=>$this->recepientname, ':recipientpn'=>$this->recipientpn, ':itemtype'=>$this->itemtype, ':preferreddelivery'=>$this->preferreddelivery, ':itemsize'=>$this->itemsize, ':itemweight'=>$this->itemweight,
      ':deliverdate'=>$this->deliverdate, ':receivedate'=>$this->receivedate];
      $stmt = manageGoods::connect()->prepare($sql);
      $stmt->execute($args);
      return $stmt;
    }

    //function to insert and update delivery cost data
    function setDeliveryCost(){
     // $sql = "insert into goodsservices (ServiceP_ID, G_DistanceCost, G_WeightCost) values (:providerID, :costdistance, :weightcost) on duplicate key update G_DistanceCost=:costdistance, G_WeightCost=:weightcost";
      $sql = "UPDATE goodsservices
                SET G_DistanceCost=:costdistance, G_WeightCost=:weightcost
                WHERE ServiceP_ID=:providerID";
    	$args = [':providerID'=>$this->providerID, ':costdistance'=>$this->costdistance, ':weightcost'=>$this->weightcost];
      $stmt = manageGoods::connect()->prepare($sql);
      $stmt->execute($args);
      return $stmt;
    }

     //function to view delivery cost for provider
    function viewDeliveryCost(){
    	$sql = "select * from goodsservices where ServiceP_ID=:providerID";
    	$args = [':providerID'=>$this->providerID];
    	$stmt = manageGoods::connect()->prepare($sql);
      $stmt->execute($args);
      return $stmt;
    }

    function addSPRunner(){
        $sql = "insert into runner(ServiceP_ID,Role_No,Run_Name, Run_PhoneNo, Run_ICNum, Run_License, Run_Address, Run_Email, Run_Password, Run_BankType, Run_AccNum) values(:spid, :role, :RunName, :RunPhoneNo, :RunICNum, :RunLicense, :RunAddress, :RunEmail, :RunPassword, :RunBankType, :RunAccNum)";
        $args = [':spid'=>$this->spid,':role'=>$this->role,':RunName'=>$this->RunName, ':RunPhoneNo'=>$this->RunPhoneNo, ':RunICNum'=>$this->RunICNum, ':RunLicense'=>$this->RunLicense,':RunAddress'=>$this->RunAddress, ':RunEmail'=>$this->RunEmail, ':RunPassword'=>$this->RunPassword, ':RunBankType'=>$this->RunBankType, ':RunAccNum'=>$this->RunAccNum];
        $stmt = manageGoods::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to view product details for provider
   function viewSpRunner(){
     $sql = "select * from runner where ServiceP_ID=:providerID";
     $args = [':providerID'=>$this->providerID];
     $stmt = manageGoods::connect()->prepare($sql);
       $stmt->execute($args);
       return $stmt;
   }

   //function to remove runner from system
   function deleteRunner(){
       $sql = "delete from runner where Runner_ID=:runnerID";
       $args = [':runnerID'=>$this->runnerID];
       $stmt = manageGoods::connect()->prepare($sql);
       $stmt->execute($args);
       return $stmt;
   }

//function to calculate courier
   function calculateCourier(){
        $sql = "select * from goodsservices";
        return manageGoods::connect()->query($sql);;
    }

    function viewCourName(){
      $sql = "select * from serviceprovider where ServiceP_ID=:providerID";
      $args = [':providerID'=>$this->providerID];
      $stmt = manageGoods::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to select order id
   function selectOrderGoods(){
     $sql = "select max(OrderG_ID) from ordergoods where Cus_ID=:custID";
     $args = [':custID'=>$this->custID];
     $stmt = manageGoods::connect()->prepare($sql);
     $stmt->execute($args);
     $stmt = $stmt->fetchColumn();
     return $stmt;
   }

   //function to update price into order id
   function insertPrice(){
     $sql = "update ordergoods set OG_Price=:orderprice, ServiceP_ID=:spid where OrderG_ID=:idnum";
     $args = [':orderprice'=>$this->orderprice, ':idnum'=>$this->idnum, ':spid'=>$this->spid];
     $stmt = manageGoods::connect()->prepare($sql);
     $stmt->execute($args);
     return $stmt;
   }

   //function to view order for provider
  function viewOrder(){
    $sql = "select * from ordergoods where ServiceP_ID=:providerID and status='Paid' and R_ID is null";
    $args = [':providerID'=>$this->providerID];
    $stmt = manageGoods::connect()->prepare($sql);
      $stmt->execute($args);
      return $stmt;
  }

  function viewassignedOrder(){
    $sql = "select * from ordergoods where ServiceP_ID=:providerID and R_ID is not null";
    $args = [':providerID'=>$this->providerID];
    $stmt = manageGoods::connect()->prepare($sql);
      $stmt->execute($args);
      return $stmt;
  }

  //function to assign order to runner
  function runnerAssign(){
    $sql = "update ordergoods set R_ID=:runnerid where OrderG_ID=:idnum";
    $args = [':runnerid'=>$this->runnerid, ':idnum'=>$this->idnum];
    $stmt = manageGoods::connect()->prepare($sql);
    $stmt->execute($args);

    $sql2 = "update tracking set Assignation='Ready' where ServiceP_ID=:spID";
    $args2 = [':spID'=>$this->spID];
    $stmt2 = manageGoods::connect()->prepare($sql2);
    $stmt2->execute($args2);

    return $stmt;



  }

  function runnerName(){
    $sql = "select Run_Name from runner where Runner_ID=:runnerid";
    $args = [':runnerid'=>$this->runnerid];
    $stmt = manageGoods::connect()->prepare($sql);
    $stmt->execute($args);
    $stmt = $stmt->fetchColumn();
    return $stmt;
  }

}

?>
