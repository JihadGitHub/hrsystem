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
            <p style='text-align:center'><img src='../image/logo.png'/></p>
             
            <h2 style='text-align:center'>รายงาน qr code</h2>
            <h3 style='text-align:center'>บริษัท เอ ดอทคอม จำกัด <br/>ที่อยู่ 33/4 ถนนประตูชัย อำเภอ พระนครศรีอยุธยา จังหวัดพระนครศรีอยุธยา</h3>
             
            <table id='bg-table' width='100%' style='border-collapse: collapse;font-size:12pt;margin-top:8px;'>
                    <tr style='border:1px solid #000;padding:4px;'>
                        <td  style='border-right:1px solid #000;padding:4px;text-align:center;'   width='10%'>ลำดับ</td>
                        <td  style='border-right:1px solid #000;padding:4px;text-align:center;'  width='15%'>ทะเบียนรถ</td>
                        <td  width='45%' style='border-right:1px solid #000;padding:4px;text-align:center;'>QR CODE</td>
                    </tr>

            </thead>
                <tbody>";

$mpdf->WriteHTML($head);
$content = "";
            $sql2=" SELECT * from tb_qr";
                   
            $result2=$cls_conn->select_base($sql2);
            $i=1;
            while($row2=mysqli_fetch_array($result2))
            {
                
            $qr=$row['qrcode_col1'].' '.$row['qrcode_col2'];
			
			$content .= '<tr style="border:1px solid #000;">
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  >'.$i.'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;" >'.$row2['qrcode_col1'].'</td>
				<td style="border-right:1px solid #000;padding:3px;text-align:center;"  ><barcode code="'.$row2['qrcode_col1'].'" size="0.8" type="QR" error="M" class="barcode" /></td>
			 
			</tr>';
			$i++;
		}
	 
$mpdf->WriteHTML($content);

$end = '</tbody>
</table>
<br/>
<h3 style="text-align:center">ชื่อผู้เบิก..................................          ชื่อผู้รับ..................................          ชื่อผู้อนุมัติ..................................</h3>
';
$mpdf->WriteHTML($end);
$mpdf->Output();

?>