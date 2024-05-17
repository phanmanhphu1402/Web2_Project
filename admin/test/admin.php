<?php
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h4>Admin</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="#section1">Home</a></li>
        <li  class="active"><a href="#section2">User Manager</a></li>
        <li><a href="#section3">Product Manager</a></li>
        <li><a href="#section3">Bill Manager</a></li>
        <li><a href="#section3">Statis</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search ..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-10">
      <div class="container-fluid">
        <div class="panel panel-primary">
              <div class="panel-heading" style="display: flex;justify-content: space-between;">
                    <h3 class="panel-title" style="font-size: 20px;">User Manager</h3>
                    
                    <button type="button" class="btn btn-danger" onClick="window.open('admin_user_add.php','_self')">Thêm tài khoản</button>

                    <div class="input-group">
                        <input type="text" class="form-control" id="usr" placeholder="Search by Username" style="width: 200px;">
                        <div class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="showUser()">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>
              </div>
              <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Fullname</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Birthday</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="user-container" class="user-container">
                            <?php
                                $sql = 'select * from user limit 0,8';
                                $ListUser = executeResult($sql);
                                foreach($ListUser as $User){
                                    echo '<tr>';
                                    echo '<td>'.$User['Username'].'</td>';
                                    echo '<td>'.$User['Password'].'</td>';
                                    echo '<td>'.$User['Email'].'</td>';
                                    echo '<td>'.$User['Fullname'].'</td>';
                                    echo '<td>'.$User['Address'].'</td>';
                                    echo '<td>'.$User['Phone'].'</td>';
                                    echo '<td>'.$User['Birthday'].'</td>';
                                    echo '<td>'.$User['Role'].'</td>';
                                    echo '<td>'.$User['Status'].'</td>';
                                    echo '<td>';
                                    echo '<button type="button" class="btn btn-info" onClick=\'window.open("admin_user_add.php?id='.$User['ID'].'","_self")\'>Sửa</button>';
                                    echo '<button type="button" class="btn btn-warning" onClick="lockUser('.$User['ID'].')">Khóa</button>';
                                    
                                    echo '<button type="button" class="btn btn-danger" onClick="deleteUser('.$User['ID'].');">Xóa</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '';
                                }
                            ?>
                        </tbody>
                    </table>
              </div>
              <div class="panel-footer">
                <ul class="pagination">
                    <?php
                        $sql = 'select count(ID) as number from user';
                        $ListUser = executeResult($sql);
                        $number = 0;
                        if($ListUser!=null & count($ListUser)>0){
                            $number = $ListUser[0]['number'];
                        }
                        $pages = ceil($number/8);
                        for($i=1;$i<=$pages;$i++){
                            echo '<li onClick="paginationUser('.$i.')"><a>'.$i.'</a></li>';
                        }
                    ?>
                </ul>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Good luck to you <3</p>
</footer>
<script type="text/javascript">
	function deleteUser(id){
		option = confirm('Bạn có muốn xóa tài khoản này ?')
		if(!option){
			return;
		}
		$.post('delete_user.php', {
			'id': id
		}, function(data){
			alert(data);
			location.reload();
		})
	}
    function lockUser(id){
		option = confirm('Bạn muốn mở/khóa tài khoản này ?')
		if(!option){
			return;
		}
		$.post('lock_user.php', {
			'id': id
		}, function(data){
			alert(data);
			location.reload();
		})
	}
    function paginationUser(str){
		if(str==""){
			document.getElementById("user-container").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("user-container").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","paginationUser.php?q="+str,true);
		xmlhttp.send();
	}
    function showUser(){
		var str = document.getElementById("usr").value;
		if(str==""){
			document.getElementById("user-container").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("user-container").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","getUser.php?q="+str,true);
		xmlhttp.send();
	}
</script>
</body>
</html>
