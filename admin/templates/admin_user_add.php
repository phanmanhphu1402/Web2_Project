<?php
$path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
require_once $path;
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
	
	if(isset($_POST['phone'])){
		$phone = $_POST['phone'];
	}
	
	if(isset($_POST['birthday'])){
		$birthday = $_POST['birthday'];
	}
	
	if(isset($_POST['role'])){
		$role = $_POST['role'];
	}
	
	if(isset($_POST['status'])){
		$status = $_POST['status'];
	}

	if(isset($_POST['id'])){
		$id = $_POST['id'];
	}

	$username = str_replace('\'','\\\'',$username); 
	$password = str_replace('\'','\\\'',$password);
	$email = str_replace('\'','\\\'',$email);
	$fullname = str_replace('\'','\\\'',$fullname);
	$address = str_replace('\'','\\\'',$address);
	$phone = str_replace('\'','\\\'',$phone);
	$birthday = str_replace('\'','\\\'',$birthday);
	$role = str_replace('\'','\\\'',$role);
	$status = str_replace('\'','\\\'',$status);
	$id = str_replace('\'','\\\'',$id);
	if($id>0){
		$sql = "update user set Username = '$username' ,Password = '$password' ,Fullname = '$fullname',Email = '$email',Address = '$address',Phone = '$phone',Birthday = '$birthday',Role = '$role',Status = '$status' WHERE id = ".$id;
	}else{
		$sql = "insert into user(Username,Password,Fullname,Email,Address,Phone,Birthday,Role,Status) value ('$username','$password','$fullname','$email','$address','$phone','$birthday','$role','$status')";
	}
	execute($sql);
	
	header("Location: admin.php");
	die();
}
$id ='';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "select * from user where ID = ".$id;
	$UserList = executeResult($sql);
	if($UserList != null && count($UserList)>0){
		$user = $UserList[0];
		$username = $user['Username'];
		$password = $user['Password'];
		$email = $user['Email'];
		$fullname = $user['Fullname'];
		$address = $user['Address'];
		$phone = $user['Phone'];
		$birthday = $user['Birthday'];
		$role = $user['Role'];
		$status = $user['Status'];
	}else {
		$id = '';
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Add User</title>
</head>

<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">User</div>
			<div class="panel-body">
				<form method="post">
				  <div class="form-group">
					<input type="text" class="form-control" id="" name="id" value="<?=$id?>" style="display: none">
					<label for="email">Username:</label>
					<input type="text" class="form-control" id="" name="username" value="<?=$username?>">
				  </div>
				  <div class="form-group">
					<label for="email">Password:</label>
					<input type="text" class="form-control" id="" name="password" value="<?=$password?>">
				  </div>
                  <div class="form-group">
					<label for="email">Email:</label>
					<input type="email" class="form-control" id="" name="email" value="<?=$email?>">
				  </div>
                  <div class="form-group">
					<label for="email">Fullname:</label>
					<input type="text" class="form-control" id="" name="fullname" value="<?=$fullname?>">
				  </div>
                  <div class="form-group">
					<label for="email">Address:</label>
					<input type="text" class="form-control" id="" name="address" value="<?=$address?>">
				  </div>
                  <div class="form-group">
					<label for="email">Phone:</label>
					<input type="tel" class="form-control" id="" name="phone" value="<?=$phone?>">
				  </div>
                  <div class="form-group">
					<label for="email">Birthday:</label>
					<input type="date" class="form-control" id="" name="birthday" value="<?=$birthday?>">
				  </div>
				  <div class="form-group">
					<label for="email">Role:</label>
					<select id="mySelectRole" name="role" >
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
                    <script>
                        document.getElementById("mySelectRole").value = "<?=$role?>";
                    </script>
				  </div>
				  <div class="form-group">
					<label for="pwd">Status:</label>
					<select name="status" id="mySelectStatus">
						<option value="Đang hoạt động">Đang hoạt động</option>
						<option value="Ngưng hoạt động">Ngưng hoạt động</option>
					</select>
                    <script>
                        document.getElementById("mySelectStatus").value = "<?=$status?>";
                    </script>
				  </div>
				  <button type="submit" class="btn btn-info">Save</button>
				</form>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
	
</body>
</html>