<?php include('header.php');?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">ลบข้อมูลบัตรพนักงาน</h4> </div>
                    <!-- /.col-lg-12 -->
                </div>
           
                        
                            
                             
                                    <?php 
                                    if(isset($_GET['id']))
                                    {
                                        $id=$_GET['id'];
										$sql=" delete from tb_cardemp";
										$sql.=" where";
										$sql.=" cardemp_id='$id'";
                                        
                                         
                                        if($cls_conn->write_base($sql)==true)
                                        {
                                            echo $cls_conn->show_message('ลบข้อมูลสำเร็จ');
											echo $cls_conn->goto_page(1,'show_cardemp.php');
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
        
            <!-- /.container-fluid -->
        </div>
<?php include('footer.php');?>