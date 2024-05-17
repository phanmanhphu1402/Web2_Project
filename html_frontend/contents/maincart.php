<?php
$sql = 'select Address from user where Username like "%' . $_SESSION['name'] . '%"';
$p = 'Address';
$address = execute4($sql, $p);
$sql = 'select Email from user where Username like "%' . $_SESSION['name'] . '%"';
$email = execute4($sql, 'Email');
$sql = 'select Phone from user where Username like "%' . $_SESSION['name'] . '%"';
$phone = execute4($sql, 'Phone');
$sql = 'select Fullname from user where Username like "%' . $_SESSION['name'] . '%"';
$fullname = execute4($sql, 'Fullname');
$sql = 'select ID from user where Username like "%' . $_SESSION['name'] . '%"';
$userid = execute4($sql, 'ID');
?><div class="maincart">
	<div class="maincart-contain">
		<div class="my-cart">
			<div class="my-cart-heading">
				<h3>MY CART</h3>
				<a href="trangchu.php">Continue Shopping <i class="fa-solid fa-chevron-right"></i></a>
			</div>
			<hr>
			<div class="my-cart-table">
				<?php
				if (isset($_SESSION['cart']) && (count($_SESSION['cart']) == 0)) {
				?>
					<p style="font-size: 20px; text-align: center;">
						Giỏ hàng của bạn trống. mua ngay <a style="color: blue; text-decoration: underline" href="./trangchu.php">Tại đây</a>
					</p>
				<?php
				} else {
					echo '<table>
							<tr>
								<th>Ảnh</th>
								<th>Tên</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Tổng giá</th>
							</tr>';
					// $_SESSION['cart'] = [];
					$i = 0;
					foreach ($_SESSION['cart'] as $item) {

						$tt = $item[2] * $item[4];
						echo '<tr>';
						echo '<td class="img-table"><img src="../../pic/product/' . $item[1] . '"></td>';
						echo '<td class="name-table"><a href="trangchu.php?act=detail&productId=' . $item[3] . '">' . $item[0] . '</a></td>';
						echo '<td class="pre-price-table">' . $item[2] . '$</td>';
						echo '<td class="quantity-table">' . $item[4] . '</td>';
						echo '<td class="total-price-table">' . $tt . '$</td>';
						echo '<td class="remove"><a href="../templates/trangchu.php?act=cart&i=' . $i . '">X</a></td>';
						echo '</tr>';
						$i++;
					}
					echo '</table>';
				}
				?>
			</div>
			<div class="box" style="padding: 0 40px;">
				<div class="product-info">
					<?php include("payin4.php"); ?>
					<br>
					<br>
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
						<td>Product:</td>
						<td>
							<?php
							foreach ($_SESSION['cart'] as $item) {
								echo $item[0] . " X" . $item[4] . "<br>" . "<hr>";
							}
							?>
						</td>
					</tr>
					<tr>
						<td>Subtotal:</td>
						<td>
							<?php
							$ttt = 0;
							foreach ($_SESSION['cart'] as $item) {
								$tt = $item[2] * $item[4];
								$ttt += $tt;
							}
							echo $ttt;
							?>$
						</td>
					</tr>
					<!-- <tr>
							<td>Shipping to:</td>
							<td><?php echo $address ?></td>
						</tr> -->
					<tr>
						<td>Tax:</td>
						<td>$1</td>
					</tr>
					<tr>
						<td>Total:</td>
						<td>
							<?php
							$ttt = 0;
							foreach ($_SESSION['cart'] as $item) {
								$tt = $item[2] * $item[4];
								$ttt += $tt;
							}
							echo $ttt + 1;
							?>$
						</td>
					</tr>
				</table>
			</div>

			<div class="order-summary-btn-checkout">
				<?php
				if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
				?>
					<form method="post" action="checkout.php">
						<!-- <input type="hidden" value="<?php echo $address ?>" name="address"> -->
						<input type="hidden" value="<?php echo $email ?>" name="email">
						<!-- <input type="hidden" value="<?php echo $phone ?>" name="phone"> -->
						<input type="hidden" value="<?php echo $userid ?>" name="userid">
						<input type="hidden" value="<?php echo date("Y-m-d H:i:s") ?>" name="order_date">
						<input type="hidden" value="<?php echo $_SESSION['name'] ?>" name="username">
						<input type="hidden" value="<?php echo $ttt + 1 ?>" name="totalprice">	
						<button type="submit" class="buttoncheckout">Checkout</button>
						<button class="buttonpaypal"><i class="fa-brands fa-paypal"></i> PayPal thanh toán</button>
					</form>
					<p><i class="fa-solid fa-lock"></i>Secure checkout</p>
				<?php
				}
				?>
			</div>
		</div>
	</div>

</div>
<script>
	var addnote = document.getElementById("addnote");
	var enterpromo = document.getElementById("enterpromo");

	function openAddNote() {
		if (addnote.style.display == "block") {
			addnote.style.display = "none";
		} else {
			addnote.style.display = "block";
		}
	}

	function openEnterPromo() {
		if (enterpromo.style.display == "flex") {
			enterpromo.style.display = "none";
			return 0;
		} else {
			enterpromo.style.display = "flex";
			return 0;
		}

	}

	function closeAddNote() {
		addnote.style.display = "none";
	}

	function closeAddNote() {
		enterpromo.style.display = "none";
	}
	$(document).ready(function() {
		$(".buttoncheckout").click(function(event) {
			event.preventDefault();

			let name = $("#name").val();
			let phone = $("#phone").val();
			let address = $("#address").val();

			// Chuyển đổi form thành mảng các đối tượng thuộc tính và giá trị
			var formDataArray = $("form").serializeArray();

			// Thêm biến tùy chỉnh vào mảng formDataArray
			formDataArray.push({
				name: "fullname",
				value: name
			});
			formDataArray.push({
				name: "phone",
				value: phone
			});
			formDataArray.push({
				name: "address",
				value: address
			});

			// Chuyển đổi mảng formDataArray thành chuỗi dữ liệu
			var formData = $.param(formDataArray);
			console.log(formData);
			// Gửi dữ liệu form thông qua AJAX
			$.ajax({
				url: "checkout.php",
				type: "post",
				data: formData,
				success: function(response) {
						//console.log(response);
						window.location.href = "checkout.php";
				},
				error: function(xhr, status, error) {
					console.error(error);
				}
			});
		});
	});
</script>