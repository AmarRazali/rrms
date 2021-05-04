<!DOCTYPE html>
<html>

    <?php
        require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/Registration Controller.php';

        //Create register object in controller
        $register = new registrationController();
    
        if(isset($_POST['registerCustomer'])){
            //Object point to register function
            $register->registerCustomer();
        }
    ?>
    <head>
        <title>SP Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/logo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

                
        <link rel="stylesheet" type="text/css" href="../../includes/ExternalCSS/login.css">
      
    </head>

    <style>
        body { 
                background: url(../../includes/ExternalImage/background.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
        }   
    </style>

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
    <div class="header">
            <center> <a href="userRegister.php"><img src="../../includes/ExternalImage/rrms.png" alt="Logo" height="150px"></a> </center>
    </div>

        <br>
        <p><strong><i>Customer Registration </strong>:</i></p>
        <br>

        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">

                     <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-user" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="CusName" placeholder="Name" required>
                    </div>
               

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="CusPhoneNo" placeholder="Phone Number" required>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="CusAddress" placeholder="Address" required>
                    </div>
                        
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="CusEmail" placeholder="Email Address" required>
                    </div>
                    
                    <div class="input-group">         
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="password" class="form-control form-control input-lg" name="CusPassword" id="password" placeholder="Password" required>
                    </div>
                    <div class="showPwd"><input type="checkbox" onclick="showPassword()">&nbsp;Show Password</div>
                        <br>
                        <button href="./loginPage.php" type="submit" name="registerCustomer" class="registerbtn"><label style="font-size: larger;">Register</label></button>
                    </div>  
                </div>
            </div>
        </form>
        <br>
        <div style="text-align: center; font-size: medium;">
            Already have an account? <a class="login" href="./loginPage.php"><u>Login here</u></a>.
        </div>
    </body>
</html>