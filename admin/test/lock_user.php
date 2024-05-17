<?php
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
if(isset($_POST['id'])){
	$id = $_POST['id'];
    $sql = 'SELECT Status FROM user WHERE ID = '.$id;
        if(execute2($sql) ==='Ngưng hoạt động'){
            $sql = 'UPDATE user SET Status = "Đang hoạt động" WHERE ID = '.$id;
            execute($sql);
        }else{
            $sql = 'UPDATE user SET Status = "Ngưng hoạt động" WHERE ID = '.$id;
            execute($sql);
        }
	echo 'Unlock/Lock Success';
}