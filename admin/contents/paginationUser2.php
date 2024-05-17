<?php
    session_start();
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	    $q = $_GET['q'];
	  $sql = 'select count(ID) as number from user';
	  $ListUser = executeResult($sql);
	  $number = 0;
	  if($ListUser!=null & count($ListUser)>0){
		  $number = $ListUser[0]['number'];
	  }
	  $pages = ceil($number/8);
	  
	  $current_page = $q;
	  
	  if(isset($_GET['page'])){
		  $current_page = $_GET['page'];
	  }
	  
	  $index = ($current_page-1)*8;
	  
	  $sql = 'select * from user ORDER BY Username DESC limit '.$index.',8';
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
        if($_SESSION['role']==1){
        echo '<button type="button" class="btn btn-info" onClick=\'window.open("admin_user_add.php?id='.$User['ID'].'","_self")\'>Sửa</button>';
        echo '<button type="button" class="btn btn-warning" onClick="lockUser('.$User['ID'].')">Khóa</button>';
        
        echo '<button type="button" class="btn btn-danger" onClick="deleteUser('.$User['ID'].');">Xóa</button>';
        }
        echo '</td>';
        echo '</tr>';
        echo '';
        }
	  
	?>
</body>
</html>