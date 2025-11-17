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
