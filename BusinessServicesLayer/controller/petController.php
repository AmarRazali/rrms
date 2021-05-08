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

    function updateServiceDetails($providerID){
        $updateServiceDetails = new petModel();
        $updateServiceDetails->providerID = $providerID;
        $updateServiceDetails->PName= $_POST['updateName'];
        $updateServiceDetails->PDescription= $_POST['updateDescription'];
        $updateServiceDetails->PPrice = $_POST['updatePrice'];
        $updateServiceDetails->APets = $_POST['updatePets'];
        $updateServiceDetails->APetSize = $_POST['updatePetSize'];
        $updateServiceDetails->Days = $_POST['updateDay'];
        $updateServiceDetails->PImage = $_POST['updateImage'];

        
        if($updateServiceDetails->updateServiceDetails()){
            $message = "Your information updated";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'spManageService.php';</script>";
        }
    }

    function addPet($petImage){
        $addPet = new petModel();
        $addPet->providerID = $_POST['providerID'];
        $addPet->PName= $_POST['PName'];
        $addPet->PDescription = $_POST['PDescription'];
        $addPet->PPrice = $_POST['PPrice'];
        $addPet->PImage = $petImage;
        
        if($addPet->addPet()){
            $message = "Your Service has been updated";
        echo "<script type='text/javascript'>alert('$message');</script>";
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
        $makeBooking->Breed= $_POST['Breed'];
        $makeBooking->PetImage = $petImage;
        
        if($makeBooking->makeBooking()){
            $message = "Your Booking is successfull";
        echo "<script type='text/javascript'>alert('$message');
        window.location.href='/RRMS/ApplicationLayer/ManagePetAssistInterface/petassistHome.php';
        </script>";
        }
    }
}
?>
