<?php
session_start();
    // $_SESSION = [];
  require_once $_SERVER["DOCUMENT_ROOT"].'/RRMS/BusinessServicesLayer/controller/petController.php';
$pethotel = new pethotelController();
$data = $pethotel->viewAll(); 
$view_variable = 'a string here';

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php include"../../includes/head.php";?>
<?php include '../../includes/cusTopNaviBar.php';


$Role = $_SESSION['role'];
?>
<body>


  <div class="wrapper" id="wrapper">
    <?php 
   
    ?>
  </div>


  <section class="type__category__area bg--white section-padding">
  


      <div class="card-heading">
        <h2 class="title"style="font-weight:bold; color:#000000; font-size:45px; " >Pet Services List</h2>
      </div>
      <div class="card-body">
  <center>
    <!-- <div class="content_resize2"> -->
      <!-- <center> -->
      <table>
            <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
            </thead>
            <?php
            $i = 1;
            foreach($data as $row){
             

               echo "<tr>"
                . "<td>".$row['pethotel_name']."</td>"
              
                ."<td>RM".$row['pethotel_price']."</td>";                         
                       // . "<td>".$row['pethotelgroom_price']."</td>";
               ?>
            <td><form action="" method="POST">
              <?php
              if ($_SESSION['usergroup'] == 1) {
                  ?>
      
               <button  type="submit" name="buy" value="BUY"><br>Buy</button>
               <br></br>
              <input type="hidden" name="name" value="<?=$row['pethotel_name']?>">
              <input type="hidden" name="price" value="<?=$row['pethotel_price']?>">
      
              <input type="hidden" name="quantity" value="1">
             
              <?php
            } 
            }?>


                </form></td>
        
        </table>
      </center>
      </div>
    </center>
</section>


<?php
?>


</div><!-- //Main wrapper -->
<!-- JS Files -->
<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/active.js"></script>


</body>
</html>
