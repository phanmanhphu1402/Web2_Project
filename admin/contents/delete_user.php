<?php
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
if(isset($_POST['id'])){
	$id = $_POST['id'];
	
	$sql = "delete from user where ID = ".$id;
	
	execute($sql);
	
	echo 'Delete Success';
}