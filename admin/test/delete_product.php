<?php
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
if(isset($_POST['productId'])){
	$productId = $_POST['productId'];
	
	$sql = "delete from product where ProductID = ".$productId;
	
	execute($sql);
	
	echo 'Delete Success';
}