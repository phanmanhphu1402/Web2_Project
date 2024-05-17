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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Bill detail</title>
</head>

<body>
    <?php include_once '../includes/admin_nav.php'; ?>
    <div class="col-sm-10">
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
                        //echo $sql;
                        $ListBillDetail = executeResult($sql);
                        foreach($ListBillDetail as $Bill){
                            echo '<tr>';
                            echo '<td>'.$Bill['OrderID'].'</td>';
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
    </div>
    

<footer class="container-fluid">
</footer>
</body>
</html>