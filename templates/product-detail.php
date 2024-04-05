<?php
session_start();
$path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
require_once $path;
$productId = $productName = $productImg = $productType = $productDescription = $productStock = $productStatus = $productPrice = '';
if(!empty($_POST)){
	
	if(isset($_POST['productId'])){
		$productId = $_POST['productId'];
	}
	
	if(isset($_POST['productName'])){
		$productName = $_POST['productName'];
	}
	
	if(isset($_POST['productImg'])){
		$productImg = $_POST['productImg'];
	}
	
	if(isset($_POST['productType'])){
		$productType = $_POST['productType'];
	}
	
	if(isset($_POST['productDescription'])){
		$productDescription = $_POST['productDescription'];
	}
	
	if(isset($_POST['productStock'])){
		$productStock = $_POST['productStock'];
	}
	
	if(isset($_POST['productStatus'])){
		$productStatus = $_POST['productStatus'];
	}
	
	if(isset($_POST['productPrice'])){
		$productPrice = $_POST['productPrice'];
	}
}
$productId ='';
if(isset($_GET['productId'])){
	$productId = $_GET['productId'];
	$sql = "select * from product where ProductID = ".$productId;
	$ProductList = executeResult($sql);
	if($ProductList != null && count($ProductList)>0){
		$product = $ProductList[0];
		$productName = $product['ProductName'];
		$productImg = $product['ProductThumbnail'];
		$productType = $product['ProductType'];
		$productDescription = $product['ProductDescription'];
		$productStock = $product['ProductStock'];
		$productStatus = $product['ProductStatus'];
		$productPrice = $product['ProductPrice'];
	}else {
		$productId = '';
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="../../fontawesome-free-6.2.1-web/css/all.min.css">
<link href="../css/footer.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/base.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<link href="../css/mainproductdetail.css" rel="stylesheet" type="text/css">
<link href="../css/product.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
	<?php include '../includes/header.php';?>
	<?php include '../includes/nav.php';?>
	<?php include '../contents/mainproductdetail.php';?>
	<?php include '../includes/footer.php';?>
</body>
</html>