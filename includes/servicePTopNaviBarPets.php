
<!--Top Blue Navigation Bar-->
<?php
$Role = $_SESSION['role'];
if ($Role==3) {
?>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/tracking.css">
        <link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <div class="topnav">
            <a href="../ManagePetAssistInterface/spPetHome.php" style="margin-left: 5px;"><img src="../../includes/ExternalImage/rrms.png" width="110px" height="70px"><label style="font-size: 150%; padding-right: 5px;  font-family: URW Chancery L, cursive;">RRMS</label></a>

            <a href="../ManagePetAssistInterface/spManageService.php" style="margin-left: 30px;"><label style="font-size: 100%; padding-right: 5px; padding-top: 22px; padding-bottom: 20px;">Update Service</label></a>

             <a href="../ManagePetAssistInterface/spBookings.php" style="margin-left: 30px;"><label style="font-size: 100%; padding-right: 5px; padding-top: 22px; padding-bottom: 20px;">View Pending Bookings</label></a>

            <a href="../ManagePetAssistInterface/spBookingsAll.php" style="margin-left: 30px;"><label style="font-size: 100%; padding-right: 5px; padding-top: 22px; padding-bottom: 20px;">View All Bookings</label></a>

            <a href="../ManageTrackingAnalyticView/serviceProviderReportPage.php" style="margin-left: 30px;"><label style="font-size: 100%; padding-right: 5px; padding-top: 22px; padding-bottom: 20px;">Analytic & Report</label></a>  
   

           
        <div class="topnav-right">
      
            <a href="/RRMS/ApplicationLayer/ManageLoginView/Account Interface.php"  title="My Profile"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            <a href="/RRMS/ApplicationLayer/ManageLoginView/logout.php" title="Logout"><i class="fa fa-sign-out" aria-hidden="true" style="font-size: 48px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
        </div>
        </div>

  <?php
}   
?>

<!--Body Grey Background Pic-->
<style>
  body { 
        background: url(../../includes/ExternalImage/background.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }   
</style>


