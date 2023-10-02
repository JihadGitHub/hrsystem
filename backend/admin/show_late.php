<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>แสดงข้อมูลการมาสาย </h2>
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
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>รหัสการมาสาย</th>
                                    <th>รหัสพนักงาน</th>
                                    <th>วันที่มาสาย</th>
                                    <th>เวลาที่มาสาย</th>
                                    <th>Remark</th>
                                    <th>สถานะการมาสาย</th>
                                    <th>วัน-เวลาที่มาสาย</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                    

                                </tr>
                            </thead>


                            <tbody>
                                <?php
                             $sql=" select * from tb_late";
                             $result=$cls_conn->select_base($sql);
                             while($row=mysqli_fetch_array($result))
                             {
                                 ?>
                                    <tr>
                                        <td>
                                            <?=$row['late_id'];?>
                                        </td>
                                        <td>
                                            <?=$row['employee_id'];?>
                                        </td>
                                        <td>
                                            <?=$row['late_date'];?>
                                        </td>
                                        <td>
                                            <?=$row['late_time'];?>
                                        </td>
                                        <td>
                                            <?=$row['late_remark'];?>
                                        </td>
                                        <td>
                                            <?=$row['late_status'];?>
                                        </td>
                                        <td>
                                            <?=$row['late_datetime'];?>
                                        </td>
                                        <td>
                                            <a href="update_late.php?id=<?=$row['late_id'];?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')"><img src="../../image/edit.png" /></a>
                                        </td>
                                        <td>
                                            <a href="delete_admin.php?id=<?=$row['late_id'];?>" onclick="return confirm('คุณต้องการลบหรือไม่?')"><img src="../../image/delete.png" /></a>
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
