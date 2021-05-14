<?php
session_start();
?>

<?php include '../../includes/custTopNaviBarPets.php';?>
<?php

$Role = $_SESSION['role'];
$customerID = $_SESSION['customerID'];
$ServiceP_ID = $_GET['ServiceP_ID'];

require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';

$makeBooking = new petController();

if(isset($_POST['save'])){
	$petImage = "/RRMS/Images/Pet/".basename($_FILES['petImage']['name']);	
	$makeBooking->makeBooking($petImage);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pet Boarding</title>
	<style>
    .myPlatform{
      height: 700px;
      width: 75%;
      font-family: Itim, cursive;
      border: 5px outset #221A57;
      font-size: 15px;
    }
    .myInfo{
    	height: 100px;
    	width: 30%;
    	text-align: left;
    }

  </style>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  <meta http-equiv="X-UA-Compatible" csontent="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
</head>
<body>
	
<center><br>
<div class="myPlatform">
	<form action="" method="POST" enctype="multipart/form-data">
		<label for="sent1">I'm looking for service for my:</label><br>
		<input type="checkbox" id="dog" name="Dog" value="Dog">
		<label for="dog">Dog</label>
		<input type="checkbox" id="cat" name="Cat" value="Cat">
		<label for="cat">Cat</label><br><br><br>

		<label for="pickup">Drop Off Date</label>
		  <input type="date" id="Pdate" name="Pdate">&nbsp &nbsp

		<label for="return">Pick Up Date</label>
		  <input type="date" id="Rdate" name="Rdate"><br><br>

		<label for="pickupdate">Drop Off Time</label>
		<input type="Time" id="PTime" name="PTime">&nbsp &nbsp

		<label for="returndate">Pick Up Time</label>
		<input type="Time" id="RTime" name="RTime"><br><br>



		<label for="sent2">My pet size is:</label><br>
		<input type="checkbox" id="small" name="Small" value="Small">
		<label for="small">Small (0 - 5kg)</label><br>
		<input type="checkbox" id="med" name="Medium" value="Medium">
		<label for="med">Medium (6 - 18kg)</label><br>
		<input type="checkbox" id="large" name="Large" value="Large">
		<label for="large">Large (19 - 45kg)</label><br>
		<input type="checkbox" id="giant" name="Giant" value="Giant">
		<label for="giant">Giant (45kg++)</label><br><br>

		<div class="myInfo">
		<label for="image">Pet Image:</label>
		<input type="file" name="petImage" required><br>

		<label for="breed">Breed Description:</label>
		<input type="text" id="Breed" name="Breed"><br>

		<label for="numpets">Number of Pets:</label>&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="Number" id="Numpets" name="Numpets"><br>

		<label for="numpets">Number of Days:</label>&nbsp&nbsp&nbsp&nbsp
		<input type="Number" id="Numdays" name="Numdays"><br>
		</div><br><br><br><br><br><br>

		<div class="w3-container">
		<input type="hidden" name="customerID" value="<?=$customerID;?>">
		<input type="hidden" name="ServiceP_ID" value="<?=$ServiceP_ID;?>">
		<input type="submit" name="save" value="Save" class="w3-circle w3-button w3-black">
 		</div>

	</form>
</div>
</center>
</body>
</html>