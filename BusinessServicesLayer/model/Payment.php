<?php 

class paymentModel {

//function to insert successfull payment into receipt table

    function connect()  
    {
        $pdo = new PDO('mysql:host=localhost;dbname=rrms', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    


    function viewOrderDetail(){
        $sql = "select * from orderdetails where Cus_ID=:CusID AND OD_Status='Check Out'";
        $args = [':CusID'=>$this->cusID];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }



    function viewMyOrderDetail(){
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
        where customer.Cus_ID=:CusID";

        $args = [':CusID'=>$this->Cus_ID];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }

    function viewReceipt(){
        $sql = "select * from orderdetails 
        inner join serviceprovider 
        inner join customer 
        inner join paymentorder
        on orderdetails.Cus_ID = customer.Cus_ID and 
        paymentorder.Cus_ID = customer.Cus_ID AND
        paymentorder.Order_ID = orderdetails.Order_ID AND
        orderdetails.ServiceP_ID = serviceprovider.ServiceP_ID
        where paymentorder.Payment_ID=:paymentID";

        $args = [':paymentID'=>$this->Payment_ID];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

        	
	function viewReceipt($cusID,$Payment_ID, $Order_ID, $ServiceP_ID){
		$viewReceipt = new paymentModel();
		$viewReceipt->cusID = $cusID;
		$viewReceipt->Payment_ID = $Payment_ID;
		$viewReceipt->Order_ID = $Order_ID;
		$viewReceipt->ServiceP_ID = $ServiceP_ID;
		return $viewOrderDetail->viewMyOrderDetail();
	}


    }

    function addTracking(){
	
        $sql = "insert into tracking(Cus_ID, ServiceP_ID, Order_ID) values (:custID, :providerID, :Order_ID)";
        $args = [':custID'=>$this->cusID,':providerID'=>$this->ServiceP_ID, ':Order_ID'=>$this->orderID];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);

        return $stmt;
        
	
	}

    function addFoodOrder(){
        $sql = "UPDATE orderfood SET OF_Date=:OF_Date, OF_DeliveryAdd=:OF_DeliveryAdd WHERE OrderF_ID=:OrderF_ID";
        $args = [':OF_DeliveryAdd'=>$this->cusAdd, ':OF_Date'=>$this->OF_Date, ':OrderF_ID'=>$this->OrderF_ID];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);

        $sql2= "INSERT INTO orderdetails (OrderF_ID, Cus_ID, ServiceP_ID, OD_Details, OD_TotalPrice, DeliveryAddress) SELECT OrderF_ID, Cus_ID, ServiceP_ID, OF_Details, OF_TotalPrice, OF_DeliveryAdd FROM orderfood WHERE OrderF_ID=:OrderF_ID AND OF_Status='Check Out'";
        $args2 = [':OrderF_ID'=>$this->OrderF_ID];
        $stmt2 = paymentModel::connect()->prepare($sql2);
        $stmt2->execute($args2);
    }

    function addPharOrder(){
        $sql = "insert into orderpharmacy(Cus_ID, I_ID, ServiceP_ID, OP_Details, OP_TotalPrice, OP_DeliveryAdd) values (:custID, :I_ID, :ServiceP_ID, :OP_Details, :OP_TotalPrice, :OP_DeliveryAdd)";
        $args = [':custID'=>$this->CusID, ':I_ID'=>$this->Item_ID,':ServiceP_ID'=>$this->ServiceP_ID, ':OP_Details'=>$this->OP_Details,  ':OP_TotalPrice'=>$this->totalPrice, ':OP_DeliveryAdd'=>$this->cusAdd];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);

        $sql2= "INSERT INTO orderdetails (OrderP_ID, Cus_ID, ServiceP_ID, OD_TotalPrice, DeliveryAddress, OD_Details)
        SELECT OrderP_ID, Cus_ID, ServiceP_ID, OP_TotalPrice, OP_DeliveryAdd, OP_Details
        FROM orderpharmacy
        WHERE I_ID=:I_ID AND status='Check Out' ";

        $args2 = [':I_ID'=>$this->Item_ID];
        $stmt2 = paymentModel::connect()->prepare($sql2);
        $stmt2->execute($args2);

        return $stmt;
        
    }

    function addGoodsOrder(){
 
        $sql2= "INSERT INTO orderdetails (OrderG_ID, Cus_ID, ServiceP_ID, OD_TotalPrice, DeliveryAddress, OD_Details, ready) values (:OrderG_ID, :Cus_ID, :ServiceP_ID, :OD_TotalPrice, :DeliveryAddress, :OD_Details, 'Ready')";
        $args2 = [':OrderG_ID'=>$this->OrderG_ID,':Cus_ID'=>$this->Cus_ID, ':ServiceP_ID'=>$this->ServiceP_ID, ':OD_TotalPrice'=>$this->OG_Price ,':DeliveryAddress'=>$this->Address , ':OD_Details'=>$this->OF_Details];
        $stmt2 = paymentModel::connect()->prepare($sql2);
        $stmt2->execute($args2);
        return $stmt2;
        
    }
    
    function viewGoodsDetails(){
        $sql = "select * from ordergoods where OrderG_ID=:idnum";
        $args = [':idnum'=>$this->idnum];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;

    }

    function addPaymentF(){
        $sql = "insert into paymentorder(Cus_ID, Order_ID, ServiceP_ID, Payment_Amount, Payment_Status) values (:custID, :Order_ID, :ServiceP_ID, :Payment_Amount, 'Success')";
        $args = [':custID'=>$this->cusID, ':Order_ID'=>$this->orderID,':ServiceP_ID'=>$this->ServiceP_ID,':Payment_Amount'=>$this->totalPrice];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);

        $sql2= "UPDATE orderdetails  set OD_Status='Paid' WHERE Order_ID=:Order_ID";  
        $args2 = [':Order_ID'=>$this->orderID];
        $stmt2 = paymentModel::connect()->prepare($sql2);
        $stmt2->execute($args2);

        $sql3= "UPDATE orderfood 
                SET orderfood.OF_Status='Paid' 
                WHERE orderfood.OrderF_ID= (select orderfood.OrderF_ID from orderfood INNER JOIN orderdetails on orderdetails.OrderF_ID = orderfood.OrderF_ID
                WHERE orderdetails.Order_ID=:Order_ID)";  
        $args3 = [':Order_ID'=>$this->orderID];
        $stmt3 = paymentModel::connect()->prepare($sql3);
        $stmt3->execute($args3);


        return $stmt;
    }

    function addPaymentP(){
        $sql = "insert into paymentorder(Cus_ID, Order_ID, ServiceP_ID, Payment_Amount, Payment_Status) values (:custID, :Order_ID, :ServiceP_ID, :Payment_Amount, 'Success')";
        $args = [':custID'=>$this->cusID, ':Order_ID'=>$this->orderID,':ServiceP_ID'=>$this->ServiceP_ID,':Payment_Amount'=>$this->totalPrice];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);

        $sql2= "UPDATE orderdetails  set OD_Status='Paid' WHERE Order_ID=:Order_ID";  
        $args2 = [':Order_ID'=>$this->orderID];
        $stmt2 = paymentModel::connect()->prepare($sql2);
        $stmt2->execute($args2);

        $sql3= "UPDATE orderpharmacy 
                SET orderpharmacy.status='Paid' 
                WHERE orderpharmacy.OrderP_ID= (select  orderpharmacy.OrderP_ID from orderpharmacy INNER JOIN orderdetails on orderdetails.OrderP_ID = orderpharmacy.OrderP_ID
                WHERE orderdetails.Order_ID=':Order_ID')";  
        $args3 = [':Order_ID'=>$this->orderID];
        $stmt3 = paymentModel::connect()->prepare($sql3);
        $stmt3->execute($args3);


        return $stmt;
    }

    function addPaymentG(){
        $sql = "insert into paymentorder(Cus_ID, Order_ID, ServiceP_ID, Payment_Amount, Payment_Status) values (:custID, :Order_ID, :ServiceP_ID, :Payment_Amount, 'Success')";
        $args = [':custID'=>$this->cusID, ':Order_ID'=>$this->orderID,':ServiceP_ID'=>$this->ServiceP_ID,':Payment_Amount'=>$this->totalPrice];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);

        $sql2= "UPDATE orderdetails  set OD_Status='Paid' WHERE Order_ID=:Order_ID";  
        $args2 = [':Order_ID'=>$this->orderID];
        $stmt2 = paymentModel::connect()->prepare($sql2);
        $stmt2->execute($args2);

        $sql3= "UPDATE ordergoods 
                SET ordergoods.status='Paid' 
                WHERE ordergoods.OrderG_ID= (select ordergoods.OrderG_ID from ordergoods INNER JOIN orderdetails on orderdetails.OrderG_ID = ordergoods.OrderG_ID
                WHERE orderdetails.Order_ID=:Order_ID)";  
        $args3 = [':Order_ID'=>$this->orderID];
        $stmt3 = paymentModel::connect()->prepare($sql3);
        $stmt3->execute($args3);


        return $stmt;
    }

    function addPaymentPA(){
        $sql = "insert into paymentorder(Cus_ID, Order_ID, ServiceP_ID, Payment_Amount, Payment_Status) values (:custID, :Order_ID, :ServiceP_ID, :Payment_Amount, 'Success')";
        $args = [':custID'=>$this->cusID, ':Order_ID'=>$this->orderID,':ServiceP_ID'=>$this->ServiceP_ID,':Payment_Amount'=>$this->totalPrice];
        $stmt = paymentModel::connect()->prepare($sql);
        $stmt->execute($args);

        $sql2= "UPDATE orderdetails  set OD_Status='Paid' WHERE Order_ID=:Order_ID";  
        $args2 = [':Order_ID'=>$this->orderID];
        $stmt2 = paymentModel::connect()->prepare($sql2);
        $stmt2->execute($args2);

        $sql3= "UPDATE orderpetassist 
                SET orderpetassist.status='Paid' 
                WHERE orderpetassist.OrderPA_ID= (select orderpetassist.OrderPA_ID from orderpetassist INNER JOIN orderdetails on orderdetails.OrderPA_ID = orderpetassist.OrderPA_ID
                WHERE orderdetails.Order_ID=:Order_ID)";  
        $args3 = [':Order_ID'=>$this->orderID];
        $stmt3 = paymentModel::connect()->prepare($sql3);
        $stmt3->execute($args3);


        return $stmt;
    }

   
}

?>