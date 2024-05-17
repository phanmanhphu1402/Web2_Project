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
<title>Untitled Document</title>
</head>

<body>
	<?php
	$q = $_GET['q'];
	$sql = 'select * from product where ProductName like "%'.$q.'%"';
	$ListProduct = executeResult($sql);
    foreach($ListProduct as $Product){
        echo '<tr>';
        echo '<td>'.$Product['ProductID'].'</td>';
        echo '<td>';
        echo '<img src=';
        echo '"../../pic/product/'.$Product['ProductThumbnail'].'" style ="width: 100px;">';
        echo '</td>';
        echo '<td>'.$Product['ProductName'].'</td>';
        echo '<td>'.$Product['ProductType'].'</td>';
        echo '<td style ="width: 200px;">'.$Product['ProductDescription'].'</td>';
        echo '<td>'.$Product['ProductPrice'].'</td>';
        echo '<td>'.$Product['ProductStock'].'</td>';
        echo '<td>'.$Product['ProductStatus'].'</td>';
        echo '<td>';
        if($_SESSION['role']==1){
        echo '<button type="button" class="btn btn-info" onClick=\'window.open("admin_product_add.php?productId='.$Product['ProductID'].'","_self")\'>Sửa</button>';
        echo '<button type="button" class="btn btn-warning" onClick="lockProduct('.$Product['ProductID'].')">Khóa</button>';
        echo '<button type="button" class="btn btn-danger" onClick="deleteProduct('.$Product['ProductID'].');">Xóa</button>';
        }
        echo '</td>';
        echo '</tr>';
        echo '';
    }
	?>
</body>
</html>