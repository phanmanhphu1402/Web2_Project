<?php
    session_start();
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	    $q = $_GET['q'];
	  $sql = 'select count(ProductID) as number from product';
	  $ListProduct = executeResult($sql);
	  $number = 0;
	  if($ListProduct!=null & count($ListProduct)>0){
		  $number = $ListProduct[0]['number'];
	  }
	  $pages = ceil($number/10);
	  
	  $current_page = $q;
	  
	  if(isset($_GET['page'])){
		  $current_page = $_GET['page'];
	  }
	  
	  $index = ($current_page-1)*10;
	  
	  $sql = 'select * from product ORDER BY ProductName ASC limit '.$index.',10';
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