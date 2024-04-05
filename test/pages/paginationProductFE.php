<?php
    $path = dirname(getcwd(),3).'\database'.'\dbhelper.php';
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
	  $pages = ceil($number/8);
	  
	  $current_page = $q;
	  
	  if(isset($_GET['page'])){
		  $current_page = $_GET['page'];
	  }
	  
	  $index = ($current_page-1)*8;
	  
	  $sql = 'select * from product limit '.$index.',8';
	  $ListProduct = executeResult($sql);
        foreach($ListProduct as $Product){
            echo '<div class="product-card">';
            echo '<div class="badge">Hot</div>';
            echo '<div class="product-tumb">';
            echo '<img src=';
            echo '"http://localhost\myPhoneShop\pic/product/'.$Product['ProductThumbnail'].'">';
            echo '</div>';
            echo '<div class="product-details">';
            echo '<span class="product-catagory">'.$Product['ProductType'].'</span>';
            echo '<h4><a href="">'.$Product['ProductName'].'</a></h4>';
            echo '<div class="product-bottom-details">';
            echo '<div class="product-price">$'.$Product['ProductPrice'].'</div>';
            echo '<div class="product-links">';
            echo '<a href=""><i class="fa fa-heart"></i></a>';
            echo '<a href=""><i class="fa fa-shopping-cart"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } 
	  
	?>
</body>
</html>