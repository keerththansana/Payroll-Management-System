<?php
session_start();
include('db.php');
if(!$_SESSION["user"])
{
    header("Location:login.php");
}
if($_GET)
{
    $id = $_GET["id"];
	$month = $_GET["month"];
if($month != "")
{
$month="WHERE month LIKE '$month'";
}
else
{
$month="";
}
  
    $sql = "SELECT *FROM employee WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $name = $row["name"];    
        $mobile = $row["mobile"];
$depid = $row["department"]; 
$sql1 = "SELECT *FROM department WHERE id = $depid";
                	$result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                // output data of each row
                while($row1 = $result1->fetch_assoc()) {
		$dept = $row1["name"];
			}
		}
        }
    }
}    
?>
<!DOCTYPE html>
<html>
    <title>View History</title>
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
                <h5><b><i class="fa fa-history"></i> <?php echo $name; ?> </b></h5>
			<p>Mobile : <?php echo $mobile; ?></p>
			<p>Dept : <?php echo $dept;?></p>	
	    </header>
		<div class="w3-padding">
			<button class="w3-btn w3-blue" onclick="print();">Print</button>
			<form action="" method="get">
				<input type="hidden" name="id" value="<?php echo $id; ?>"/>
				<select name="month">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
     </select> 
	<button type="submit" class="w3-btn w3-blue">Filter</button>
		</div>
            <table class="w3-table w3-margin w3-striped w3-white">
            <tr>
                <td>Payment ID</td>
                <td>Salary Released</td>
                <td>Month</td>
            </tr>
            <?php  
                $sql = "SELECT *FROM employeePayment $month ORDER BY id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["salary"]; ?></td>
                    <td><?php echo $row["month"]; ?></td>
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
