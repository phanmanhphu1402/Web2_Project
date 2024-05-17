<?php
session_start();
$path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
require_once $path;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<title>Bill detail</title>
</head>

<body>
    <?php include_once '../includes/header.php';?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">Bill detail</div>
			<div class="panel-body">
				<table class="table table-hover">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>ProductID</th>
                        <th>Product Name</th>
                        <th>Product Number</th>
                        <th>Product Price</th>

                    </tr>
                        
                    </thead>
                    <tbody>
                    <?php
                        $q = $_GET['OrderID'];
                        $sql ='SELECT * from bill_detail where OrderID = '.$q;
                        $ListBillDetail = executeResult($sql);
                        foreach($ListBillDetail as $Bill){
                            echo '<tr>';
                            echo '<td>'.$Bill['ID'].'</td>';
                            echo '<td>'.$Bill['ProductID'].'</td>';
                            echo '<td>'.$Bill['ProductName'].'</td>';
                            echo '<td>'.$Bill['ProductNum'].'</td>';
                            echo '<td>'.$Bill['ProductPrice'].'$</td>';
                            echo '</tr>';
                        }
                    ?>
                    </tbody>
                </table>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>
    <?php include_once '../includes/footer.php';?>
	
</body>
</html>