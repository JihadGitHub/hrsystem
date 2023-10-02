 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>jquery ui datepickerภาษาไทย ปี พ.ศ.</title> 

 


</head> 
 <body>
<link rel="stylesheet" type="text/css" href="http://123.242.165.136/webtak/component/datepicker_th/css/ui-darkness/jquery-ui-1.8.12.custom.css">
<script type="text/javascript" src="http://123.242.165.136/webtak/component/datepicker_th/js/jquery-1.5.1.min.js"></script> 
<script type="text/javascript" src="http://123.242.165.136/webtak/component/datepicker_th/js/jquery-ui-1.8.12.custom.min.js"></script> 
<script type="text/javascript" src="http://123.242.165.136/webtak/component/datepicker_th/js/datepicker.js"></script> 
<style type="text/css"> 
/* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */
.ui-datepicker{
	width:210px;
	font-family:tahoma;
	font-size:11px;
	text-align:center;
}
</style> 
<script type="text/javascript"> 
$(function(){
    setminDate("+0d");  //กำหนดจำนวนวัน ก่อนวันปัจจุบัน
    setDatepicker("#dateInput");
});
</script>
 
วันที่
<input type="text" name="dateInput" id="dateInput" />
 </body> 
</html>