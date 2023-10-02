<?php include('header_emp.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แสดงข้อมูลการลา </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <div align="right">
                            <a href="insert_leave_emp.php">
                                <button>เพิ่มข้อมูล</button>
                            </a>
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>รหัสพนักงาน</th>
                                    <th>วันที่</th>
                                    <th>เวลาเริ่มลา</th>
                                    <th>เวลาสิ้นสุดการลา</th>
                                    <th>HR</th>
                                    <th>ข้อความ</th>
                                    <th>สถานะ</th>
                                    
                                    
                                    
                                    
                                      
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                             $sql=" select * from tb_leave";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                        <td>
                                            <?=$row['employee_id'];?>
                                        </td>
                                        <td>
                                            <?=$row['leave_date'];?>
                                        </td>
                                        <td>
                                            <?=$row['leave_starttime'];?>
                                        </td>
                                        <td>
                                            <?=$row['leave_endtime'];?>
                                        </td>
                                        <td>
                                            <?=$row['leave_hr'];?>
                                        </td>
                                        <td>
                                            <?=$row['leave_note'];?>
                                        </td>
                                        <td>
                                            <?=$row['leave_status'];?>
                                        </td>
                                        
                                        
                                         
                                        <td>
                                            <a href="update_leave_emp.php?id=<?=$row['leave_id'];?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_leave.php?id=<?=$row['leave_id'];?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../image/delete.png" /></a>
                                        </td>
                                    </tr>
                                    <?php
                             }
                          ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>

    </div>


    <?php include('footer_emp.php');?>
