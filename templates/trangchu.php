<?php
	
	if(isset($_SESSION['name'])){
		$name = $_SESSION['name'];
	}
	

    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;

    session_start();
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart']=[];
	}
	if(!empty($_POST)&&isset($_SESSION['cart'])){
		$productname = $productimg = $productprice = $productid = $productnumber ='';
		if(isset($_POST['productname'])){
			$productname = $_POST['productname'];
		}
		if(isset($_POST['productimg'])){
			$productimg = $_POST['productimg'];
		}
		if(isset($_POST['productprice'])){
			$productprice = $_POST['productprice'];
		}
		if(isset($_POST['productid'])){
			$productid = $_POST['productid'];
		}
		if(isset($_POST['productnumber'])){
			$productnumber = $_POST['productnumber'];
		}
		$fg=0;
		$i=0;
		foreach ($_SESSION['cart'] as $item) {
			if($item[3]===$productid){
				$productnumbernew = $productnumber+ $item[4];
				$_SESSION['cart'][$i][4]=$productnumbernew;
				$fg = 1;
				break;
			}
			$i++;
		}
		if($fg==0){
			$item = array($productname,$productimg,$productprice,$productid,$productnumber);
			$_SESSION['cart'][]=$item;
		}
		
		
	}
	
	if(isset($_GET['i']) && ($_GET['i']>=0)){
		array_splice($_SESSION['cart'],$_GET['i'],1);
	}if(isset($_SESSION['cart'])&& (count($_SESSION['cart'])>0)){

	}
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
<title>Smart Phone T3</title>
<link rel="stylesheet" href="../../fontawesome-free-6.2.1-web/css/all.min.css">
<link href="../css/base.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/slider.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<link href="../css/footer.css" rel="stylesheet" type="text/css">
<link href="../css/banner.css" rel="stylesheet" type="text/css">
<link href="../css/product.css" rel="stylesheet" type="text/css">
<link href="../css/btnsearchingadvance.css" rel="stylesheet" type="text/css">
<link href="../css/main.css" rel="stylesheet" type="text/css">
<link href="..\css\mainproductdetail.css" rel="stylesheet" type="text/css">
<link href="..\css\maincart.css" rel="stylesheet" type="text/css">
<link href="../css/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include_once '../includes/header.php';?>
	<?php include_once '../includes/nav.php';?>
	<?php
		if(isset($_SESSION['role'])){
            if(isset($_GET['act'])){
                switch ($_GET['act']) {
                    case 'cart':
                        include_once '../contents/maincart.php';
                        break;
                    case 'history':
                        include_once '../contents/history-cart-main.php';
                        break;
                    case 'detail':
                        include_once '../contents/mainproductdetail.php';
                        break;
					case 'advance':
                        include_once '../contents/main-advance-search.php';
                        break;
                    case 'logout':
                        unset($_SESSION['role']);
                        header('location: http://localhost/myPhoneShop/html_frontend\templates\login.php');
                        break;
                    default:
						include_once '../includes/slider.php';
                    	include_once '../contents/main.php';
                        break;
                }
            }else{
				include_once '../includes/slider.php';
				include_once '../contents/main.php';
			}
        }else{
			if(isset($_GET['act'])){
			switch ($_GET['act']) {
				case 'cart':
					include_once '../contents/notBuy.php';
					break;
				case 'history':
					include_once '../contents/notBuy.php';
					break;
				case 'detail':
					include_once '../contents/mainproductdetail.php';
					break;
				case 'advance':
					include_once '../contents/main-advance-search.php';
					break;
				default:
					include_once '../includes/slider.php';
					include_once '../contents/main.php';
				break;
			}
			}else{
				
				include_once '../includes/slider.php';
				include_once '../contents/main.php';
			}
				
			
        }
		
	?>
	<?php include_once '../includes/advance.php';?>
	<?php include_once '../includes/footer.php';?>
</body>
</html>