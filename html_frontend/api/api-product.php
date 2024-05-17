<?php
session_start();
$path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
require_once $path;
if(!empty($_POST)){
    $action = $id = '';
    if(isset($_POST['action'])){
		$action = $_POST['action'];
	}
    if(isset($_POST['id'])){
		$id = $_POST['id'];
	}
    switch ($action){
        case 'add':
            addToCart($id);
            break;
    }



}
function addToCart($id){
    $cart = [];
    if(!isset($_SESSION['cart'])){
        $cart = $_SESSION['cart']; 
    }
    $isFind = false;
    for ($i=0; $i < count($cart); $i++) { 
        if($cart[$i]['id']== $id){
            $cart[$id]['num']++;
            $isFind = true;
            break;
        }
    }
    if(!$isFind){
        $sql = "select * from product where ProductID = ".$id;
        $product = execute($sql);
        $product['num'] = 1;
        $cart[] = $product;
    }

    //update SESSION
    $_SESSION['cart'] = $cart;
}
