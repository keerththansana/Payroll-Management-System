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
    <title>Employee</title>
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
                <h5><b><i class="fa fa-user"></i> Employee</b></h5>
            </header>
            <table class="w3-table w3-margin w3-striped w3-white">
            <tr>
                <td>EmpId</td>
                <td>name</td>
                <td>Father Name</td>
                <td>Mother Name</td>
                <td>Date of Birth</td>
                <td>Mobile</td>
                <td>Department</td>
                <td>Grade</td>
                <td>Action</td>
                
            </tr>
            <?php  
                $sql = "SELECT *FROM employee";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
			$depid = $row["department"]; 
$gradeId = $row["grade"]; 
			$sql1 = "SELECT *FROM department WHERE id = $depid";
                	$result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                // output data of each row
                while($row1 = $result1->fetch_assoc()) {
		$dept = $row1["name"];
			}
		}
			$sql1 = "SELECT *FROM grade WHERE id = $gradeId";
                	$result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                // output data of each row
                while($row1 = $result1->fetch_assoc()) {
		$grade = $row1["grade"];
			}
		}

                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["fname"]; ?></td>
                    <td><?php echo $row["mname"]; ?></td>
                    <td><?php echo $row["dob"]; ?></td>
                    <td><?php echo $row["mobile"]; ?></td>
                    <td><?php echo $dept; ?></td>
                    <td><?php echo $grade; ?></td>
                    <td><a class="w3-text-red" href="remove-employee.php?id=<?php echo $row["id"]; ?>">Remove</a></td>
                </tr>
                <?php
                } } else {
                
                }
            ?>
            </table>
             
        
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
