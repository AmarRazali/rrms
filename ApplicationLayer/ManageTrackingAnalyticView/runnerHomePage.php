<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Runner Homepage</title>
    <?php
        $role=$_SESSION['runnerID'];
        include '../../includes/runnerTopNaviBar.php';
    ?>
</head>

<body>

    <div class="contentRight">
        <?php
        require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

        $viewUserData = new registrationController();
        
        $runID = $_SESSION['runnerID'];
        $data = $viewUserData->viewDataRunner($runID);

        foreach ($data as $row) {
        ?>

    <form id="frm">

    <div style="float: width: 40%;">
        <img src="../../images/Tracking/rrmsRunner.jpeg" width="300px" height="300px">
        <h1 style="font-size: 70px;font-family: Courier New, cursive;">Welcome <?=$row['Run_Name'];?> Runner</h1>     
    </div>
    </form>

    <?php
        }
        ?>

    <br style="clear: both;"> 
    </div>
    
</body>
</html>