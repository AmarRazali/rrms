<?php

class registrationModel{

	public $CusName, $CusPhoneNo,$CusAddress, $CusEmail, $CusPassword,
           $RunName, $RunPhoneNo, $RunICNum, $Run_License, $RunAddress,$RunEmail, $RunPassword, $RunBankType, $RunAccNum,
           $SPType, $SPName, $SPBussRegNo, $SPAddress, $SPPhoneNo, $SPEmail, $SPPassword, $SPBankType, $SPAccNo ;

    //Function connection to database
    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=rrms', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    //Function adding Customer Data into database
    function addCustomer(){
        $sql = "insert into customer(Role_No,Cus_Name, Cus_PhoneNo, Cus_Address, Cus_Email, Cus_Password) values(:role, :CusName, :CusPhoneNo, :CusAddress, :CusEmail, :CusPassword)";
        $args = [':role'=>$this->role,':CusName'=>$this->CusName, ':CusPhoneNo'=>$this->CusPhoneNo, ':CusAddress'=>$this->CusAddress, ':CusEmail'=>$this->CusEmail, ':CusPassword'=>$this->CusPassword];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //Function adding Runner Data into database
    function addRunner(){
        $sql = "insert into runner(Role_No,Run_Name, Run_PhoneNo, Run_ICNum, Run_License, Run_Address, Run_Email, Run_Password, Run_BankType, Run_AccNum) values(:role, :RunName, :RunPhoneNo, :RunICNum, :RunLicense, :RunAddress, :RunEmail, :RunPassword, :RunBankType, :RunAccNum)";
        $args = [':role'=>$this->role,':RunName'=>$this->RunName, ':RunPhoneNo'=>$this->RunPhoneNo, ':RunICNum'=>$this->RunICNum, ':RunLicense'=>$this->RunLicense,':RunAddress'=>$this->RunAddress, ':RunEmail'=>$this->RunEmail, ':RunPassword'=>$this->RunPassword, ':RunBankType'=>$this->RunBankType, ':RunAccNum'=>$this->RunAccNum];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    function addFood(){
    	$sql = "insert into foodservices (ServiceP_ID, F_Name, F_Description, F_Price, F_Image) values (:providerID, :FName, :FDescription, :FPrice, :FImage)";
    	$args = [':providerID'=>$this->providerID, ':FName'=>$this->FName, ':FDescription'=>$this->FDescription, ':FPrice'=>$this->FPrice, ':FImage'=>$this->FImage];
    	$stmt = FoodServicesModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //Function adding Service Provider Data into database
    function addServiceProvider(){
        $sql = "insert into serviceprovider(Role_No,SP_Type, SP_Name, SP_BussRegNo, SP_Address, SP_PhoneNo, SP_Email, SP_Password, SP_BankType, SP_AccNo, SP_Image) values(:role, :SPType, :SPName, :SPBussRegNo, :SPAddress, :SPPhoneNo, :SPEmail, :SPPassword, :SPBankType, :SPAccNo, :SPLogo)";
        $args = [':role'=>$this->role,':SPType'=>$this->SPType, ':SPName'=>$this->SPName, ':SPBussRegNo'=>$this->SPBussRegNo, ':SPAddress'=>$this->SPAddress, ':SPPhoneNo'=>$this->SPPhoneNo, ':SPEmail'=>$this->SPEmail, ':SPPassword'=>$this->SPPassword, ':SPBankType'=>$this->SPBankType, 
            ':SPAccNo'=>$this->SPAccNo, ':SPLogo'=>$this->SPLogo];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //Function retrieve Customer Data for login
    function loginCustomer(){
        $sql = "select * from customer";
        return registrationModel::connect()->query($sql);;
    }

    //Function retrieve Runner Data for login
    function loginRunner(){
        $sql = "select * from runner";
        return registrationModel::connect()->query($sql);;
    }

    //Function retrieve Service Provider Data for login
    function loginServiceProvider(){
        $sql = "select * from serviceprovider";
        return registrationModel::connect()->query($sql);;
    }

    //function to view specific runner data
    function viewDataRunner(){
        $sql = "select * from runner where Runner_ID=:runnerID";
        $args = [':runnerID'=>$this->runnerID];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to view specific provider data
    function viewDataProvider(){
        $sql = "select * from serviceprovider where     ServiceP_ID=:providerID";
        $args = [':providerID'=>$this->providerID];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to view specific customer data 
    function viewDataCustomer(){
        $sql = "select * from customer where    Cus_ID=:custID";
        $args = [':custID'=>$this->custID];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to update customeraccount table
    function updateCust(){
        $sql = "update customer set Cus_Name=:CusName, Cus_PhoneNo=:CusPhoneNo, Cus_Address=:CusAddress, Cus_Email=:CusEmail, Cus_Password=:CusPassword where   Cus_ID=:customerID";
        $args = [':customerID'=>$this->customerID, ':CusName'=>$this->CusName, ':CusPhoneNo'=>$this->CusPhoneNo, ':CusAddress'=>$this->CusAddress, ':CusEmail'=>$this->CusEmail, ':CusPassword'=>$this->CusPassword];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to update runneraccount table
    function updateRunner(){
        $sql = "update runneraccount set Run_PhoneNo=:RunPhoneNo, Run_Address=:RunAddress, Run_Email=:RunEmail, Run_Password=:Run_Password, Run_BankType=:RunBankType, Run_AccNum=:RunAccNum where Runner_ID=:runnerID";
        $args = [':runnerID'=>$this->runnerID, ':RunPhoneNo'=>$this->RunPhoneNo, ':RunAddress'=>$this->RunAddress, ':RunEmail'=>$this->RunEmail, ':RunPassword'=>$this->RunPassword, ':RunBankType'=>$this->RunBankType, ':RunAccNum'=>$this->RunAccNum];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to update serviceprovideraccount table
    function updateProvider(){
        $sql = "update serviceprovider set SP_NAME=:SPName, SP_Address=:SPAddress, SP_PhoneNo=:SPPhoneNo, SP_Email=:SPEmail, SP_Password=:SPPassword, SP_BankType=:SPBankType, SP_AccNo=:SPAccNo where   ServiceP_ID=:providerID";
        $args = [':providerID'=>$this->providerID, ':SPName'=>$this->SPName, ':SPAddress'=>$this->SPAddress, ':SPPhoneNo'=>$this->SPPhoneNo, ':SPEmail'=>$this->SPEmail, ':SPPassword'=>$this->SPPassword, ':SPBankType'=>$this->SPBankType, ':SPAccNo'=>$this->SPAccNo];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //funcction to view all product data for customer
    function food(){
        $sql = "select * from foodservices";
        return registrationModel::connect()->query($sql);;
    }

    //function to view notes data for runner
    function mynotes(){
        $sql = "select * from notes where N_RunnerID=:runnerID";
        $args = [':runnerID'=>$this->runnerID];
        $stmt = registrationModel::connect()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    //function to view runner data for admin
    function dataRunner(){
        $sql = "select * from runner";
        return registrationModel::connect()->query($sql);;
    }

    //function to view provider data for admin
    function dataProvider(){
        $sql = "select * from serviceprovider";
        return registrationModel::connect()->query($sql);;
    }

    //function to view customer data for admin
    function dataCustomer(){
        $sql = "select * from customer";
        return registrationModel::connect()->query($sql);;
    }


}
?>