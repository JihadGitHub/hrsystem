<?php include('header.php');?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>แก้ไขข้อมูลบัตรพนักงาน</h2>
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
                        $sqlu=" select * from tb_cardemp";
                        $sqlu.=" where";
                        $sqlu.=" cardemp_id='$id'";
                        $resultu=$cls_conn->select_base($sqlu);
                        while($rowu=mysqli_fetch_array($resultu))
                        {
                            $cardemp_id=$rowu['cardemp_id'];
                            $cardemp_no=$rowu['cardemp_no'];
                            $employee_id=$rowu['employee_id'];
                            $cardemp_datetime=$rowu['cardemp_datetime'];
                            $cardemp_status=$rowu['cardemp_status'];
                        }

                        }
                        ?>

                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            <input type="hidden" name="cardemp_id" value="<?=$cardemp_id;?>" />
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cardemp_no">หมายเลขบัตร<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="cardemp_no" name="cardemp_no" value="<?=$cardemp_no;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">รหัสพนักงาน<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="number" id="employee_id" name="employee_id" value="<?=$employee_id;?>" required="required" class="form-control col-md-7 col-xs-12"> 
                                <option>--กรุณาเลือก--</option>
                                    <?php 
                                        $sql_employee_id=" select * from tb_employee";
                                        $rs_employee_id=$cls_conn->select_base($sql_employee_id);
                                        while($row_employee_id=mysqli_fetch_array($rs_employee_id))
                                        {
                                            ?>
                                            <option value="<?=$row_employee_id['employee_id'];?>"><?=$row_employee_id['employee_id'];?> </option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>    

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cardemp_datetime">วันที่ทำบัตร<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="cardemp_datetime" name="cardemp_datetime" value="<?=$cardemp_datetime;?>" required="required" class="form-control col-md-7 col-xs-12"> </div>
                        </div>   
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cardemp_status">สถานะบัตร<span class="required">:</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select type="text" id="cardemp_status" name="cardemp_status" value="<?=$cardemp_status;?>" required="required" class="form-control col-md-7 col-xs-12"> 
                                <option> 1 </option>
                                <option> 0 </option>
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
                            $cardemp_id=$_POST['cardemp_id'];
                            $cardemp_no=$_POST['cardemp_no'];
                            $employee_id=$_POST['employee_id'];
                            $cardemp_datetime=$_POST['cardemp_datetime'];
                            $cardemp_status=$_POST['cardemp_status'];
                         
                            $sql=" update tb_cardemp";
                            $sql.=" set";
                            $sql.=" cardemp_no='$cardemp_no',";
                            $sql.=" employee_id='$employee_id',";
                            $sql.=" cardemp_datetime='$cardemp_datetime',";
                            $sql.=" cardemp_status='$cardemp_status'";
                            $sql.=" where";
                            $sql.=" cardemp_id='$id'";
                            
                            
                            if($cls_conn->write_base($sql)==true)
                            {
                                echo $cls_conn->show_message('แก้ไขข้อมูลสำเร็จ');
                                echo $cls_conn->goto_page(1,'show_cardemp.php');
                                // echo $sql;
                               
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