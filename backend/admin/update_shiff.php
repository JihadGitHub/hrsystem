<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>แก้ไขข้อมูลการเข้ากะ</h2>
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
                        $sqlu=" SELECT * FROM tb_shiff";
                        $sqlu.=" where";
                        $sqlu.=" shiff_id=$id";
                        $resultu=$cls_conn->select_base($sqlu);
                        while($rowu=mysqli_fetch_array($resultu))
                        {
                            $shiff_id=$rowu['shiff_id'];
                            $shiff_name=$rowu['shiff_name'];
                            $shiff_datetime=$rowu['shiff_datetime'];
                            $shiff_status=$rowu['shiff_status'];
                        }

                        }
                        ?>
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                        <input type="hidden" name="shiff_id" value="<?=$shiff_id;?>" />
                            
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="shiff_name">ชื่อกะ<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="shiff_name" name="shiff_name" value="<?=$shiff_name;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="shiff_starttime">เวลาเริ่ม<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="shiff_starttime" name="shiff_starttime" value="<?=$shiff_starttime;?> "required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>   
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="shiff_endtime">เวลาสิ้นสุด<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="shiff_endtime" name="shiff_endtime" value="<?=$shiff_endtime;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>  
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
                            $shiff_id=$_POST['shiff_id'];
                            $shiff_name=$_POST['shiff_name'];
                            $shiff_starttime=$_POST['shiff_starttime'];
                            $shiff_endtime=$_POST['shiff_endtime'];
                         
                            $sql=" update tb_shiff";
                            $sql.=" set";
                            $sql.=" shiff_name='$shiff_name'";
                            $sql.=" ,shiff_starttime='$shiff_starttime'";
                            $sql.=" ,shiff_endtime='$shiff_endtime'";
                            $sql.=" where";
                            $sql.=" shiff_id='$shiff_id'";
                            
                            
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('บันทึกข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_shiff.php');
                               
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