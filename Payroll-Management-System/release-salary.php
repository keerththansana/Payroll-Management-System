<?php
session_start();
include('db.php');
if(!$_SESSION["user"])
{
    header("Location:login.php");
}
if($_POST)
{
    $ok = true;
    $month = $_POST["month"];
    $amount = $_POST["amount"];
    $sql = "INSERT INTO payment (month, amount) VALUES ('$month', '$amount')";
    if ($conn->query($sql) === TRUE) {
        $sql1 = "SELECT *FROM employee";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while($row1 = $result1->fetch_assoc()) {
                $empID = $row1["id"];
                $sql2 = "INSERT INTO employeePayment (empId, month, salary) VALUES ($empID,'$month', $amount)";
                if ($conn->query($sql2) === TRUE) { 
                } else { $ok = false; }
            }
        }
        if($ok){ header("Location:index.php"); }
    } else {
        ?>
        <script>alert("Opps Something went wrong !!!");</script>
        <?php
    }

}


?>
<!DOCTYPE html>
<html>
    <title>Salary</title>
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
                <h5><b><i class="fa fa-inr"></i> Release Employees Salary</b></h5>
            </header>
            <div class="box w3-white w3-card w3-padding">
                <form action="" method="post">
                <p></p>
                <select class="w3-input" name="month">
                <option disabled selected>Select Month</option>
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

                <p>Total Amount to be paid</p>
                <?php
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
                ?>
                <input type="text" disabled class="w3-input"   value="<?php echo $total; ?>" >
                <input type="hidden"   value="<?php echo $total; ?>" name="amount">
                <p></p>
                <button class="w3-btn w3-blue" type="submit">Pay</button>
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
