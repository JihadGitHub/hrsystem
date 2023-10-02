<?php
include('../class_conn.php');
$cls_conn=new class_conn;
include('../mpdf/mpdf.php');
$mpdf=new mPDF();
$head="
           <style>
                body{
                    font-family: 'THSarabun';//เรียกใช้font Garuda สำหรับแสดงผล ภาษาไทย
                }
            </style>
            <p style='text-align:center'><img src='../image/DSC09938.JPG'/></p>
             
            <h2 style='text-align:center'>ใบเสร็จ การจอง</h2>
            <h3 style='text-align:center'>มัฆวันอพาร์ตเมนท์ <br/>ที่อยู่  ที่อยู่ 20/51 มัฆวันอพาร์ตเมนท์ ตําบล ตลาดใหญ่  อําเภอเมืองภูเก็ต ภูเก็ต  83000  จังหวัด ภูเก็ต</h3>
             <h3 style='text-align:right'>หมายเลขการจอง".$_GET['booking_no']."</h3>
			  <h3 style='text-align:left'>ชื่อลูกค้า".$_GET['customer_name']."</h3>
            <table id='bg-table' width='100%' style='border-collapse: collapse;font-size:12pt;margin-top:8px;'>
                    <tr style='border:1px solid #000;padding:4px;'>
                        <td  style='border-right:1px solid #000;padding:4px;text-align:center;'   width='10%'>ลำดับ</td>
                        <td  style='border-right:1px solid #000;padding:4px;text-align:center;'  width='15%'>หมายเลขห้อง</td>
                        <td  width='45%' style='border-right:1px solid #000;padding:4px;text-align:center;'>วันที่ทําการจอง</td>
                    </tr>

            </thead>
                <tbody>";

$mpdf->WriteHTML($head);
$content = "";
            $sql2=" SELECT
                                    tb_booking.booking_id,
                                    tb_booking.booking_no,
                                    tb_room.room_no,
                                    tb_customer.customer_name,
                                    tb_customer.customer_lastname,
                                    tb_booking.booking_date,
                                    tb_booking.booking_status,
                                    tb_staff.staff_name,
                                    tb_staff.staff_lastname
                                    FROM
                                    tb_booking
                                    INNER JOIN tb_room ON tb_booking.room_id = tb_room.room_id
                                    INNER JOIN tb_customer ON tb_booking.customer_id = tb_customer.customer_id
                                    INNER JOIN tb_staff ON tb_booking.staff_id = tb_staff.staff_id";
            $sql2.=" where";
		    $sql2.=" tb_booking.booking_id='".$_GET['id']."'";
            $result2=$cls_conn->select_base($sql2);
            $i=1;
            while($row2=mysqli_fetch_array($result2))
            {
                
              
			$content .= '<tr style="border:1px solid #000;">
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row2['room_no'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row2['booking_date'].'</td>
			 
			</tr>';
			$i++;
		}
	 
$mpdf->WriteHTML($content);
$staff_name=$_GET['staff_name'];
$end = "</tbody>
</table>
<br/>
<h3 style=text-align:center> ชื่อพนักงาน  ". $staff_name."</h3>
";
$mpdf->WriteHTML($end);
$mpdf->Output();

?>