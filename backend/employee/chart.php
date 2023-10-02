<?php include('header_emp.php');?>
    <title>แสดงข้อมูลเปอร์เซ็นต์งานในรูปแบบกราฟวงกลม</title>
    <!-- เพิ่มลิงก์ไปยังไฟล์ Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
 
    <form method="POST">


<style>
    .con {
        align-items: center;
        width: 40%;
        height: auto;
        font-size: 1.5rem;
        margin: 0 auto; /* ทำให้เนื้อหาอยู่กึ่งกลางในหน้าต่าง */
    }
    .con1{
        text-align: center;
    }

    @media (max-width: 776px) {
        .con {
            font-size: 1.5rem;
            width: 100%;
            display: block; /* เปลี่ยนกลับเป็นการแสดงแนวตั้งเต็มหน้าต่าง */
            text-align: left;
        }
    }
</style>


 <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แสดงข้อมูลพนักงาน </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


    <?php
    
    
    $timeMY = false;




if (isset($_POST['selectedMonth']) && isset($_POST['selectedYear'])) {
    $selectedMonth = $_POST['selectedMonth'];
    $selectedYear = $_POST['selectedYear'];

    switch ($selectedMonth) {
        case '1':
            $formattedMonth = 'มกราคม';
            break;
        case '2':
            $formattedMonth = 'กุมภาพันธ์';
            break;
        case '3':
            $formattedMonth = 'มีนาคม';
            break;
        case '4':
            $formattedMonth = 'เมษายน';
            break;
        case '5':
            $formattedMonth = 'พฤษภาคม';
            break;
        case '6':
            $formattedMonth = 'มิถุนายน';
            break;
        case '7':
            $formattedMonth = 'กรกฎาคม';
            break;
        case '8':
            $formattedMonth = 'สิงหาคม';
            break;
        case '9':
            $formattedMonth = 'กันยายน';
            break;
        case '10':
            $formattedMonth = 'ตุลาคม';
            break;
        case '11':
            $formattedMonth = 'พฤศจิกายน';
            break;
        case '12':
            $formattedMonth = 'ธันวาคม';
            break;
        default:
            $formattedMonth = ''; // Handle the default case
            break;
    }

    $resultMessage = " $formattedMonth  ปี: $selectedYear";
    $timeMY = true;

    
   

// ดึงข้อมูลจาก tb_leave
$sqlLeave = "SELECT COUNT(*) as total_leave FROM tb_leave WHERE leave_status = 'อนุมัติ' AND MONTH(leave_date) = $selectedMonth AND YEAR(leave_date) = $selectedYear";
$resultLeave = $cls_conn->select_base($sqlLeave); // ใช้ฟังก์ชัน select_base ที่คุณนิยามในคลาส class_conn
$rowLeave = mysqli_fetch_assoc($resultLeave);
$totalLeave = $rowLeave["total_leave"];



// ดึงข้อมูลจาก tb_late
$sqlLate = "SELECT COUNT(*) as total_late FROM tb_late  WHERE MONTH(late_date) = $selectedMonth AND YEAR(late_date) = $selectedYear";
$resultLate = $cls_conn->select_base($sqlLate);
$rowLate = mysqli_fetch_assoc($resultLate);
$totalLate = $rowLate["total_late"];

// ดึงข้อมูลจาก tb_attendance
$sqlAttendance = "SELECT COUNT(*) as total_attendance FROM tb_attendace  WHERE MONTH(attendace_date) = $selectedMonth AND YEAR(attendace_date) = $selectedYear";
$resultAttendance = $cls_conn->select_base($sqlAttendance);
$rowAttendance = mysqli_fetch_assoc($resultAttendance);
$totalAttendance = $rowAttendance["total_attendance"];

// ดึงจำนวนพนักงานจาก tb_employee
$sqlEmployee = "SELECT COUNT(*) as total_employee FROM tb_employee";
$resultEmployee = $cls_conn->select_base($sqlEmployee);
$rowEmployee = mysqli_fetch_assoc($resultEmployee);
$totalEmployee = $rowEmployee["total_employee"];

// คำนวณเปอร์เซ็นต์การลางาน
$percentLeave = ($totalLeave / $totalEmployee) * 100;

// คำนวณเปอร์เซ็นต์การมาสาย
$percentLate = ($totalLate / $totalEmployee) * 100;

// คำนวณเปอร์เซ็นต์การเข้างาน
$percentAttendance = ($totalAttendance / $totalEmployee) * 100;

// สร้างข้อมูลสำหรับแผนภูมิวงกลม
$absencesData = [
    'labels' => ["การลางาน", "การมาสาย", "การเข้างาน"],
    'datasets' => [
        [
            'data' => [$percentLeave, $percentLate, $percentAttendance],
            'backgroundColor' => ["red", "blue", "green"],
        ],
    ],
];
}
// ปิดการเชื่อมต่อฐานข้อมูล
$cls_conn->close();
?>
<div class="con1">
<select name="selectedMonth" id="selectedMonth">
    <option value="1">มกราคม</option>
    <option value="2">กุมภาพันธ์</option>
    <option value="3">มีนาคม</option>
    <option value="4">เมษายน</option>
    <option value="5">พฤษภาคม</option>
    <option value="6">มิถุนายน</option>
    <option value="7">กรกฎาคม</option>
    <option value="8">สิงหาคม</option>
    <option value="9">กันยายน</option>
    <option value="10">ตุลาคม</option>
    <option value="11">พฤศจิกายน</option>
    <option value="12">ธันวาคม</option>
</select>
<select name="selectedYear" id="selectedYear">
    <?php
    $currentYear = date("Y"); // ปีปัจจุบัน
    $yearsToDisplay = 10; // จำนวนปีที่จะแสดงย้อนหลังและรันล่วงหน้า

    // สร้างตัวเลือกปีสำหรับย้อนหลังและรันล่วงหน้า
    for ($i = $currentYear - $yearsToDisplay; $i <= $currentYear + $yearsToDisplay; $i++) {
        echo "<option value=\"$i\">$i</option>";
    }
    ?>
</select>
<input type="submit" value="แสดงข้อมูล">
</form>
</div>

    <div class="con">
        <canvas id="myChart"></canvas>
    </div>

    <?php if ($timeMY): ?>
            <div >
                <?php 
                
                echo $resultMessage; 


                // echo "<script type='text/javascript'>alert('$resultMessage');</script>";

                ?>

            </div>
        <?php endif; ?>


        </div>
        </div>
        </div>

    <script>
        // สร้างกราฟวงกลม
        const ctx = document.getElementById("myChart").getContext("2d");
        const myChart = new Chart(ctx, {
            type: "pie",
            data: <?php echo json_encode($absencesData); ?>,
        });
    </script>
<script>
    // เลือกส่วนของ dropdowns
    const selectedMonth = document.getElementById("selectedMonth");
    const selectedYear = document.getElementById("selectedYear");

    // สร้างตัวเลือกปีเมื่อหน้าเว็บโหลด
    window.addEventListener("load", function () {
        updateYearOptions(); // เรียกฟังก์ชันเพื่อสร้างตัวเลือกปีเริ่มต้น
    });

    // ดักจับการเปลี่ยนค่าใน dropdown เดือน
    selectedMonth.addEventListener("change", function () {
        updateYearOptions(); // เมื่อเลือกเดือนเปลี่ยนให้อัปเดตตัวเลือกปี
    });

    // ฟังก์ชันสำหรับสร้างตัวเลือกปี
    function updateYearOptions() {
        const currentYear = new Date().getFullYear();
        const selectedMonthValue = parseInt(selectedMonth.value, 10);

        // ล้างตัวเลือกปีทั้งหมด
        selectedYear.innerHTML = "";

        // สร้างตัวเลือกปีสำหรับปีปัจจุบันและปีประมาณ 10 ปีย้อนหลัง
        for (let i = currentYear; i >= currentYear - 10; i--) {
            // เพิ่มตัวเลือกปีเฉพาะเมื่อเลือกเดือนมีค่า
            if (selectedMonthValue !== 0) {
                selectedYear.innerHTML += `<option value="${i}">${i}</option>`;
            }
        }
    }
</script>

<?php include('footer_emp.php');?>
     