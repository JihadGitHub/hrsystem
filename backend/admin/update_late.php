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
                        $sql = " SELECT * FROM tb_late";
                        $sql.= " where";
                        $sql.= " late_id=$id";
                        $result = $cls_conn->select_base($sql);
                        while ($row = mysqli_fetch_array($result))
                        {
                            $late_id = $row['late_id'];
                            $employee_id = $row['employee_id'];
                            $late_date = $row['late_date'];
                            $late_time = $row['late_time'];
                            $late_remark = $row['late_remark'];
                            $late_status = $row['late_status'];
                            $late_datetime = $row['late_datetime'];
                         }

                    }
                    
                    
                    ?>


                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="late_id" value="<?=$late_id;?>">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">รหัสพนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="employee_id" name="employee_id" value="<?=$employee_id;?>"  required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="late_date">วันที่<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="late_date" name="late_date" value="<?=$late_date;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="late_time">เวลาที่สาย<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="late_time" name="late_time" value="<?=$late_time;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="late_remark">Remark<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="late_remark" name="late_remark" value="<?=$late_remark;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>    
                           
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="late_status">สถานะ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="late_status" name="late_status" value="<?=$late_status;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>  
                        </div>    
                           
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="late_datetime">วัน-เวลา ที่สาย<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="datetime-local" id="late_datetime" name="late_datetime" value="<?=$late_datetime;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>  
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
                            $late_date=$_POST['late_date'];
                            $late_time=$_POST['late_time'];
                            $late_remark=$_POST['late_remark'];
                            $late_status=$_POST['late_status'];
                            $late_datetime=$_POST['late_datetime'];
                         
                            $sql=" update tb_late";
                            $sql.=" set";
                            $sql.=" employee_id='$employee_id'";
                            $sql.=" ,late_date='$late_date'";
                            $sql.=" ,late_time='$late_time'";
                            $sql.=" ,late_remark='$late_remark'";
                            $sql.=" ,late_status='$late_status'";
                            $sql.=" ,late_datetime='$late_datetime'";
                            $sql.=" where";
                            $sql.=" late_id='$late_id'";

                            
                            
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_late.php');
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