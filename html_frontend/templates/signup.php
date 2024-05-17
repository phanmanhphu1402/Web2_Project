<?php
$path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
require_once $path;
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(empty($_POST['username'])){
		$username_error = "Bạn chưa nhập tên tài khoản";
	}
	if(empty($_POST['password'])){
		$password_error = "Bạn chưa nhập mật khẩu";
	}
	if(empty($_POST['email'])){
		$email_error = "Bạn chưa nhập email";
	}
	if(empty($_POST['fullname'])){
		$fullname_error = "Bạn chưa nhập họ tên";
	}
	if(empty($_POST['address'])){
		$address_error = "Bạn chưa nhập địa chỉ";
	}
	if(empty($_POST['phone_number'])){
		$phone_number_error = "Bạn chưa nhập số điện thoại";
	}
	if(empty($_POST['birthday'])){
		$birthday_error = "Bạn chưa nhập ngày sinh";
	}
}
$username = $password = $email = $fullname = $address = $phone = $birthday = $role = $status = '';
if(!empty($_POST)){
	
	if(isset($_POST['username'])){
		$username = $_POST['username'];
	}
	
	if(isset($_POST['password'])){
		$password = $_POST['password'];
	}
	
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}
	
	if(isset($_POST['fullname'])){
		$fullname = $_POST['fullname'];
	}
	
	if(isset($_POST['address'])){
		$address = $_POST['address'];
	}
	
	if(isset($_POST['phone_number'])){
		$phone = $_POST['phone_number'];
	}
	
	if(isset($_POST['birthday'])){
		$birthday = $_POST['birthday'];
	}
		$role = 3;
	
		$status = "Đang hoạt động";
	


	$username = str_replace('\'','\\\'',$username); 
	$password = str_replace('\'','\\\'',$password);
	$email = str_replace('\'','\\\'',$email);
	$fullname = str_replace('\'','\\\'',$fullname);
	$address = str_replace('\'','\\\'',$address);
	$phone = str_replace('\'','\\\'',$phone);
	$birthday = str_replace('\'','\\\'',$birthday);
		$sql = "insert into user(Username,Password,Fullname,Email,Address,Phone,Birthday,Role,Status) value ('$username','$password','$fullname','$email','$address','$phone','$birthday','$role','$status')";
	
	execute($sql);
	
	header("Location: login.php");
	die();
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Signup</title>
<link href="../css/signup.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="../../fontawesome-free-6.2.1-web/css/all.min.css">
</head>

<body>
	<div class="container">
		<form method="post" autocomplete="off">
			<h1>Signup</h1>
			<div class="form-control error">
				<input type="text" placeholder="Username" name="username">
				
				<small><?php if(isset($username_error)) echo  $username_error; ?></small>
			</div>
			<div class="form-control error">
				<input type="text" placeholder="Password" name="password">
				
				<small><?php if(isset($password_error)) echo $password_error; ?></small>
			</div>
			
			<div class="form-control error">
				<input type="text" placeholder="Confirm Password">
				
			</div>
			<div class="form-control error">
				<input type="email" placeholder="Email" name="email">
				
				<small><?php if(isset($email_error)) echo $email_error; ?></small>
			</div>
			<div class="form-control error">
				<input type="text" placeholder="Họ tên" name="fullname">
				
				<small><?php if(isset($fullname_error)) echo $fullname_error; ?></small>
			</div>
			<div class="form-control error">
				<input type="tel" placeholder="Số điện thoại" name="phone_number">
				
				<small><?php if(isset($phone_number_error)) echo $phone_number_error; ?></small>
			</div>
			<div class="form-control error">
				<input type="text" placeholder="Địa chỉ" name="address">
				
				<small><?php if(isset($address_error)) echo $address_error; ?></small>
			</div>
			<div class="form-control error">
				<input type="date" placeholder="Ngày sinh" name="birthday">
				
				<small><?php if(isset($birthday_error)) echo $birthday_error; ?></small>
			</div>
			
			<button type="submit" class="submit">Signup</button>
			<div class="signup-link">
				Already a menber ? 
				<a href="login.php">Login</a>
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