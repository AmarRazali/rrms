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
<style>
    body { 
        background: url(../../includes/ExternalImage/background.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
  }

  table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
      background-color: ;
  }

  table tr#first {border:inset 4px solid black; color:white;  background-color:rgb(51, 63, 80);}

</style>
<body>
  <?php
    require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Tracking Analytic Controller.php';
    $providerID = $_SESSION['providerID'];
    $month = $_POST['month'];
    $report = new trackingAnalyticController();
    $data = $report->generateReportServiceProvider($providerID);
  ?>

  <div id="frm">
  <h2>Service Provider Sales</h2>  
    <table style="margin-top: 20px;" width="100%">
      <tr id="first">
        <th id="styleTr">No</th>
        <th>Date</th>
        <th>Order Total Price (RM)</th>
      </tr>
      <?php
        $i=1;
        foreach ($data as $row) {
      ?>

      <tr>
        <td><?=$i?></td>
        <td style="text-align: center; width: 400px;"><?=$row['OD_Date']?></td>
        <td style="text-align: center; width: 400px;"><?=$row['OD_TotalPrice']?></td>
      </tr>

      <?php
        $i=$i+1;  
        }
      ?>
    </table>

    <?php
    $report = new trackingAnalyticController();
    $data = $report->totalsalesServiceProvider($providerID);
    ?>
    <table>
          <table id="frm">
              <tr id="first">
                <th>Month</th>
                <th>Total Sales (RM)</th>
              </tr>
              <?php
              foreach ($data as $row) {
              ?>
              <tr>
                <td><?php echo $month; ?></td>
                <td><?=$row['total'];?></td>
              </tr>
              <?php
              }
              ?>
            </table>
    </table>
  </div>
</body>
</html>