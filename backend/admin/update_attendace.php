<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>แก้ไขข้อมูลมาสาย</h2>
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
                        $sql = " SELECT * FROM tb_attendace";
                        $sql.= " where";
                        $sql.= " attendace_id=$id";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result))
                        {
                            $attendace_id = $row['attendace_id'];
                            $employee_id = $row['employee_id'];
                            $attendace_date = $row['attendace_date'];
                            $attendace_timein = $row['attendace_timein'];
                            $attendace_timeout = $row['attendace_timeout'];
                            $attendace_status = $row['attendace_status'];
                         }

                    }
                    
                    
                    ?>


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="attendace_id" value="<?=$attendace_id;?>">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">รหัสพนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_id" name="employee_id" value="<?=$employee_id;?>"  required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="attendace_date">วันที่<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="attendace_date" name="attendace_date" value="<?=$attendace_date;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="attendace_timein">เวลาเข้า<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="attendace_timein" name="attendace_timein" value="<?=$attendace_timein;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="attendace_timeout">เวลาออก<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="attendace_timeout" name="attendace_timeout" value="<?=$attendace_timeout;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                           
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="attendace_status">สถานะ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="attendace_status" name="attendace_status" value="<?=$attendace_status;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>  
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
                            $attendace_date=$_POST['attendace_date'];
                            $attendace_timein=$_POST['attendace_timein'];
                            $attendace_timeout=$_POST['attendace_timeout'];
                            $attendace_status=$_POST['attendace_status'];
                         
                            $sql=" update tb_attendace";
                            $sql.=" set";
                            $sql.=" employee_id='$employee_id'";
                            $sql.=" ,attendace_date='$attendace_date'";
                            $sql.=" ,attendace_timein='$attendace_timein'";
                            $sql.=" ,attendace_timeout='$attendace_timeout'";
                            $sql.=" ,attendace_status='$attendace_status'";
                            $sql.=" where";
                            $sql.=" attendace_id='$attendace_id'";

                            
                            
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_attendace.php');
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