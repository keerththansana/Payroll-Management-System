<?php
session_start();
include('db.php');
if(!$_SESSION["user"])
{
    header("Location:login.php");
}
if($_POST)
{
    $department = $_POST["department"];
     $sql = "INSERT INTO department (name) VALUES ('$department')";
    if ($conn->query($sql) === TRUE) {
        header("Location:view-department.php");
    } else {
        ?>
        <script>alert("Opps Something went wrong !!!");</script>
        <?php
    }

}


?>
<!DOCTYPE html>
<html>
    <title>Add Department</title>
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
                <h5><b><i class="fa fa-building"></i> Add Department</b></h5>
            </header>
            <div class="box w3-white w3-card w3-padding">
                <form action="" method="post">
                 <p></p>
                <input type="text" required class="w3-input" placeholder="Department Name" name="department">
                <p></p>
                <button class="w3-btn w3-blue" type="submit">Add Department</button>
                </from>
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
