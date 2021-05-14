<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>RRMS Login</title>
        <?php include '../../includes/loginTopNaviBar.php';?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/login.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <?php
    require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

    //Create Login Object
    $login = new registrationController();  


    if(isset($_POST['login'])){

        $Role = $_POST['role'];
        $useremail = $_POST['userEmail'];
        $password = $_POST['userpassword'];

        
        if($Role=="Customer"){
            
            //Get data from login function
            $data = $login->loginCustomer();

            foreach ($data as $row) {
                
                $emaildb = $row['Cus_Email'];
                $passworddb = $row['Cus_Password'];


                if($useremail==$emaildb){
                    if($password==$passworddb){
                        $_SESSION['CusEmail'] = $emaildb ;
                        $_SESSION['customerID'] = $row['Cus_ID'];
                        $_SESSION['role'] = $row['Role_No'];
                        $_SESSION['CusName'] = $row['Cus_Name'];
                        $_SESSION['CusPhoneNo'] = $row['Cus_PhoneNo'];
                        $_SESSION['CusAddress'] = $row['Cus_Address'];
                        $_SESSION['CusPassword'] = $passworddb;

                        header("Location:cusHomePage.php");
                    }
                    else{
                        $message = "Wrong password...";
                        echo "<script type='text/javascript'>alert('$message');
                        window.location = 'loginPage.php';</script>";
                    }
                }
                else{
                $message = "You hat yet registve noered...";
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'loginPage.php';</script>";
                }
            }
        }
        else if($Role=="Runner"){
            
            //Get data from login function
            $data = $login->loginRunner();

            foreach ($data as $row) {
                
                $emaildb = $row['Run_Email'];
                $passworddb = $row['Run_Password'];

                if($useremail==$emaildb ){
                    if($password==$passworddb){
                        $_SESSION['RunEmail'] = $emaildb ;
                        $_SESSION['runnerID'] = $row['Runner_ID'];
                        $_SESSION['role'] = $row['Role_No'];
                        $_SESSION['RunName'] = $row['Run_Name'];
                        $_SESSION['RunPhoneNo'] = $row['Run_PhoneNo'];
                        $_SESSION['RunICNum '] = $row['Run_ICNum '];
                        $_SESSION['RunLicense'] = $row['Run_License'];
                        $_SESSION['RunAddress'] = $row['Run_Address'];
                        $_SESSION['RunnerEmail'] = $row['Run_Email'];
                        $_SESSION['RunBankType'] = $row['Run_BankType'];
                        $_SESSION['RunAccNum'] = $row['Run_AccNum'];
                        $_SESSION['RunPassword'] = $passworddb;

                        header("Location:/RRMS/ApplicationLayer/ManageTrackingAnalyticView/runnerHomePage.php");
                    }
                    else{
                    $message = "Wrong password...";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location = 'loginPage';</script>";
                    }
                }
                else{
                $message = "You have not yet registered...";
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'loginPage';</script>";
                }
            }
        }
        else if($Role=="Service Provider"){
            
            //Get data from login function
            $data = $login->loginServiceProvider();

            foreach ($data as $row) {
                
                $emaildb = $row['SP_Email'];
                $passworddb = $row['SP_Password'];

                if($useremail ==$emaildb){
                    if($password==$passworddb){
                        $_SESSION['SPEmail'] = $emaildb ;
                        $_SESSION['providerID'] = $row['ServiceP_ID'];
                        $_SESSION['role'] = $row['Role_No'];
                        $_SESSION['SPType'] = $row['SP_Type'];
                        $_SESSION['SPName'] = $row['SP_Name'];
                        $_SESSION['SPBussRegNo'] = $row['SP_BussRegNo'];
                        $_SESSION['SPAddress'] = $row['SP_Address'];
                        $_SESSION['SPPhoneNo'] = $row['SP_PhoneNo'];
                        $_SESSION['SPBankType'] = $row['SP_BankType'];
                        $_SESSION['SPAccNo'] = $row['SP_AccNo'];
                        $_SESSION['SPPassword'] = $passworddb;

                    

                          
                        if ($_SESSION['SPType'] == "Food"){
                            header("Location:../ManageLoginView/spFoodHome.php");
                        }
                        else if($_SESSION['SPType'] == "Goods"){
                            header("Location:../ManageGoodsView/spGoodsHome.php");
                        }
                        else if($_SESSION['SPType'] == "Pharmacy"){
                            header("Location:../ManagePharmacyView/spPharHome.php");
                        }
                        else if($_SESSION['SPType'] == "Pet"){
                            header("Location:../ManagePetAssistInterface/spPetHome.php");
                        }
                    }
                    else{
                    $message = "Wrong password...";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location = 'loginPage.php';</script>";
                    }
                }
                else{
                $message = "You have not yet registered...";
                echo "<script type='text/javascript'>alert('$message');
                window.location = 'loginPage.php';</script>";
                }
            }
        }
    }
    ?>
    </head>


    <script>
        function showPassword() {
            var x = document.getElementById("password");
    
            if(x.type === "password"){
                x.type = "text";
            } 
            else{
                x.type = "password";
            }
        }
    </script>

    <body>
    <br><br><br><br><br>
       
        <p><strong><i>RRMS Login</i></strong>:</p>
        <br>

        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="userEmail" id="email" placeholder="Email Address" required>
                    </div>
                    <br>
                    <div class="input-group">         
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="password" class="form-control form-control input-lg" name="userpassword" id="password" placeholder="Password" required>
                    </div>
                    <div class="showPwd"><input type="checkbox" onclick="showPassword()">&nbsp;Show Password</div>
                    <div class="input-group">         
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: larger;"></i></span>
                        <select name="role" id="LoginSelect"  class="form-control">
                            <option value="">Choose User Type</option>
                            <option value="Customer">Customer</option>
                            <option value="Runner">Runner</option>
                            <option value="Service Provider">Service Provider</option>
                            
                          </select>
                    </div>
                    <br>
                    <button type="submit" name="login" value="LOGIN" class="loginBtn" id="buttonLogin"><label style="font-size: larger;">Log In</label></button>
                </div>  
            </div>
        </form>
        <br>
        <div style="text-align: center; font-size: medium;">
            Don't have an account? <a class="register" href="./cusRegistration.php"><u>Register here</u></a>.
        </div>
     
    </body>
</html>

           
    
