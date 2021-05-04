<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/manageGoodsController.php';
$spID = $_SESSION['providerID'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Service Rate</title>

    <?php include '../../includes/ServicePTopNaviBarGoods.php';?>

		<style>
			button{
					background:#333f50;
					padding: 5px 5px;
					color:#fff;
					border-radius:5px;
					margin-right:10px;
					border:none;
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

</head>

<body>
<?php
  //Create register object in controller
  $register = new manageGoodsController();

  if(isset($_POST['registerSPRunner'])){
      //Object point to register function
      $register->registerSPRunner($spID);
  }
?>

<center>
  <br>
  <p><strong>Runner Registration </strong></p>
  <br>
  <form action="" method="POST">
      <div class="row">
          <div class="col-lg-4 col-lg-offset-4">

               <div class="input-group">
                  <span class="input-group-addon"><i class="fas fa-user" aria-hidden="true" style="font-size: large;"></i></span>
                  <input type="text" class="form-control form-control input-lg" name="RunName" placeholder="Name" required>
              </div>


              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true" style="font-size: large;"></i></span>
                  <input type="text" class="form-control form-control input-lg" name="RunICNum" placeholder="Identification Number" required>
              </div>

               <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-drivers-license" aria-hidden="true" style="font-size: large;"></i></span>
                  <input type="text" class="form-control form-control input-lg" name="RunLicense" placeholder="License" required>
              </div>


              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true" style="font-size: larger;"></i></span>
                  <input type="number" class="form-control form-control input-lg" name="RunPhoneNo" placeholder="Phone Number" required>
              </div>



              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                  <input type="text" class="form-control form-control input-lg" name="RunAddress" placeholder="Address" required>
              </div>

              <br>
              <br>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-university" aria-hidden="true" style="font-size: large;"></i></span>
                  <input type="text" class="form-control form-control input-lg" name="RunBankType" placeholder="Bank Type" required>
              </div>

              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book" aria-hidden="true" style="font-size: large;"></i></span>
                  <input type="text" class="form-control form-control input-lg" name="RunAccNum" placeholder="Bank Account Number" required>
              </div>
              <br>
              <br>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" style="font-size: larger;"></i></span>
                  <input type="text" class="form-control form-control input-lg" name="RunEmail" placeholder="Email Address" required>
              </div>


              <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true" style="font-size: larger;"></i></span>
                  <input type="password" class="form-control form-control input-lg" name="RunPassword" id="password" placeholder="Password" required>
              </div><br>
              <div class="showPwd"><input type="checkbox" onclick="showPassword()">&nbsp;Show Password</div>
                  <br>
                  <button type="submit" name="registerSPRunner" class="registerbtn"><label style="font-size: larger;">Register</label></button>
              </div>
          </div>
      </div>
  </form>
  <br>
</center>
</body>

</html>
