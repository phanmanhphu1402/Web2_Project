<div class="btn-searching-advance">
		<button class="btn-searching-advance-floating" onClick="opensearching()"><i class="fa-solid fa-magnifying-glass"></i> Tìm nâng cao</button>
		
	</div>
	<div class="searching-place" id="searchingplace">
	
		<div class="advance-catalog-search-container">
			<div class="Heading"><h3>Sản phẩm</h3></div>
			<h4>Chọn theo tiêu chí</h4>
			<div class="advance-catalog-select">
				<select>
					<option>Thể loại:</option>
					<option>Điện thoại</option>
					<option>Ốp lưng</option>
					<option>Sạc dự phòng</option>
					<option>Tai nghe</option>
				</select>
				<select>
					<option>Hàng:</option>
					<option>Hàng mới</option>
					<option>Hàng cũ</option>
					<option>Hàng ưu đãi</option>
					<option>Hàng hot</option>
				</select>
				<select>
					<option>Thương hiệu:</option>
					<option>Samsung</option>
					<option>Apple</option>
					<option>Oppo</option>
					<option>Xiaomi</option>
				</select>
				<select>
					<option>Nhu cầu sử dụng:</option>
					<option>Chơi game</option>
					<option>Chụp ảnh</option>
					<option>Dung lượng lớn</option>
					<option>Pin trâu</option>
				</select>
				<select>
					<option>Dung lượng:</option>
					<option>512GB</option>
					<option>256GB</option>
					<option>128GB</option>
				</select>
				<button>Tìm</button>
			</div>
			<div class="advance-catalog-select">
				<select>
					<option>Màn hình:</option>
					<option>Trên 6 inch</option>
					<option>Dưới 6 inch</option>
				</select>
				<select>
					<option>Chip:</option>
					<option>Snapdragon</option>
					<option>Apple A</option>
					<option>Exynos</option>
					<option>Mediatek Helio</option>
				</select>
				<select>
					<option>Tính năng đặc biệt:</option>
					<option>Định vị GPS</option>
					<option>Nghe gọi trên đồng hồ</option>
				</select>
				<label>Giá thấp nhất</label>
				<input type="number" min="1000000" max="100000000">
				<label>Giá cao nhất</label>
				<input type="number" min="1000000" max="100000000">
			</div>
		</div>
		<div class="advance-sort">
			<h4>Sắp xếp theo tiêu chí</h4>
			<div class="button-select-sort">
				<button id="btn1"><i class="fa-solid fa-arrow-up-wide-short"></i>Giá cao - thấp</button>
				<button id="btn2"><i class="fa-solid fa-arrow-up-short-wide"></i>Giá thấp - cao</button>
				<button id="btn3"><i class="fa-solid fa-percent"></i>Khuyến mãi hot</button>
				<button id="btn4"><i class="fa-solid fa-eye"></i>Xem nhiều</button>
			</div>
		</div>
	
	</div>
	<div class="btn-cart-advance">
		<button class="btn-cart-advance-floating"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</button>
	</div>
	<div class="btn-contact-advance">
		<button class="btn-contact-advance-floating"><i class="fa-regular fa-comment"></i> Contact us</button>
	</div>
	<script>
	function opensearching(){
		if(document.getElementById("searchingplace").style.display==="block"){
			document.getElementById("searchingplace").style.display="none";
		}else {
			document.getElementById("searchingplace").style.display="block";
		}
	}
	</script>