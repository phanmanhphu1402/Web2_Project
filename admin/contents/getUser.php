<?php
    session_start();
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>

<body>
	<?php
	$q = $_GET['q'];
    
	$sql = 'select * from user where Username like "%'.$q.'%"';
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