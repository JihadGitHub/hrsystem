<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>เพิ่มข้อมูลการลา</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">รหัสพนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_id" name="employee_id" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="leave_date">วันที่<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="leave_date" name="leave_date" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="leave_starttime">เวลาเริ่มลางาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="leave_starttime" name="leave_starttime" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="leave_endtime">เวลาสิ้นสุดการลา<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="leave_endtime" name="leave_endtime" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="leave_hr">HR<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="float" id="leave_hr" name="leave_hr" required="required" class="form-control col-md-7 col-xs-12"> 
                                <option>--กรุณาเลือก--</option>
                                    <?php 
                                        $sql_hr_fullname=" select * from tb_hr";
                                        $rs_hr_fullname=$cls_conn->select_base($sql_hr_fullname);
                                        while($row_hr_fullname=mysqli_fetch_array($rs_hr_fullname))
                                        {
                                            ?>
                                            <option value="<?=$row_hr_fullname['hr_fullname'];?>"><?=$row_hr_fullname['hr_fullname'];?> </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="leave_note">ข้อความ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="leave_note" name="leave_note" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="leave_status">สถานะ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="leave_status" name="leave_status" required="required" class="form-control col-md-7 col-xs-12"> 
                                <option>รอดำเนินการ</option>
                                <option>อนุมัติ</option>
                                <option>ไม่อนุมัติ</option>

                                </select>
                            </div>
                        </div>    
                           
 
                           
 
 
                           
 
                            
                            
                           
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
                                    <button type="reset" name="reset" class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit']))
                        {
                            $employee_id=$_POST['employee_id'];
                            $leave_date=$_POST['leave_date'];
                            $leave_starttime=$_POST['leave_starttime'];
                            $leave_endtime=$_POST['leave_endtime'];
                            $leave_hr=$_POST['leave_hr'];
                            $leave_note=$_POST['leave_note'];
                            $leave_status=$_POST['leave_status'];
                         
                            $sql=" insert into tb_leave(employee_id,leave_date,leave_starttime,leave_endtime,leave_hr,leave_note,leave_status)";
                            $sql.=" values ('$employee_id','$leave_date','$leave_starttime','$leave_endtime','$leave_hr','$leave_note','$leave_status')";
                            
                            
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_leave.php');
                            }
                            else
                            {
                                 echo $cls_conn->show_message('บันทึกข้อมูลไม่สำเร็จ');
                                 echo $sql;
                            }
                        }
                        
                        ?>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php');?>