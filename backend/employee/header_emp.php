<?php session_start();?>
<?php include('../../class_conn.php');?>
<?php $cls_conn=new class_conn;?>
 
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Employee</title>
            <!-- Bootstrap -->
            <link href="../template/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome -->
            <link href="../template/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <!-- NProgress -->
            <link href="../template/vendors/nprogress/nprogress.css" rel="stylesheet">
            <!-- iCheck -->
            <link href="../template/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
            <!-- bootstrap-progressbar -->
            <link href="../template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
            <!-- JQVMap -->
            <link href="../template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
            <!-- bootstrap-daterangepicker -->
            <link href="../template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
            <!-- Custom Theme Style -->
            <link href="../template/build/css/custom.min.css" rel="stylesheet">
            <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
            <link rel="stylesheet" href="../template/fontawesome-free-6.4.0-web/css/all.css">
            <link rel="stylesheet" href="https://fontawesome.com/icons/file-medical?f=classic&s=regular">
            

            <style>
            .topic {
                float: left;
                font-size: 20px;
                margin: 0;
                padding-top: 16px;
                padding-bottom: 16px;
            }

            </style>

            
            </head>

        <body class="nav-md">
            <div class="container body">
                <div class="main_container">
                    <div class="col-md-3 left_col">
                        <div class="left_col scroll-view">
                            <div class="navbar nav_title" style="border: 0;"><center><img src="../../image/logo1.png" width="70px" height="65px" /></center> </div>
                            <div class="clearfix"></div>
                            <!-- menu profile quick info -->
                            <div class="profile clearfix" style="margin-left:20px;" >
                                <!-- <div class="profile_pic"> </div> --> 
                                <div class="profile_info" style="text-align :left;"> <span>ยินดีต้อนรับเข้าสู่ระบบ</span>
                                    <h2 style="text-align :center; font-size: 18px;"><?=isset($_SESSION['user_name']);?></h2> </div>
                            </div>
                            <!-- /menu profile quick info -->
                            <br />
                            <!-- sidebar menu -->
                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                <div class="menu_section">
                                    <h3>เมนูการเข้างาน</h3>
                                    <ul class="nav side-menu"> 
                                        <li><a><i class="fa-solid fa-user-clock" style="font-size:18px"></i> การเข้างาน<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="show_attendace_emp.php"><i class="fa-solid fa-clock" style="font-size:18px"></i> เวลาเข้างาน</a></li>
                                                <li><a href="show_late_emp.php"><i class="fa-solid fa-clock-rotate-left" style="font-size:18px"></i> เข้างานสาย</a></li>
                                               
                                                
                                            </ul>
                                        </li>

                                        <h3>เมนูการลา</h3>
                                        <li><a><i class="fa fa-bed" style="font-size:18px"></i> การลา<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="insert_leave_emp.php"><i class="fa fa-plus"></i>เขียนคำขอลางาน</a></li>
                                                <li><a href="show_leave_emp.php"><i class="fa fa-file-text"></i>คำขอลางาน</a></li>
                                                
                                               
                                                
                                            </ul>
                                        </li>

                                        <h3>การมา, สาย, ลา ของพนักงาน</h3>
                                        <li><a href="chart.php"><i class="fa-solid fa-chart-pie" style="font-size:18px"></i> แสดงแผนภูมิ</a></li>

                                        
                                        
                                        <li><a href="logout.php"><i class="fa fa-sign-out"></i>ออกจากระบบ</a></li>
         
                                    </ul>
                                </div>
                            </div>
                            <!-- /sidebar menu -->
                            <!-- /menu footer buttons -->
                            <!--  <div class="sidebar-footer hidden-small">
                                <a data-toggle="tooltip" data-placement="top" title="Settings"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a>
                                <a data-toggle="tooltip" data-placement="top" title="FullScreen"> <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span> </a>
                                <a data-toggle="tooltip" data-placement="top" title="Lock"> <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> </a>
                                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html"> <span class="glyphicon glyphicon-off" aria-hidden="true"></span> </a>
                            </div> -->
                            <!-- /menu footer buttons -->
                        </div>
                    </div>
                    <!-- top navigation -->
                    <div class="top_nav">
                        <div class="nav_menu">
                            <nav>
                                <div class="nav toggle"> <a id="menu_toggle"><i class="fa fa-bars"></i></a> </div>
                                <ul class="nav navbar-nav navbar-left">
                                <a class="nav topic">ระบบเช็คเวลาเข้า-ออกงาน</a>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">  <?=isset($_SESSION['user_name']);?> <span class=" fa fa-angle-down"></span> </a>
                                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                                            <!-- <li><a href="javascript:;">แก้ไขข้อมูลส่วนตัว</a></li> -->
                                            <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>ออกจากระบบ</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /top navigation -->
                    <!-- page content -->
        