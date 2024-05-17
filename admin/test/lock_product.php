<?php
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
if(isset($_POST['productId'])){
	$ProductId = $_POST['productId'];
    $sql = 'SELECT ProductStatus FROM product WHERE ProductID = '.$ProductId;
        if(execute3($sql) == 0){
            $sql = 'UPDATE product SET ProductStatus = 1 WHERE ProductID = '.$ProductId;
            execute($sql);
        }else{
            $sql = 'UPDATE product SET ProductStatus = 0 WHERE ProductID = '.$ProductId;
            execute($sql);
        }
	echo 'Unlock/Lock Success';
}