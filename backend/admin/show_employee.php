<?php include('header.php');?>
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
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        <div align="right">
                            <a href="insert_employee.php">
                                <button>เพิ่มข้อมูล</button>
                            </a>
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>รหัสพนักงาน</th>
                                    <th>เลขพนักงาน</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ตําแหน่ง</th>
                                    <th>เบอร์โทร</th>                                   
                                    <th>กะการทำงาน</th>                                   
                                    <th>Username</th>
                                    <th>password</th>
                                    <th>status</th>
                                    
                                    
                                    
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                             $sql=" select * from tb_employee";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                        <td>
                                            <?=$row['employee_id'];?>
                                        </td>
                                        <td>
                                            <?=$row['employee_no'];?>
                                        </td>
                                        <td>
                                            <?=$row['employee_fullname'];?>
                                        </td>
                                        <td>
                                            <?=$row['employee_position'];?>
                                        </td>
                                        <td>
                                            <?=$row['employee_tel'];?>
                                        </td>
                                        <td>
                                            <?=$row['shiff_name'];?>
                                        </td>
                                        <td>
                                            <?=$row['employee_username'];?>
                                        </td>
                                        <td>
                                            <?=$row['employee_password'];?>
                                        </td>
                                        <td>
                                            <?=$row['employee_status'];?>
                                        </td>
                                        
                                         
                                        <td>
                                            <a href="update_employee.php?id=<?=$row['employee_id'];?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_employee.php?id=<?=$row['employee_id'];?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../image/delete.png" /></a>
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


    <?php include('footer.php');?>
