<?php
	session_start();
	if(isset($_SESSION['name'])){
		$name = $_SESSION['name'];
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<?php include_once '../includes/header.php';?>
	<?php include_once '../includes/nav.php';?>
	<?php include_once '../contents/history-cart-main.php';?>
	<?php include_once '../includes/footer.php';?>
</body>
</html>