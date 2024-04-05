
<div class="maincart">
		<div class="maincart-contain">
			<div class="my-cart">
				<div class="my-cart-heading">
					<h3>MY CART</h3>
					<a href="trangchu.php">Continue Shopping <i class="fa-solid fa-chevron-right"></i></a>
				</div>
				<hr>
				<div class="my-cart-table">
						<?php
						if(isset($_SESSION['cart'])&&(count($_SESSION['cart'])>0)){
							echo '<table>
							<tr>
								<th>Ảnh</th>
								<th>Tên</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Tổng giá</th>
							</tr>';
							// $_SESSION['cart'] = [];
							$i=0;
							foreach ($_SESSION['cart'] as $item) {
								
								$tt = $item[2]*$item[4];
								echo '<tr>';
								echo '<td class="img-table"><img src="http://localhost\myPhoneShop\pic/product/'.$item[1].'"></td>';
								echo '<td class="name-table"><a href="trangchu.php?act=detail&productId='.$item[3].'">'.$item[0].'</a></td>';
								echo '<td class="pre-price-table">'.$item[2].'$</td>';
								echo '<td class="quantity-table">'.$item[4].'</td>';
								echo '<td class="total-price-table">'.$tt.'$</td>';
								echo '<td class="remove"><a href="http://localhost\myPhoneShop\html_frontend/templates/trangchu.php?act=cart&i='.$i.'"><i class="fa-solid fa-xmark"></i></a></td>';
								echo '</tr>';
								$i++;
								
							}
							echo '</table>';
						}
						?>
					
				</div>
				<div class="my-cart-promo-code">
					<button onClick="openEnterPromo()"><i class="fa-solid fa-tag"></i> Enter a promo code</button>
					<div id="enterpromo"  class="input-code">
						<input type="text" placeholder="Enter code here" >
						<button>Apply</button>
					</div>
				</div>
				<div class="my-cart-note">
					<button onClick="openAddNote()"><i class="fa-regular fa-file-lines"></i> Add a note</button>
					<div id="addnote" class="text-note">
						<textarea placeholder="Do you have any special request"></textarea>
					</div>
				</div>
			</div>
			<?php
					$sql = 'select Address from user where Username like "%'.$_SESSION['name'].'%"';
					$p = 'Address';
					$address = execute4($sql,$p);
					$sql = 'select Email from user where Username like "%'.$_SESSION['name'].'%"';
					$email = execute4($sql,'Email');
					$sql = 'select Phone from user where Username like "%'.$_SESSION['name'].'%"';
					$phone = execute4($sql,'Phone');
					$sql = 'select Fullname from user where Username like "%'.$_SESSION['name'].'%"';
					$fullname = execute4($sql,'Fullname');
				?>
			<div class="order-summary">
				<div class="order-summary-heading">
					<h3>Order Summary</h3>
					
				</div>
				<hr>
				<div class="order-summary-infomation">
					<table>
						<tr>
							<td>Subtotal:</td>
							<td>
								<?php
									$ttt=0;
									foreach ($_SESSION['cart'] as $item) {
										$tt = $item[2]*$item[4];
										$ttt+=$tt;
										
									}
									echo $ttt;
								?>$
							</td>
						</tr>
						<tr>
							<td>User:</td>
							<td><?php echo $fullname;?></td>
						</tr>
						<tr>
							<td>Shipping to:</td>
							<td><?php echo $address ?></td>
						</tr>
						<tr>
							<td>Tax:</td>
							<td>$1</td>
						</tr>
						<tr>
							<td>Total:</td>
							<td>
								<?php
									$ttt=0;
									foreach ($_SESSION['cart'] as $item) {
										$tt = $item[2]*$item[4];
										$ttt+=$tt;
									}
									echo $ttt+1;
								?>$
							</td>
						</tr>
					</table>
				</div>
				
				<div class="order-summary-btn-checkout">
					<form method="post" action="checkout.php">
						<input type="hidden" value="<?php echo $address?>" name="address">
						<input type="hidden" value="<?php echo $email?>" name="email">
						<input type="hidden" value="<?php echo $phone?>" name="phone">
						<input type="hidden" value="<?php echo $fullname?>" name="fullname">
						<input type="hidden" value="<?php echo date("Y-m-d")?>" name="order_date">
						<input type="hidden" value="<?php echo $_SESSION['name']?>" name="username">
						<input type="hidden" value="<?php echo $ttt+1?>" name="totalprice">
						<button type="submit" class="buttoncheckout">Checkout</button>
						<button class="buttonpaypal"><i class="fa-brands fa-paypal"></i> PayPal thanh toán</button>
					</form>
					
					<p><i class="fa-solid fa-lock"></i>Secure checkout</p>
				</div>
				
				
			</div>
		</div>
	
	</div>
<script>
		var addnote = document.getElementById("addnote");
		var enterpromo = document.getElementById("enterpromo");
		function openAddNote(){
			if(addnote.style.display=="block"){
				addnote.style.display ="none";
			}
			else {
				addnote.style.display ="block";
			}
		}
		function openEnterPromo(){
			if(enterpromo.style.display=="flex"){
				enterpromo.style.display="none";
				return 0;
			}
			else {
				enterpromo.style.display="flex";
				return 0;
			}
			
		}
		function closeAddNote(){
			addnote.style.display ="none";
		}
		function closeAddNote(){
			enterpromo.style.display ="none";
		}
	</script>