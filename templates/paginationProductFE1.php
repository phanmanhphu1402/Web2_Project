<?php
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
<div class="main-product-bestsellers">
				<h3>Best sellers</h3>
				<div class="main-product-bestsellers-container">
				<?php
					  $sql = 'select * from product limit 4,4';
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
						echo '<a onClick=\'window.open("trangchu.php?act=detail&productId='.$Product['ProductID'].'","_self")\'><i class="fa fa-shopping-cart"></i></a>';

						echo '<a href=""><i class="fa fa-heart"></i></a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					} 
				?>
				</div>
				<hr>
			</div>
			<div class="main-product-pre-order">
				<h3>Pre orders</h3>
				<div class="main-product-pre-order-container">
				<?php
					  $sql = 'select * from product limit 0,4';
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
							echo '<a onClick=\'window.open("trangchu.php?act=detail&productId='.$Product['ProductID'].'","_self")\'><i class="fa fa-shopping-cart"></i></a>';
							echo '<a href=""><i class="fa fa-heart"></i></a>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
							echo '</div>';
						} 
				?>
				</div>
				<hr>
			</div>
			<div class="main-product">
				<h3>Product</h3>
				<div class="main-product-container" id="main-product-container-FE">
	<?php
    
    if(isset($_GET['name'])){
        $d = $_GET['name'];
    }
    if(isset($_GET['q'])){
        $q = $_GET['q'];
    }else $q=0;
    $sql = 'select count(ProductID) as number from product where ProductName like "%'.$d.'%"';
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
	  
    $sql = 'select * from product where ProductType like "%'.$d.'%" limit '.$index.',8';
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
            echo '<a onClick=\'window.open("product-detail.php?productId='.$Product['ProductID'].'","_self")\'><i class="fa fa-shopping-cart"></i></a>';

            echo '<a href=""><i class="fa fa-heart"></i></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } 
	  
	?>
    </div>	
			</div>
			<div class="main-page">
				<div class="main-page-container">
					<ul  style="display: flex; list-style: none;">
					<?php
                        $sql = 'select count(ProductID) as number from product where ProductName like "%'.$d.'%"';
                        $ListProduct = executeResult($sql);
                        $number = 0;
                        if($ListProduct!=null & count($ListProduct)>0){
                            $number = $ListProduct[0]['number'];
                        }
                        $pages = ceil($number/8);
                        for($i=1;$i<=$pages;$i++){
                            echo '<li onClick="paginationProductFE1(';
                            echo $i.",'";
                            echo $d."')";
                            echo '"><a>'.$i.'</a></li>';
                        }
                    ?>
					</ul>
				</div>
			</div>

</body>
</html>