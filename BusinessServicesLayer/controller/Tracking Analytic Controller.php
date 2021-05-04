<?php

require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/model/Tracking Analytic Model.php';

class trackingAnalyticController
{   

    //Tracking Phase
	//Function to retrieve tracking data based on Runner ID
    //Code Okay
    function viewTrackList($Runner_ID){
        $tracking = new trackingAnalyticModel();
        $tracking->Runner_ID = $Runner_ID;
        return $tracking->viewDeliveryRequest();
    }

    //Function to retrieve tracking data based on Customer ID
    //Code Okay
    function viewOrderTracking($Cus_ID){
        $tracking = new trackingAnalyticModel();
        $tracking->Cus_ID = $Cus_ID;
        return $tracking->viewOrderTrackingList();
    }

    //Function to retrieve selected tracking data based on Track ID
    //Code Okay
    function viewTrackStatus($Tracking_ID){
        $tracking = new trackingAnalyticModel();
        $tracking->Tracking_ID = $Tracking_ID;
        return $tracking->viewStatus();
    }

    //Function to update the track status based on Tracking ID
    //Code Okay
    function editTrackStatus(){
        $tracking = new trackingAnalyticModel();
        $tracking->Tracking_ID = $_GET['Tracking_ID'];
        $tracking->DeliveryStatus = $_POST['DeliveryStatus'];
        if($tracking->modifyStatus()){
            $message = "The Track Status Successfully Updated!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../ManageTrackingAnalyticView/trackingList.php';</script>";
        }
    }
    //function for customer to declare that they already receive the order
    //Code Okay
    function custUpdateTracking(){
        $custUpdate = new trackingAnalyticModel();
        $custUpdate->ReceiveStatus = "Received";
        $custUpdate->Tracking_ID = $_POST['Tracking_ID'];
        if($custUpdate->custUpdateTracking()){
            $message = "You have received the order!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../ManageTrackingAnalyticView/customerTracking.php';</script>";
        }  
    }

    //Function for runner to view joblist based on ready to assign
    //Code Okay
    function viewDeliveryRequest(){
        $joblist = new trackingAnalyticModel();
        $joblist->Assignation = "Ready";
        return $joblist->viewDeliveryRequestList();
    }

    //Function to insert Runner_ID information into tracking table
    //Code Perfect
    function insertTracking($Runner_ID){
        $insertData = new trackingAnalyticModel();
        $insertData->Runner_ID = $Runner_ID;
        $insertData->DeliveryStatus = "Pick Up"; 
        $insertData->Tracking_ID = $_POST['Tracking_ID'];
        if($insertData->insertTracking()){
            $message = "You have assigned to this job";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../ManageTrackingAnalyticView/trackingList.php';</script>";
        }  
    }

    //Analytic Phase
    //Function to retrive salary data for graph
    //Code Perfect
    function generateReportRunner($Runner_ID){
        $report = new trackingAnalyticModel();
        $report->Runner_ID = $Runner_ID;
        $report->month = $_POST['month'];
        return $report->generateReportRunner();
    }

    //Function to retrive sales data from order details
    //Code Okay
    function generateReportServiceProvider($providerID){
        $report = new trackingAnalyticModel();
        $report->providerID = $providerID;
        $report->month = $_POST['month'];
        return $report->generateReportServiceProvider();
    }

    //Function to retrieve total sales from order details
    //Code Okay
    function totalsalesServiceProvider($providerID){
        $report = new trackingAnalyticModel();
        $report->providerID = $providerID;
        $report->month = $_POST['month'];
        return $report->totalsalesServiceProvider();
    }
}
?>