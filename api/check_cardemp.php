<?php
// กำหนดข้อมูลเชื่อมต่อฐานข้อมูล
$servername = "localhost"; // แก้ไขตามเซิร์ฟเวอร์ของคุณ
$username = "root"; // แก้ไขตามชื่อผู้ใช้ฐานข้อมูลของคุณ
$password = "12345678"; // แก้ไขตามรหัสผ่านของคุณ
$dbname = "db_leavesystem"; // แก้ไขตามชื่อฐานข้อมูลของคุณ

// สร้างการเชื่อมต่อฐานข้อมูล
$conn2 = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn2->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn2->connect_error);
}

// สร้างคำสั่ง SQL เพื่อเลือกข้อมูลจากตาราง tb_cardemp และ tb_employee
$sql = "SELECT tb_cardemp.cardemp_no, tb_employee.employee_id, tb_employee.employee_no
        FROM tb_cardemp
        INNER JOIN tb_employee ON tb_cardemp.employee_id = tb_employee.employee_id";
$sql .= " WHERE";
$sql .= " tb_cardemp.cardemp_no='$log_key'";

// ส่งคำสั่ง SQL ไปยังฐานข้อมูล
$result = $conn2->query($sql);

// ตรวจสอบว่ามีข้อมูลที่ตรงกันหรือไม่
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "cardemp_no: " . $row["cardemp_no"] . " ตรงกับ employee_no: " . $row["employee_no"] . "<br>";
        $employee_no = $row['employee_no'];
        $employee_id = $row['employee_id'];
    }
} else {
    echo "ไม่พบการตรงคู่ระหว่าง cardemp_no และ employee_no";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn2->close();

$database = $dbname;
// สร้างการเชื่อมต่อฐานข้อมูล
$conn3 = new mysqli($servername, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if ($conn3->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn3->connect_error);
}

date_default_timezone_set('Asia/Bangkok');
$dd = date('Y-m-d');
$tt = date('H:i:s');
$cur_time = date('Y-m-d H:i:s');

$employee_no = trim($employee_no);

$trimmedString = trim($employee_no);
$noSpacesString = str_replace(' ', '', $trimmedString);

echo "<br/>";


//เช็คเวลาออกงานหรือไม่
$sqlout = "SELECT employee_no, TIMESTAMPDIFF(MINUTE, shiff_endtime, '$cur_time') as time_out FROM tb_shiff";
$sqlout .= " WHERE";
$sqlout .= " employee_no='$noSpacesString'";
$sqlout .= " AND";
$sqlout .= " TIMESTAMPDIFF(MINUTE, shiff_endtime, '$cur_time') >= 0 ";
echo "<br/>";
echo $sqlout;
echo "<br/>";

// ส่งคำสั่ง SQL ไปยังฐานข้อมูล
$resultout = $conn3->query($sqlout);
if ($resultout->num_rows >= 1) {
    echo "บันทึกเวลาออกจากงานสำเร็จ";
    $sqlo = " select * from tb_attendace";
    $sqlo .= " where";
    $sqlo .= " employee_id='$employee_id'";
    $sqlo .= " order by ";
    $sqlo .= " attendace_id desc ";
    $sqlo.=" limit 1";
    echo "<br>";
    echo $sqlo;

    $resulto = $conn3->query($sqlo);
    $rowout = mysqli_fetch_array($resulto);
    $attendace_id = $rowout['attendace_id'];

    $time_out = date('H:i:s');
    $sql02 = " update tb_attendace";
    $sql02 .= " set";
    $sql02 .= " attendace_timeout='$time_out'";
    $sql02 .= " where";
    $sql02 .= " attendace_id='$attendace_id'";
    echo "<br>";
    echo $sql02;
     $conn3->query($sql02);

}
else{
    


// ตรวจสอบผลลัพธ์



// คำสั่ง SQL เพื่อหา employee_no ที่สายเกิน 5 นาที
$sql3 = "SELECT employee_no, TIMESTAMPDIFF(MINUTE, shiff_starttime, '$cur_time') as timelate FROM tb_shiff";
$sql3 .= " WHERE";
$sql3 .= " employee_no='$noSpacesString'";
$sql3 .= " AND";
$sql3 .= " TIMESTAMPDIFF(MINUTE, shiff_starttime, '$cur_time') > 5 ";
echo "<br/>";
echo $sql3;
echo "<br/>";

// ส่งคำสั่ง SQL ไปยังฐานข้อมูล
$result3 = $conn3->query($sql3);

// ตรวจสอบผลลัพธ์
if ($result3->num_rows >= 1) {
    $sql4 = "SELECT * FROM `tb_employee` WHERE employee_no = '$noSpacesString'";
    $result4 = $conn3->query($sql4);
    $row4 = mysqli_fetch_array($result4);
    $employee_id = $row4['employee_id'];

    echo "พบการสายเกิน 5 นาที สำหรับ employee_no ต่อไปนี้:<br>";
    $sql5 = "INSERT INTO `tb_late`(`employee_id`, `late_date`, `late_time`, `late_remark`, `late_status`, `late_datetime`)
             VALUES ('$employee_id', '$dd', '$tt', '1', '1', '$cur_time')";
    $conn3->query($sql5);
    while ($row3 = $result3->fetch_assoc()) {
        echo $row3["employee_no"] . "<br>";
    }
} else {
    $sql6 = "SELECT * FROM `tb_employee` WHERE employee_no = '$noSpacesString'";
    $result6 = $conn3->query($sql6);
    $row6 = mysqli_fetch_array($result6);
    $employee_id = $row6['employee_id'];

    $sql7 = "INSERT INTO `tb_attendace`(`employee_id`, `attendace_date`, `attendace_timein`, `attendace_timeout`, `attendace_status`) 
             VALUES ('$employee_id', '$dd', '$tt', '', '1')";
    $conn3->query($sql7);

    echo "ไม่พบการสายเกิน 5 นาที";
}
}
// ปิดการเชื่อมต่อฐานข้อมูล
$conn3->close();
?>
