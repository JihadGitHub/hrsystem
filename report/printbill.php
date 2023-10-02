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
             
            <h2 style='text-align:center'>ใบเสร็จรับเงิน</h2>
            <h3 style='text-align:center'>มัฆวันอพาร์ตเมนท์ <br/>ที่อยู่  ที่อยู่ 20/51 มัฆวันอพาร์ตเมนท์ ตําบล ตลาดใหญ่  อําเภอเมืองภูเก็ต ภูเก็ต  83000  จังหวัด ภูเก็ต</h3>
             <h3 style='text-align:right'>หมายเลขใบเสร็จ ".$_GET['bill_no']."</h3>
			  <h3 style='text-align:right'>หมายเลขห้อง ".$_GET['room_no']."</h3>
			  <h3 style='text-align:right'>วันที่ออกใบเสร็จรับเงิน ".$_GET['bill_date']."</h3>
			  <h3 style='text-align:left'>ชื่อลูกค้า ".$_GET['customer_name']."</h3>
            <table id='bg-table' width='100%' style='border-collapse: collapse;font-size:12pt;margin-top:8px;'>
                    <tr style='border:1px solid #000;padding:4px;'>
                        <td  style='border-right:1px solid #000;padding:4px;text-align:center;'   width='10%'>ลำดับ</td>
						<td  style='border-right:1px solid #000;padding:4px;text-align:center;'  width='15%'>หมายเลขห้องเช่า</td>
						<td  style='border-right:1px solid #000;padding:4px;text-align:center;'  width='15%'>ค่าเช่า</td>
                        <td  style='border-right:1px solid #000;padding:4px;text-align:center;'  width='15%'>ค่าปรับ</td>
						<td  style='border-right:1px solid #000;padding:4px;text-align:center;'  width='15%'>ค่านํ้า</td>
						<td  style='border-right:1px solid #000;padding:4px;text-align:center;'  width='15%'>ค่าไฟ</td>
                        <td  width='45%' style='border-right:1px solid #000;padding:4px;text-align:center;'>วันที่จดบันทึก</td>
                    </tr>

            </thead>
                <tbody>";

$mpdf->WriteHTML($head);
$content = "";
            $sql2="  SELECT
tb_bill.bill_id,
tb_bill.bill_no,
tb_room.room_no,
tb_bill.bill_date,
tb_billdetail.billdetail_rentprice,
tb_billdetail.billdetail_rentfine,
tb_billdetail.billdetail_water,
tb_billdetail.billdetail_electricity,
tb_customer.customer_name,
tb_customer.customer_lastname,
tb_staff.staff_name,
tb_staff.staff_lastname,
tb_billdetail.billdetail_status
FROM
tb_bill
INNER JOIN tb_billdetail ON tb_bill.bill_id = tb_billdetail.bill_id
INNER JOIN tb_rent ON tb_billdetail.rent_id = tb_rent.rent_id
INNER JOIN tb_room ON tb_rent.room_id = tb_room.room_id
INNER JOIN tb_customer ON tb_billdetail.customer_id = tb_customer.customer_id
INNER JOIN tb_staff ON tb_billdetail.staff_id = tb_staff.staff_id
";
            $sql2.=" where";
		    $sql2.=" tb_bill.bill_id='".$_GET['id']."'";
            $result2=$cls_conn->select_base($sql2);
            $i=1;
            while($row2=mysqli_fetch_array($result2))
            {
                
              
			$content .= '<tr style="border:1px solid #000;">
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row2['room_no'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row2['billdetail_rentprice'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row2['billdetail_rentfine'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row2['billdetail_water'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row2['billdetail_electricity'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$row2['bill_date'].'</td>
			 
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