<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Runner Report Graph</title>
      <?php
      include '../../includes/runnerTopNaviBar.php';
      ?>
</head>
<body>
  <?php
    require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Tracking Analytic Controller.php';
    $Runner_ID = $_SESSION['runnerID'];
    $month = $_POST['month'];
    $report = new trackingAnalyticController();
    $data = $report->generateReportRunner($Runner_ID);
  ?>
    <form id="frm">
      <h2>Runner Report</h2>  
      <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "light2",
          title:{
            text: "Runner Salaries"
          },
            
          data: [{        
            type: "line",
                indexLabelFontSize: 16,
            dataPoints: [
              <?php
                $i=1;
                foreach ($data as $row) {
              ?>
                { y: <?=$row['totalsalary']?>},
                    
              <?php
                $i=$i+1;
                }
              ?>
            ]
          }]
        });
        chart.render();

        }
      </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <p style="text-align:center;">Date</p>
</body>
</html>
