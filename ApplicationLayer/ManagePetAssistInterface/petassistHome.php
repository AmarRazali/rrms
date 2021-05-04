<?php
session_start();
    // $_SESSION = [];

// require_once '../controller/customerController.php';


?>

<?php include '../../includes/cusTopNaviBar.php';


$Role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>

<body>
   
        <center>
          <h1 class="bradcaump-title"  style="font-weight:bold; color:#333652; font-size:45px; text-align:center;">PET ASSIST </h1>     
                <img src="/RRMS/Images/Pet/Animals.jpg" alt="product" images width=500 height=150 >

			
           
              <!-- Default panel contents -->
             <div style="font-weight:bold; font-size:30px; color:#800000; text-align:left;"><center><br> Services    </center>
     </div>
				
			
              <a href="/RRMS/ApplicationLayer/ManagePetAssistInterface/pethotel.php" style="font-weight:bold; font-size:20px; color:#90ADC6; text-align :left;">Pet Hotels & care services</a>
        
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
