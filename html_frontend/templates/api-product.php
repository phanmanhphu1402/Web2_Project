<?php
session_start();
$path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
require_once $path;
if(isset($_POST['action']) && isset($_POST['id'])) {
    $action = $_POST['action'];
    $id = $_POST['id'];

    // Xử lý các hành động dựa trên action
    switch ($action) {
        case 'add':
            addToCart($id);
            break;
        // Các action khác nếu cần
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
