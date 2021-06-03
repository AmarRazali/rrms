<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/model/petModel.php';

class petController{

    function allPet(){
        $allPet = new petModel();
        return $allPet->allPet();
    }

    function petDetails($providerID){
        $petDetails = new petModel();
        $petDetails->providerID = $providerID;
        return $petDetails->petDetails();
    }

    function myBookings($customerID){
        $myBookings = new petModel();
        $myBookings->customerID = $customerID;
        return $myBookings->myBookings();
    }

    function myBookingsAll($customerID){
        $myBookingsAll = new petModel();
        $myBookingsAll->customerID = $customerID;
        return $myBookingsAll->myBookingsAll();
    }

    function myBookingsDetails($OrderPA_ID){
        $myBookingsDetails = new petModel();
        $myBookingsDetails->OrderPA_ID = $OrderPA_ID;
        return $myBookingsDetails->myBookingsDetails();
    }

    function spBookingDetails($OrderPA_ID){
        $spBookingDetails = new petModel();
        $spBookingDetails->OrderPA_ID = $OrderPA_ID;
        return $spBookingDetails->spBookingDetails();
    }

    function myBookingsSP($providerID){
        $myBookingsSP = new petModel();
        $myBookingsSP->providerID = $providerID;
        return $myBookingsSP->myBookingsSP();
    }

    function myBookingsSPAll($providerID){
        $myBookingsSPAll = new petModel();
        $myBookingsSPAll->providerID = $providerID;
        return $myBookingsSPAll->myBookingsSPAll();
    }

    function updateServiceDetails($providerID,$pImage){
        $updateServiceDetails = new petModel();
        $updateServiceDetails->providerID = $providerID;
        $updateServiceDetails->PName= $_POST['updateName'];
        $updateServiceDetails->PDescription= $_POST['updateDescription'];
        $updateServiceDetails->PPrice = $_POST['updatePrice'];
        $updateServiceDetails->APets = $_POST['updatePets'];
        $updateServiceDetails->APetSize = $_POST['updatePetSize'];
        $updateServiceDetails->Days = $_POST['updateDay'];
        $updateServiceDetails->PImage = $pImage;

        
        if($updateServiceDetails->updateServiceDetails()){
            $message = "Your information updated";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'spPetHome.php';</script>";
        }
    }

    function addPet($pImage){
        $addPet = new petModel();
        $addPet->ServiceP_ID = $_POST['ServiceP_ID'];
        $addPet->PName= $_POST['PName'];
        $addPet->PDescription = $_POST['PDescription'];
        $addPet->PPrice = $_POST['PPrice'];
        $addPet->APets = $_POST['APets'];
        $addPet->APetSize = $_POST['APetSize'];
        $addPet->ADays = $_POST['ADays'];
        $addPet->PImage = $pImage;
        
        if($addPet->addPet()){
            $message = "Your Service has been added";
       echo "<script type='text/javascript'>alert('$message');
        window.location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/spPetHome.php';
        </script>";
        }
    }

    function makeBooking ($petImage){
        $makeBooking = new petModel();
        $makeBooking->customerID = $_POST['customerID'];
        $makeBooking->ServiceP_ID = $_POST['ServiceP_ID'];
        $makeBooking->Pdate= $_POST['Pdate'];
        $makeBooking->Rdate = $_POST['Rdate'];
        $makeBooking->PTime= $_POST['PTime'];
        $makeBooking->RTime= $_POST['RTime'];
        $makeBooking->Numpets= $_POST['Numpets'];
        $makeBooking->Numdays= $_POST['Numdays'];
        $makeBooking->Breed= $_POST['Breed'];
        $makeBooking->PetImage = $petImage;
        
        if($makeBooking->makeBooking()){
            $message = "Your Booking is successfull";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/petassistHome.php';
        </script>";
        }
    }

    function updateBooking1($OrderPA_ID){
        $updateBooking1 = new petModel();
        $updateBooking1->OrderPA_ID = $OrderPA_ID;
        $updateBooking1->Totalprice = $_POST['Totalprice'];

        if($updateBooking1->updateBooking1()){
            $message = "Status changed";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/spBookings.php';
        </script>";
        }
    }

    function updateBooking2($OrderPA_ID){
        $updateBooking2 = new petModel();
        $updateBooking2->OrderPA_ID = $OrderPA_ID;
        $updateBooking2->Totalprice = $_POST['Totalprice'];

        if($updateBooking2->updateBooking2()){
            $message = "Status changed";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/spBookings.php';
        </script>";
        }
    }

    function custDec($OrderPA_ID){
        $custDec = new petModel();
        $custDec->OrderPA_ID = $OrderPA_ID;

        if($custDec->custDec()){
            $message = "Proceeding to payment page";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='/RRMS/ApplicationLayer/ManagePaymentView/paymentCheckout.php';
        </script>";
        }
    }

    function custDec1($OrderPA_ID){
        $custDec1 = new petModel();
        $custDec1->OrderPA_ID = $OrderPA_ID;

        if($custDec1->custDec1()){
            $message = "Booking cancelled";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/myBookingsPending.php';
        </script>";
        }
    }

    function complete($OrderPA_ID){
        $complete = new petModel();
        $complete->OrderPA_ID = $OrderPA_ID;

        if($complete->complete()){
            $message = "Appointment completed";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/myBookingsAll.php';
        </script>";
        }
    }
}
?>
