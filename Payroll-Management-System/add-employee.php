<?php
session_start();
include('db.php');
if(!$_SESSION["user"])
{
    header("Location:login.php");
}
if($_POST)
{
    $name = $_POST["name"];
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $dob = $_POST["dob"];
    $mobile = $_POST["mobile"];
    $doj = $_POST["doj"];
    $designation = $_POST["designation"];
    $grade = $_POST["grade"];
     $department = $_POST["department"];
	 if($name == "" || $fname == "" || $mname == "" || $dob == "" || $mobile == "" || (strlen($mobile) < 10))
	 {
	?>
	<script>alert("Fields Required");</script>
	
	<?php
	return;
	 }		 
    $sql = "INSERT INTO employee (name,fname,mname,dob,mobile,doj,designation,grade, department) 
            VALUES ('$name','$fname','$mname','$dob','$mobile','$doj','$designation','$grade','$department')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location:view-employee.php");
    } else {
        ?>
        <script>alert("Opps Something went wrong !!! <?php  echo $sql; ?>");</script>
        <?php
    }

}


?>
<!DOCTYPE html>
<html>
    <title>Add Employee</title>
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
                <h5><b><i class="fa fa-user"></i> Add Employee</b></h5>
            </header>
            <div class="w3-margin w3-white w3-card w3-padding">
                <form action="" method="post">
                 <p></p>
                <input type="text" required class="w3-input" placeholder="Name" name="name">
                <p></p>
                <input type="text" required class="w3-input" placeholder="Father Name" name="fname">
                <p></p>
                <input type="text" required class="w3-input" placeholder="Mother Name" name="mname">
                <p></p>
		<lable>Date Of Birth</lable>
                <input type="date" required class="w3-input" placeholder="Date of Birth" name="dob">
                <p></p>
                <input type="number" required class="w3-input" placeholder="Mobile Number" name="mobile">
                <p></p>

		<lable>Date Of Joining</lable>
                <input type="date" required class="w3-input" placeholder="Date of Joining" name="doj">
                <p></p>
                <input type="text" required class="w3-input" placeholder="designation" name="designation">
                <p></p>
                <select required class="w3-input"  name="department">
                <option disabled selected>Select Department</option>
                  <?php  
                    $sql = "SELECT *FROM department";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                    <?php
                    } } else {
                    
                    }
                  ?>
                </select> 
                <p></p>
                <select required class="w3-input"  name="grade">
                <option disabled selected>Select Grade</option>
                  <?php  
                    $sql = "SELECT *FROM grade";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["id"]; ?>"><?php echo $row["grade"]; ?> (<?php echo $row["salary"]; ?>)</option>
                    <?php
                    } } else {
                    
                    }
                  ?>
                </select> 
                <p></p>
                <button class="w3-btn w3-blue" type="submit">Add Employee</button>
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
