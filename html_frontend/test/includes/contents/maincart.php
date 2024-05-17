<div class="maincart">
		<div class="maincart-contain">
			<div class="my-cart">
				<div class="my-cart-heading">
					<h3>MY CART</h3>
					<a href="#">Continue Shopping <i class="fa-solid fa-chevron-right"></i></a>
				</div>
				<hr>
				<div class="my-cart-table">
					<table>
						<tr>
							<th>Ảnh</th>
							<th>Tên</th>
							<th>Giá</th>
							<th>Số lượng</th>
							<th>Tổng giá</th>
						</tr>
						<tr>
							<td class="img-table"><img src="../../pic/ip14.png"></td>
							<td class="name-table">Y2K CYBERDOTE PBT KEYCAP SET</td>
							<td class="pre-price-table">$80.00</td>
							<td class="quantity-table"><input type="number" min="1" max="99" value="1"></td>
							<td class="total-price-table">$80</td>
							<td class="remove"><button><i class="fa-solid fa-xmark"></i></button></td>
						</tr>
						<tr>
							<td class="img-table"><img src="../../pic/ip14.png"></td>
							<td class="name-table">Y2K CYBERDOTE PBT KEYCAP SET</td>
							<td class="pre-price-table">$80.00</td>
							<td class="quantity-table"><input type="number" min="1" max="99" value="1"></td>
							<td class="total-price-table">$80</td>
							<td class="remove"><button><i class="fa-solid fa-xmark"></i></button></td>
						</tr>
					</table>
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
			<div class="order-summary">
				<div class="order-summary-heading">
					<h3>Order Summary</h3>
					
				</div>
				<hr>
				<div class="order-summary-infomation">
					<table>
						<tr>
							<td>Subtotal:</td>
							<td>$80</td>
						</tr>
						<tr>
							<td>Shipping to:</td>
							<td>Vietnam</td>
						</tr>
						<tr>
							<td>Tax:</td>
							<td>$1</td>
						</tr>
						<tr>
							<td>Total:</td>
							<td>$81</td>
						</tr>
					</table>
				</div>
				<div class="order-summary-btn-checkout">
					<button class="buttoncheckout">Checkout</button>
					<button class="buttonpaypal"><i class="fa-brands fa-paypal"></i> PayPal thanh toán</button>
					<p><i class="fa-solid fa-lock"></i> Secure checkout</p>
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