<?php include('header.php');?>

<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>แสดงข้อมูลกะการทำงาน </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                    <div align="right">
                        <a href="insert_shiff.php">
                            <button>เพิ่มข้อมูล</button>
                        </a>
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>รหัสพนักงาน</th>
                                <th>ชื่อ-สกุล</th>
                                <th>กะ</th>
                                <th>เวลาเข้า</th>
                                <th>เวลาออก</th>
                                <!-- <th>แก้ไข</th>
                                <th>ลบ</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $sql = "SELECT /* tb_shiff.shiff_id, */ tb_employee.employee_no, tb_employee.employee_fullname, tb_employee.shiff_name, tb_shiff.shiff_name, tb_shiff.shiff_starttime, tb_shiff.shiff_endtime
                            //         FROM tb_shiff
                            //         INNER JOIN tb_employee ON tb_shiff.shiff_name = tb_employee.shiff_name";

                            $sql = "SELECT /* tb_shiff.shiff_id, */ tb_employee.employee_no, tb_employee.employee_fullname, tb_employee.shiff_name, tb_shiff.shiff_name, tb_shiff.shiff_starttime, tb_shiff.shiff_endtime
                            FROM tb_shiff , tb_employee WHERE tb_shiff.shiff_name = tb_employee.shiff_name";

                            $result = $cls_conn->select_base($sql);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>    
                                    <!-- <td><?=$row['shiff_id'];?></td> -->
                                    <td><?=$row['employee_no'];?></td>
                                    <td><?=$row['employee_fullname'];?></td>
                                    <td><?=$row['shiff_name'];?></td>
                                    <td><?=$row['shiff_starttime'];?></td>
                                    <td><?=$row['shiff_endtime'];?></td>
                                        <!-- <td>
                                            <a href="update_shiff.php?id=<?=$row['shiff_id'];?>" onclick="return confirm('คุณต้องการแก้ไขหรือไม่?')">
                                                <img src="../../image/edit.png" />
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delete_shiff.php?id=<?=$row['shiff_id'];?>" onclick="return confirm('คุณต้องการลบหรือไม่?')">
                                                <img src="../../image/delete.png" />
                                            </a>
                                        </td> -->
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>
