<?php

require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/model/Registration Model.php';

class registrationController
{
	
    //Function Customer to Register
    function registerCustomer(){
        $register = new registrationModel();
        $register->role = 1;
        $register->CusName = $_POST['CusName'];
        $register->CusPhoneNo = $_POST['CusPhoneNo'];
        $register->CusAddress = $_POST['CusAddress'];
        $register->CusEmail = $_POST['CusEmail'];
        $register->CusPassword = $_POST['CusPassword'];
        if($register->addCustomer()){
            $message = "Successfully Registered. Please Login.";
		echo "<script type='text/javascript'>alert('$message');
		window.location = 'loginPage.php';</script>";
        }
    }

    //Function Runner to Register
    function registerRunner(){
        $register = new registrationModel();
        $register->role = 2;
        $register->RunName = $_POST['RunName'];
        $register->RunPhoneNo = $_POST['RunPhoneNo'];
        $register->RunICNum = $_POST['RunICNum'];
        $register->RunLicense = $_POST['RunLicense'];
        $register->RunAddress = $_POST['RunAddress'];
        $register->RunEmail = $_POST['RunEmail'];
        $register->RunPassword = $_POST['RunPassword'];
        $register->RunBankType = $_POST['RunBankType'];
        $register->RunAccNum= $_POST['RunAccNum'];
        if($register->addRunner()){
            $message = "Successfully Registered. Please Login.";
		echo "<script type='text/javascript'>alert('$message');
		window.location = 'loginPage.php';</script>";
        }
    }

    //Function Service Provider to Register
    function registerServiceProvider(){
        $register = new registrationModel();
        $register->role = 3;
        $register->SPType= $_POST['SPType'];
        $register->SPName = $_POST['SPName'];
        $register->SPBussRegNo = $_POST['SPBussRegNo'];
        $register->SPAddress = $_POST['SPAddress'];
        $register->SPPhoneNo = $_POST['SPPhoneNo'];
        $register->SPEmail = $_POST['SPEmail'];
        $register->SPPassword = $_POST['SPPassword'];
        $register->SPBankType = $_POST['SPBankType'];
        $register->SPAccNo = $_POST['SPAccNo'];
        if($register->addServiceProvider()){
            $message = "Successfully Registered. Please Login.";
		echo "<script type='text/javascript'>alert('$message');
		window.location = 'loginPage.php';</script>";
        }
    }

    //FUnction Customer to Login
    function loginCustomer(){
    	$login = new registrationModel();
    	return $login->loginCustomer();
        
    }

     //FUnction Runner to Login
    function loginRunner(){
        $login = new registrationModel();
        return $login->loginRunner();
        
    }

    //FUnction Service Provider to Login
    function loginServiceProvider(){
        $login = new registrationModel();
        return $login->loginServiceProvider();
        
    }

    //function for runner to view their account
    function viewDataRunner($runnerID){
        $viewDataUser = new registrationModel();
        $viewDataUser->runnerID = $runnerID;
        return $viewDataUser->viewDataRunner();
    }

    //function for provider to view their account
    function viewDataProvider($providerID){
        $viewDataUser = new registrationModel();
        $viewDataUser->providerID = $providerID;
        return $viewDataUser->viewDataProvider();
    }

    //function for customer to view their account
    function viewDataCustomer($custID){
        $viewDataUser = new registrationModel();
        $viewDataUser->custID = $custID;
        return $viewDataUser->viewDataCustomer();
    }

    //function for user to update account info
    function updateCust($custID){
        $updateCust = new registrationModel();
        $updateCust->customerID = $custID;
        $updateCust->CusName= $_POST['updateName'];
        $updateCust->CusPhoneNo = $_POST['updatePhoneNo'];
        $updateCust->CusAddress = $_POST['updateAddress'];
        $updateCust->CusEmail = $_POST['updateEmail'];
        $updateCust->CusPassword = $_POST['updatePassword'];
        if($updateCust->updateCust()){
            $message = "Your information updated";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'Account Interface.php';</script>";
        }
    }

    //function for user to update account info
    function updateRunner($runnerID){
        $updateRunner = new registrationModel();
        $updateRunner->runnerID = $runnerID;
        $updateRunner->RunPhoneNo = $_POST['updatePhoneNo'];
        $updateRunner->RunAddress= $_POST['updateAddress'];
        $updateRunner->RunEmail = $_POST['updateEmail'];
        $updateRunner->RunPassword = $_POST['updatePassword'];
        $updateRunner->RunBankType = $_POST['updateBank'];
        $updateRunner->RunAccNum = $_POST['updateAccount'];
        if($updateRunner->updateRunner()){
            $message = "Your information updated";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'Account Interface.php';</script>";
        }
    }

    //function for user to update account info
    function updateProvider($providerID){
        $updateProvider = new registrationModel();
        $updateProvider->providerID = $providerID;
        $updateProvider->SPName= $_POST['updateName'];
        $updateProvider->SPAddress = $_POST['updateAddress'];
        $updateProvider->SPPhoneNo = $_POST['updatePhoneNo'];
        $updateProvider->SPEmail = $_POST['updateEmail'];
        $updateProvider->SPPassword= $_POST['updatePassword'];
        $updateProvider->SPBankType = $_POST['updateBank'];
         $updateProvider->SPAccNo = $_POST['updateAccount'];
        if($updateProvider->updateProvider()){
            $message = "Your information updated";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'Account Interface.php';</script>";
        }
    }

    //function to view all product on customer mainpage
    function allproduct(){
        $allproduct = new registrationModel();
        return $allproduct->allproduct();
    }

    //function for runner to view notes 
    function mynotes($runnerID){
        $mynotes = new registrationModel();
        $mynotes->runnerID = $runnerID;
        return $mynotes->mynotes();
    }

    //function for admin to view total number of user
    function dataRunner(){
        $data = new registrationModel();
        return $data->dataRunner();
    }

    //function for admin to view total number of user
    function dataProvider(){
        $data = new registrationModel();
        return $data->dataProvider();
    }

    //function for admin to view total number of user
    function dataCustomer(){
        $data = new registrationModel();
        return $data->dataCustomer();
    }

}
?>