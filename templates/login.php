<?php
session_start();
ob_start();
$path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
require_once $path;
unset($_SESSION['name']);
unset($_SESSION['role']);
if(!empty($_POST)){
	$username = $password = '';
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	$sql = "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'";
	$role = checkUserRole($sql);
	checkUserStatus($sql);
	$_SESSION['role']=checkUserRole($sql);
	$_SESSION['name']=checkUserName($sql);
	if(checkUserStatus($sql)==='Ngưng hoạt động'){
		header('location: login.php');
		$error_lock = 'tai khoan ban da bi khoa';
	}else if(checkUserStatus($sql)==='Đang hoạt động'){
		if($role==0||$role==1||$role==2){
			header('location: http://localhost/myPhoneShop/admin\templates\admin.php');
		}else{
			
			header('location: trangchu.php');
		}
	}else{
		header('location: login.php');
		$error_correct = 'Sai tai khoan hoac mat khau'; 
	}
	
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="../css/login.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="../../fontawesome-free-6.2.1-web/css/all.min.css">
</head>

<body>
	<div class="container">
		<form action="" method="post">
			<h1>Login Form</h1>
			<?php
				if(isset($error_lock)&& $error_lock !=''){
					echo'<small style="color: red;">Tài khoản bạn đang bị khóa</small>';
				}
				if(isset($error_correct)&& $error_correct !=''){
					echo'<small style="color: red;">'.$error_correct.'</small>';
				}
			?>
			<div class="form-control error">
				<input type="text" placeholder="Username" name="username">
			</div>
			
			<div class="form-control error">
				<input type="text" placeholder="Password" name="password">
			</div>
			
			<button type="submit" class="submit" name="login">Login</button>
			
			<div class="signup-link">
				Not a menber ? 
				<a href="signup.php">Sign up</a>
			</div>
			<div class="decoration">
				<i class="fa-brands fa-twitter fa-2x"></i>
				<i class="fa-brands fa-facebook fa-2x"></i>
				<i class="fa-brands fa-google-plus-g fa-2x"></i>
			</div>
		</form>
	</div>
</body>
</html>