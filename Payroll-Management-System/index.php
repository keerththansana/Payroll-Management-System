<?php
session_start();
include('db.php');
if(!$_SESSION["user"])
{
    header("Location:login.php");
}


?>
<!DOCTYPE html>
<html>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	body { 
     background-image: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url(image/dashboard.jpg);
     height: 100vh;
     background-size: cover;
     background-position: center;
	}	
	</style>
    <body class="w3-light-grey">
        <?php include('parts/header.php') ?>
        <?php include('parts/sidebar.php') ?>
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
            </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php  
                $sql = "SELECT *FROM employee";
                $result = $conn->query($sql);
                echo $result->num_rows
           ?>
           </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Employee</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-inr w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php
                $total = 0;  
                $sql = "SELECT *FROM employee";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $garde = $row["grade"];
                    $sql1 = "SELECT *FROM grade WHERE id = $garde";
                    $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            while($row1 = $result1->fetch_assoc()) {
                            $total = $total + $row1["salary"];
                            }
                        }
                    }
                }
                echo $total;
                ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Total Salary/Month</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php  
                $sql = "SELECT *FROM department";
                $result = $conn->query($sql);
                echo $result->num_rows
           ?>
           </h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Department</h4>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-card w3-white w3-margin w3-padding">
  <?php $sql1 = "SELECT *FROM payment  ORDER BY id DESC LIMIT 1";
                    $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            while($row1 = $result1->fetch_assoc()) {
                            $month =  $row1["month"];
                            $amount =  $row1["amount"];
                            }
						?>
						 <p>Last salary was released on <?php echo $month; ?> amount  <?php echo $amount; ?></p>
						<?php
                        }

                        ?>
               
  </div>

   
   
   
</div>

<script>
 var mySidebar = document.getElementById("mySidebar");

 var overlayBg = document.getElementById("myOverlay");

 function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

 function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
