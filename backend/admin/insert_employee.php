<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>เพิ่มข้อมูลพนักงาน</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_no">เลขผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_no" name="employee_no" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_fullname">ชื่อผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_fullname" name="employee_fullname" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_position">ตําแหน่งพนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_position" name="employee_position" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>   
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_tel">เบอร์โทรผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_tel" name="employee_tel" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>  


                        <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="shiff_name">กะการทํางาน<span class="required">:</span> </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select type="text" id="shiff_name" name="shiff_name" value="<?=$shiff_name;?>" required="required" class="form-control col-md-7 col-xs-12"> 
									<option>--กรุณาเลือก--</option>
                                        <?php
                                            $sql_shiff_name=" select * from tb_shiff";
                                            $rs_shiff_name=$cls_conn->select_base($sql_shiff_name);
                                            while($row_shiff_name=mysqli_fetch_array($rs_shiff_name))
                                            {
                                                ?>
                                                <option value="<?=$row_shiff_name['shiff_name'];?>"><?=$row_shiff_name['shiff_name'];?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
								</div>
							</div>     
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_username">Username<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_username" name="employee_username" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_password">รหัสผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_password" name="employee_password" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_status">สถานะผู้ใช้งาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="employee_status" name="employee_status" required="required" class="form-control col-md-7 col-xs-12"> 
                                <option> --กรุณาเลือก-- </option>
                                <option> 0 </option>
                                <option> 1 </option>
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
                            $employee_no=$_POST['employee_no'];
                            $employee_fullname=$_POST['employee_fullname'];
                            $employee_position=$_POST['employee_position'];
                            $employee_tel=$_POST['employee_tel'];
                            $shiff_name=$_POST['shiff_name'];
                            $employee_username=$_POST['employee_username'];
                            $employee_password=$_POST['employee_password'];
                            $employee_status=$_POST['employee_status'];
                         
                            $sql=" insert into tb_employee(employee_no,employee_fullname,employee_position,employee_tel,shiff_name,employee_username,employee_password,employee_status)";
                            $sql.=" values ('$employee_no','$employee_fullname','$employee_position','$employee_tel','$shiff_name','$employee_username','$employee_password','$employee_status')";
                            
                            // echo $sql;
                            // echo $shiff_name;
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(0,'show_employee.php');
                               
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