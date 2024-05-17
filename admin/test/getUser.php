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
            echo '
            <tr>
                <td>'.$User['Username'].'</td>
                <td>'.$User['Password'].'</td>
                <td>'.$User['Email'].'</td>
                <td>'.$User['Fullname'].'</td>
                <td>'.$User['Address'].'</td>
                <td>'.$User['Phone'].'</td>
                <td>'.$User['Birthday'].'</td>
                <td>'.$User['Role'].'</td>
                <td>'.$User['Status'].'</td>
                <td>
                <button type="button" class="btn btn-info" onClick=\'window.open("admin_user_add.php?id='.$User['ID'].'","_self")\'>Sửa</button>
                <button type="button" class="btn btn-warning" onClick="lockUser('.$User['ID'].')">Khóa</button>
                <button type="button" class="btn btn-danger" onClick="deleteUser('.$User['ID'].');">Xóa</button>
                </td>
            </tr>';
        }
	?>
</body>
</html>