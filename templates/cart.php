<?php
	session_start();
	if(isset($_SESSION['name'])){
		$name = $_SESSION['name'];
	}
	
	
?>
<?php
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
?>
<?php
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
	if(isset($_GET['i']) && ($_GET['i']>=0)){
		array_splice($_SESSION['cart'],$_GET['i'],1);
	}if(isset($_SESSION['cart'])&& (count($_SESSION['cart'])>0)){

	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../../fontawesome-free-6.2.1-web/css/all.min.css">
<link href="../css/footer.css" rel="stylesheet" type="text/css">
<link href="../css/header.css" rel="stylesheet" type="text/css">
<link href="../css/base.css" rel="stylesheet" type="text/css">
<link href="../css/nav.css" rel="stylesheet" type="text/css">
<link href="../css/maincart.css" rel="stylesheet" type="text/css">
<title>Untitled Document</title>
</head>

<body>
	<?php include '../includes/header.php';?>
	<?php include '../includes/nav.php';?>
	<?php include '../contents/maincart.php';?>
	<?php include '../includes/footer.php';?>
</body>
</html>