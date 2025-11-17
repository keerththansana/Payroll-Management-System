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
    <title>Salary History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body class="w3-light-grey">
        <?php include('parts/header.php') ?>
        <?php include('parts/sidebar.php') ?>
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-user"></i> Contact us</b></h5>
            </header>
			<div class="w3-margin">
				<div class="w3-row">
					<div class="w3-col">
						<h4>Payroll System</h4>
						<div class="w3-row">
							<div class="w3-col s1">
							<b>Email</b>
							</div>
							<div class="w3-col s8">
							muskan@gmail.com <br> sonal@gmail.com 
						 
							</div>
						</div>
						<div class="w3-row">
							<div class="w3-col s1">
							<b>Phone</b>
							</div>
							<div class="w3-col s8">
							+917894561230 
						 
							</div>
						</div>
					</div>
				</div>
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
