<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>แก้ไขข้อมูลHR</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                    <?php 
                    if(isset($_GET['id'])) {
                        $id=$_GET['id'];
                        $sql = " SELECT * FROM tb_hr";
                        $sql.= " where";
                        $sql.= " hr_id=$id";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result))
                        {
                            $hr_id = $row['hr_id'];
                            $hr_no = $row['hr_no'];
                            $hr_fullname = $row['hr_fullname'];
                            $hr_email = $row['hr_email'];
                            $hr_tel = $row['hr_tel'];
                            $hr_username = $row['hr_username'];
                            $hr_password = $row['hr_password'];
                            $hr_status = $row['hr_status'];
                         }

                    }
                    
                    
                    ?>


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="hr_id" value="<?=$hr_id;?>">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hr_no">หมายเลขHR<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="hr_no" name="hr_no" value="<?=$hr_no;?>"  required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hr_fullname">ชื่อ-นามสกุล<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="hr_fullname" name="hr_fullname" value="<?=$hr_fullname;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hr_email">Email<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="hr_email" name="hr_email" value="<?=$hr_email;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hr_tel">เบอร์โทร<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="hr_tel" name="hr_tel" value="<?=$hr_no;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hr_username">USERNAME<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="hr_username" name="hr_username" value="<?=$hr_username;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                           
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hr_password">PASSWORD<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="hr_password" name="hr_password" value="<?=$hr_password;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                           
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hr_status">STATUS<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="hr_status" name="hr_status" value="<?=$hr_status;?>" required="required" class="form-control col-md-7 col-xs-12"> 
                                <option>--กรุณาเลือก--</option>
                                <option>0</option>
                                <option>1</option>

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
                            $hr_no=$_POST['hr_no'];
                            $hr_fullname=$_POST['hr_fullname'];
                            $hr_email=$_POST['hr_email'];
                            $hr_tel=$_POST['hr_tel'];
                            $hr_username=$_POST['hr_username'];
                            $hr_password=$_POST['hr_password'];
                            $hr_status=$_POST['hr_status'];
                         
                            $sql=" update tb_hr";
                            $sql.=" set";
                            $sql.=" hr_no='$hr_no'";
                            $sql.=" ,hr_fullname='$hr_fullname'";
                            $sql.=" ,hr_tel='$hr_tel'";
                            $sql.=" ,hr_username='$hr_username'";
                            $sql.=" ,hr_password='$hr_password'";
                            $sql.=" ,hr_status='$hr_status'";
                            $sql.=" where";
                            $sql.=" hr_id='$hr_id'";

                            
                            
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_hr.php');
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