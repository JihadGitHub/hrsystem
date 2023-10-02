<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
            <link rel="stylesheet" type="text/css" href="http://sysapp.itoffside.com/datetimepicker/jquery.datetimepicker.css">
            <script type="text/javascript" src="http://sysapp.itoffside.com/datetimepicker/jquery.js"></script>
            <script type="text/javascript" src="http://sysapp.itoffside.com/datetimepicker/jquery.datetimepicker.js"></script>

    </head>
    <body style="text-align: center;margin-top: 50px;">
        
            <input type="text" name="startdate" value="" id="startdate" />
         
        <script type="text/javascript">
            jQuery('#startdate').datetimepicker({
                lang:'th',
                timepicker:false,
                format:'d/m/Y'
            });
        </script>
    </body>
</html>
