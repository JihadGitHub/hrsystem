<?php include('header.php');?>
		<div class="right_col" role="main">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>แก้ไขข้อมูลพนักงาน</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
								<li><a class="close-link"><i class="fa fa-close"></i></a> </li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<br />
							<?php
							if(isset($_GET['id']))
							{
								
							$id=$_GET['id'];
							$sqlu=" SELECT * FROM tb_employee";
							$sqlu.=" where";
							$sqlu.=" employee_id=$id";	
							$resultu=$cls_conn->select_base($sqlu);
							while($rowu=mysqli_fetch_array($resultu))
							{
								$employee_id=$rowu['employee_id'];
								$employee_no=$rowu['employee_no'];
								$employee_fullname=$rowu['employee_fullname'];
								$employee_position=$rowu['employee_position'];
								$employee_tel=$rowu['employee_tel'];
								$shiff_id=$rowu['shiff_name'];
								$employee_status=$rowu['employee_status'];
								$employee_username=$rowu['employee_username'];
								$employee_password=$rowu['employee_password'];
							}
							
							}
							?>
							<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
								<input type="hidden" name="employee_id" value="<?=$employee_id;?>" />
								
							 <div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_no">หมายเลขพนักงาน<span class="required">:</span> </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="employee_no" name="employee_no" value="<?=$employee_no;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_fullname">ชื่อ-นามสกุล<span class="required">:</span> </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="employee_fullname" name="employee_fullname" value="<?=$employee_fullname;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
							</div>
								
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_position">ตําแหน่ง<span class="required">:</span> </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="employee_position" name="employee_position" value="<?=$employee_position;?>"  required="required" class="form-control col-md-7 col-xs-12"> </div>
							</div>
								
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_tel">เบอร์โทร<span class="required">:</span> </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="employee_tel" name="employee_tel" value="<?=$employee_tel;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
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
									<input type="text" id="employee_username" name="employee_username" value="<?=$employee_username;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
							</div>  

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_password">รหัสผู้ใช้งาน<span class="required">:</span> </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="employee_password" name="employee_password" value="<?=$employee_password;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
							</div>    

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_status">สถานะ<span class="required">:</span> </label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select type="text" id="employee_status" name="employee_status" value="<?=$employee_status;?>" required="required" class="form-control col-md-7 col-xs-12"> 
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
								$employee_id=$_POST['employee_id'];
								$employee_no=$_POST['employee_no'];
								$employee_fullname=$_POST['employee_fullname'];
								$employee_position=$_POST['employee_position'];
								$employee_tel=$_POST['employee_tel'];
								$shiff_name=$_POST['shiff_name'];
								$employee_username=$_POST['employee_username'];
								$employee_password=$_POST['employee_password'];
							  	$employee_status=$_POST['employee_status'];

								$sql=" update tb_employee";
								$sql.=" set";
								$sql.=" employee_no='$employee_no'";
								$sql.=" ,employee_fullname='$employee_fullname'";
								$sql.=" ,employee_position='$employee_position'";
								$sql.=" ,employee_tel='$employee_tel'";
								$sql.=" ,shiff_name='$shiff_name'";
								$sql.=" ,employee_username='$employee_username'";
								$sql.=" ,employee_password='$employee_password'";
								$sql.=" ,employee_status='$employee_status'";
								$sql.=" where";
								$sql.=" employee_id='$id'";
								

								if($cls_conn->write_base($sql)==true)
								{
									echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
									echo $cls_conn->goto_page(1,'show_employee.php');
									// echo $sql;
								}
								else
								{
									 echo $cls_conn->show_message('แก้ไขข้อมูลไม่สำเร็จ');
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