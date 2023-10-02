<?php include('class_conn.php');?>
<?php $cls_conn=new class_conn();?>
<?php
$sql_header=" select * from tb_admin";
$sql_header.=" order by admin_id desc";

$result_header=$cls_conn->select_base($sql_header);
while($row_header=mysqli_fetch_array($result_header))
{
    $admin_id=$row_header['admin_id'];
    $admin_fullname=$row_header['admin_fullname'];
    $admin_email=$row_header['admin_email'];
    $admin_tel=$row_header['admin_tel'];
    $admin_username=$row_header['admin_username'];
    $admin_password=$row_header['admin_password'];
}

$sql_header=" select * from tb_employee";
$sql_header.=" order by employee_id desc";

$result_header=$cls_conn->select_base($sql_header);
while($row_header=mysqli_fetch_array($result_header))
{
    $employee_id=$row_header['employee_id'];
    $employee_no=$row_header['employee_no'];
    $employee_fullname=$row_header['employee_fullname'];
    $employee_position=$row_header['employee_position'];
    $employee_tel=$row_header['employee_tel'];
    // $shiff_id=$row_header['shiff_id'];
    $employee_status=$row_header['employee_status'];
    $employee_username=$row_header['employee_username'];
    $employee_password=$row_header['employee_password'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="template_login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="template_login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="template_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="template_login/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="template_login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="template_login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="template_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="template_login/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="image/logo_login.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
                    <div class="text-center">ยินดีต้อนรับเข้าสู่ระบบ</div>
					<span class="login100-form-title">
						<!-- <?=$employee_fullname;?> --> Login
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							เข้าสู่ระบบ
						</button>
					</div>
				</form>

                <?php
                if(isset($_POST['submit']))
                {
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    
                    $sql_admin="select * from tb_admin where admin_username='$username' and admin_password='$password'";
                    $num_admin=$cls_conn->select_numrows($sql_admin);
                    
                    $sql_employee="select * from tb_employee where employee_username='$username' and employee_password='$password'";
                    $num_employee=$cls_conn->select_numrows($sql_employee);
					echo $sql;
                    
                    if ($num_admin >= 1) {
                        echo $cls_conn->show_message('Welcome Admin');
                        echo $cls_conn->goto_page(1, 'backend/admin/index.php');
                    } elseif ($num_employee >= 1) {
                        echo $cls_conn->show_message('Welcome Employee');
                        echo $cls_conn->goto_page(1, 'backend/employee/index.php');
                    } else {
                        echo $cls_conn->show_message('Login Fail');
                        echo $cls_conn->goto_page(1, 'login.php');
                    }
                }
                ?>
			</div>
		</div>
	</div>
	
	<script src="template_login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="template_login/vendor/bootstrap/js/popper.js"></script>
	<script src="template_login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="template_login/vendor/select2/select2.min.js"></script>
	<script src="template_login/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>
</body>
</html>
