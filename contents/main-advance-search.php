<div class="main">
        <div class="searching-advance-place" style="background: white;padding: 0 20px;">
            
            <div class="advance-catalog-search-container">
                <div class="Heading"><h3>Tìm sản phẩm</h3></div>
                <h4>Chọn theo tiêu chí</h4>
                <div class="advance-catalog-select">
                    <input type="text" placeholder="Tìm kiếm theo tên" id="searchName" style="color: white; width: 250px;">
                <label>Thương hiệu:</label>
                    <select id="option">
						<option value="all">Tất cả</option>
                        <option value="Samsung">Samsung</option>
                        <option value="Iphone">Iphone</option>
                        <option value="Oppo">Oppo</option>
                        <option value="Realme">Realme</option>
                        <option value="Vivo">Vivo</option>
                    </select>
                    <button type="button" onclick="showProductAdvance()"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="advance-catalog-select">
                    <label>Giá thấp nhất</label>
                    <input type="number" min="0" max="3000" id="lowest">
                    <label>Giá cao nhất</label>
                    <input type="number" min="0" max="3000" id="highest">
                </div>
            </div>
            <div class="advance-sort">
                <h4>Sắp xếp theo tiêu chí</h4>
                <div class="button-select-sort">
                    <button id="btn1"><i class="fa-solid fa-arrow-up-wide-short"></i>Giá cao - thấp</button>
                    <button id="btn2"><i class="fa-solid fa-arrow-up-short-wide"></i>Giá thấp - cao</button>
                </div>
            </div>

        </div>
		<div class="main-container">

        <div class="main-product">
				<h3>Product</h3>
				<div class="main-product-container" id="main-product-container-FE">
				
				</div>	
			</div>
			
		</div>
</div>
<script>
	function showProductAdvance(){
		var str = document.getElementById("searchName").value;
		var str1 = document.getElementById("option").value;
		var str2 = document.getElementById("lowest").value;
		var str3 = document.getElementById("highest").value;
		if(str===""&&str1===""&&str2===""&&str3===""){
			document.getElementById("main-product-container-FE").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("main-product-container-FE").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","getProductFE1.php?name="+str+"&type="+str1+"&low="+str2+"&high="+str3,true);			
		xmlhttp.send();
	}
	function paginationProductFE2(str){
		if(str==""){
			document.getElementById("main-product-container-FE").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("main-product-container-FE").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","paginationProductFE.php?q="+str,true);
		xmlhttp.send();
	}
		
	
</script>