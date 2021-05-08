<?php
session_start();
    // $_SESSION = [];

// require_once '../controller/customerController.php';


?>

<?php include '../../includes/custTopNaviBarPets.php';


$Role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <title>Homepage</title>
  <style>
    .myPet{
      background: url(/RRMS/Images/Pet/petcare.jpg) no-repeat top right;
      height: 500px;
      width: 85%;
      text-align: left;
      font-family: Itim, cursive;
    }
    .text1{
      width: 40%;
      height: 250px;
    }
  </style>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">


  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" csontent="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
   
        <center>
        <h1 style="font-family:Itim, cursive;"  style="font-weight:bold; color:#333652; font-size:35px; text-align:center;">Book Loving Pet Care Services to better accommodate your pet </h1><br><br>
          <div class="myPet">
            <h2 style="text-decoration: underline;">Services provided</h2><br><br>
            <div style="font-size: 30px"> 
              <a href="/RRMS/ApplicationLayer/ManagePetAssistInterface/boardinglist.php">Pet Boarding</a>
              <div class='text1'>
               <p style="font-size: 20px">Perfect for when you need an overnight pet care. Choose from the different varieties of pet boarding places available according to your needs and preferences. Compare the different prices they offer and leave your pets to them without any doubt.</p><br></div>
             </div>
                <!--<img src="/RRMS/Images/Pet/petcare.jpg" alt="product" images width=500 height=150 >

			
           
              <!-- Default panel contents -->
             
				
			
              
        
      </center>
    
   

</body>
</html>

    <!-- JS Files -->
    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>
</body>
</html>
