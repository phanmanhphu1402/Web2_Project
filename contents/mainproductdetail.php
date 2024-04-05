
<div class="main-product-detail">
		<div class="main-product-detail-contain">
			<div class="image-description">
				<img src="<?php echo 'http://localhost\myPhoneShop\pic/product/'.$product['ProductThumbnail']; ?>">
				<p>
				<?php echo $product['ProductDescription']; ?>
				</p>
			</div>
			<form action="trangchu.php?act=cart&productname=<?=$product['ProductName']?>&productimg=<?=$product['ProductThumbnail']?>&productprice=<?=$product['ProductPrice']?>&productid=<?=$product['ProductID']?>" method="post">
				<?php
					echo '<input type="text" name="productname" value="'.$product['ProductName'].'" style="display:none">';
					echo '<input type="text" name="productimg" value="'.$product['ProductThumbnail'].'" style="display:none">';
					echo '<input type="text" name="productprice" value="'.$product['ProductPrice'].'" style="display:none">';
					echo '<input type="text" name="productid" value="'.$product['ProductID'].'" style="display:none">';
				?>
				
			
			<div class="select-policy">
				<div class="product-detail-name"><h4><?php echo $product['ProductName']; ?></h4></div>
				<div class="product-detail-name"><label>Thương hiệu: </label><?php echo $product['ProductType']; ?></div>

				<div class="product-detail-price"><?php echo $product['ProductPrice']; ?>$</div>
				<div class="product-detail-quantity">
					<p>Quantity</p>
					<input type="number" min="1" max="99" value="1" name="productnumber">
				</div>
				<div class="product-detail-btn">
					<button type="submit" class="product-detail-btn-add-cart">ADD TO CART</button>
					<button class="product-detail-btn-love"><i class="fa-regular fa-heart"></i></button>
				</div>
				<div class="product-detail-information-policy">Pre-order</div>
				<hr>
				<div class="product-detail-information-policy">Shipping</div>
				<hr>
				<div class="product-detail-information-policy">Package</div>
				<hr>
				<div class="product-detail-information-policy">Update</div>
				<div class="decoration">
					<a href="#"><i class="fa-brands fa-facebook "></i></a>
					<a href="#"><i class="fa-brands fa-twitter "></i></a>
					<a href="#"><i class="fa-brands fa-tiktok "></i></a>
					<a href="#"><i class="fa-brands fa-instagram "></i></a>
				</div>
			
			</div>
			</form>
		</div>
		<div class="main-product-detail-contain2">
			<div class="relative-product-heading">
				<h3>Relative Products</h3>
			</div>
			<div class="relative-product-grid">
				<?php
					$p=$product['ProductType'];
					$sql = 'select * from product where ProductType like "%'.$p.'%" limit 0,4';
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
		</div>
	</div>

<script type="text/javascript">
	function addToCart(id){
		$.post('../api/api-product.php',{
			'action': 'add',
			'id':id

		},function(data){
			location.reload();
		})
	}
</script>