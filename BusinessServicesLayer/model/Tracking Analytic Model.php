
<?php

class trackingAnalyticModel{

    //Function connection to database
    function connect()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=rrms', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

        //Tracking Phase
        //Function to view delivery request based on runner ID
        //Tracking List
        //Code Okay
        function viewDeliveryRequest(){
            $sql = "select * from orderdetails inner join serviceprovider inner join tracking inner join customer on tracking.Cus_ID = customer.Cus_ID and tracking.Order_ID = orderdetails.Order_ID and tracking.ServiceP_ID = serviceprovider.ServiceP_ID where tracking.Runner_ID =:Runner_ID";
            $args = [':Runner_ID'=>$this->Runner_ID];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //Function to view order tracking based on customer ID
        //Order Tracking
        //Code Okay
        function viewOrderTrackingList(){
            $sql = "select * from orderdetails inner join serviceprovider inner join tracking inner join customer on tracking.Cus_ID = customer.Cus_ID and tracking.Order_ID = orderdetails.Order_ID and tracking.ServiceP_ID = serviceprovider.ServiceP_ID where customer.Cus_ID =:Cus_ID and tracking.ReceiveStatus= 'not received yet' ";
            $args = [':Cus_ID'=>$this->Cus_ID];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //Function to view received order based on customer id
        //modified by choong
        function viewOrderTrackingList(){
            $sql = "select * from orderdetails inner join serviceprovider inner join tracking inner join customer on tracking.Cus_ID = customer.Cus_ID and tracking.Order_ID = orderdetails.Order_ID and tracking.ServiceP_ID = serviceprovider.ServiceP_ID where customer.Cus_ID =:Cus_ID and tracking.ReceiveStatus= 'Received' ";
            $args = [':Cus_ID'=>$this->Cus_ID];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //Function to retrieve tracking data based on Tracking ID
        //Customer Tracking Page
        //Update Tracking Page
        //Code Okay
        function viewStatus(){
            $sql = "select * from tracking inner join customer inner join serviceprovider on tracking.Cus_ID=customer.Cus_ID and tracking.ServiceP_ID = serviceprovider.ServiceP_ID where tracking.Tracking_ID=:Tracking_ID";
            $args = [':Tracking_ID'=>$this->Tracking_ID];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //Function to view delivery request
        //For the reuqest which does not have runner
        //Manage Delivery Page
        //Code Okay
        function viewDeliveryRequestList(){
            $sql = "select * from orderdetails inner join serviceprovider inner join tracking inner join customer on tracking.Cus_ID = customer.Cus_ID and tracking.Order_ID = orderdetails.Order_ID and tracking.ServiceP_ID = serviceprovider.ServiceP_ID where tracking.Assignation=:Assignation and tracking.Runner_ID = 0";
            $args = [':Assignation'=>$this->Assignation];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //function to insert runnerID data into tracking table 
        //Code Perfect
        function insertTracking(){
            $sql = "update tracking set Runner_ID=:Runner_ID, DeliveryStatus=:DeliveryStatus where Tracking_ID=:Tracking_ID"; 
            $args = [':Runner_ID'=>$this->Runner_ID, ':DeliveryStatus'=>$this->DeliveryStatus, ':Tracking_ID'=>$this->Tracking_ID];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //Function to update delivery status based on track ID 
        //Update Tracking Page
        //Code Okay
        function modifyStatus(){
            $sql = "update tracking set DeliveryStatus=:DeliveryStatus where Tracking_ID=:Tracking_ID";
            $args = [':DeliveryStatus'=>$this->DeliveryStatus, ':Tracking_ID'=>$this->Tracking_ID];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //Function to update customer status data
        //Code Okay
        function custUpdateTracking(){
            $sql = "update tracking set ReceiveStatus=:ReceiveStatus where Tracking_ID=:Tracking_ID";
            $args = [':ReceiveStatus'=>$this->ReceiveStatus, ':Tracking_ID'=>$this->Tracking_ID];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //analytic phase

        //Function to retrive salary data
        //Code Okay
        function generateReportRunner(){
            $sql = "select SUM(Salary) as totalsalary from tracking where tracking.Runner_ID =:Runner_ID and ReceiveStatus = 'Received' and Month(date) = :month group by Day(date)";            
            $args = [':Runner_ID'=>$this->Runner_ID, ':month'=>$this->month];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }

        //Function to retrive sales data from order details
        //Code Okay
        function generateReportServiceProvider(){
            $sql = "select * from orderdetails where orderdetails.ServiceP_ID =:providerID and OD_Status = 'Paid' and Month(OD_Date) = :month";
            $args = [':providerID'=>$this->providerID, ':month'=>$this->month];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;       
        }


        //Function to retrieve total sales from order details
        //Code Okay
        function totalsalesServiceProvider(){
            $sql = "select SUM(OD_TotalPrice) AS total from orderdetails where orderdetails.ServiceP_ID =:providerID and OD_Status = 'Paid' and Month(OD_Date) = :month";
            $args = [':providerID'=>$this->providerID, ':month'=>$this->month];
            $stmt = trackingAnalyticModel::connect()->prepare($sql);
            $stmt->execute($args);
            return $stmt;
        }
}

?>
