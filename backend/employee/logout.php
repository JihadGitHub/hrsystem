<?php include('header_emp.php');?>
<div class="right_col" role="main">
  <?php
    session_destroy();
    echo $cls_conn->goto_page(0,'../../login.php');
    ?>

           
</div>
<?php include('footer_emp.php');?>
     