<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Provider Report</title>
      <?php
      include '../../includes/servicePTopNaviBar.php';
      ?>
</head>
<body>
  <?php
    require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Tracking Analytic Controller.php';
    $providerID = $_SESSION['providerID'];
  ?>

  <form id="frm" action="serviceProviderReportDisplay.php" method="POST">
  <h2>Service Provider Report</h2>  
  <p style="text-align:center;">Choose Month</p>
    <div class="contentRight">
      <div id="subContentTop">
        <div id="subContent">
          <form action="" method="POST">
          <select name="month" id="selectMonth">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="12">November</option>
            <option value="12">December</option>
          </select>
          <input type="submit" id="btn" name="submit" value="Display"   />
          </form>
        </div>
      </div>
    </div>
  </form>
</body>
</html>
