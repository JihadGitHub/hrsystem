<?php include '../class_conn.php';?>
<?php if (isset($_SESSION['employee_id'])) {

?>
<?php
$employee_id=$_SESSION['employee_id'];
$employee_status=$_SESSION['employee_status'];
if ($employee_status!='1'){
//Hearder("location: login.php");
}

//query member login
$queryemp = " select * from  tb_employee WHERE employee_id=$employee_id";
$resultm = mysqli_query($class_conn, $queryemp) or die ("Error in query: $queryemp " . mysqli_error($class_conn));
$rowm = mysqli_fetch_array($resultm);
//เวลาปัจจุบัน
$timenow = date('H:i:s');
$datenow = date('Y-m-d');
//เวลาที่บันทึก
$queryworkio = "SELECT MAX(workdate) as lastdate, workin, workout FROM tb_attendace WHERE employee_id=$employee_id AND workdate='$datenow' ";
$resultio = mysqli_query($class_conn, $queryworkio) or die ("Error in query: $queryworkio " . mysqli_error($class_conn));
$rowio = mysqli_fetch_array($resultio);
print_r($rowio);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">WORK IO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="workin.php">Check Time</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="leave.php">Leave</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">other</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col col-md-3">
                <?php ?>
            </div>
        </div>
    </div>
    
    
    </nav> 
    <img src="image\calendar.png" alt="">
</body>
    
<?php
} else { ?>

    <script>
        window.location = 'login_1.php'
    </script>";

<?php } ?>