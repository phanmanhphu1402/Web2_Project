
<div class="btn-searching-advance">
		<button class="btn-searching-advance-floating"><i class="fa-solid fa-magnifying-glass"></i><a href="trangchu.php?act=advance" style="text-decoration: none;color: white"> Tìm nâng cao</a></button>
		
	</div>
	<div class="searching-place" id="searchingplace">
	
		<div class="advance-catalog-search-container">
			<div class="Heading"><h3>Tìm sản phẩm</h3></div>
			<h4>Chọn theo tiêu chí</h4>
			<div class="advance-catalog-select">
				<input type="text" placeholder="Tìm kiếm theo tên" id="str" style="color: white; width: 250px;">
			<label>Thương hiệu:</label>
				<select id="str1">
					<option>Samsung</option>
					<option>Iphone</option>
					<option>Oppo</option>
					<option>Realme</option>
					<option>Vivo</option>
				</select>
				<button type="button" onclick="showProductFE1()"><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
			<div class="advance-catalog-select">
				<label>Giá thấp nhất</label>
				<input type="number" min="0" max="3000" id="str2">
				<label>Giá cao nhất</label>
				<input type="number" min="0" max="3000" id="str3">
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
	<div class="btn-cart-advance">
		<button class="btn-cart-advance-floating"><i class="fa-solid fa-cart-shopping"><a href="trangchu.php?act=cart" style="text-decoration: none;color: white;font-size:16px;font-family: Arial, Helvetica, sans-serif;"> Giỏ hàng</a></i></button>
	</div>
	<?php
		if(isset($_SESSION['role'])&&$_SESSION['role']!=3){
			echo '<div class="btn-admin-advance">
			<button class="btn-admin-advance-floating"><a href="http://localhost/myPhoneShop/admin\templates\admin.php" style="text-decoration: none;color: white;font-size:16px;font-family: Arial, Helvetica, sans-serif;">Go back admin</a></button>
		</div>';
		}
	?>
	
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
	<script>
	function showProductFE1(){
		var str = document.getElementById("str").value;
		var str1 = document.getElementById("str1").value;
		var str2 = document.getElementById("str2").value;
		var str3 = document.getElementById("str3").value;
		if(str==""&&str1==""&&str2==""&&str3==""){
			document.getElementById("main-product-container-FE").innerHTML = "";
			return;
		} else if(str!=""&&str1==""&&str2==""&&str3==""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?q="+str,true);			xmlhttp.send();
		} else if(str!=""&&str1!=""&&str2==""&&str2==""&&str3==""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?q="+str+"w="+str1,true);			xmlhttp.send();
		} else if(str!=""&&str1!=""&&str2!=""&&str3==""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?q="+str+"w="+str1+"e="+str2,true);			xmlhttp.send();
		} else if(str!=""&&str1==""&&str2!=""&&str3!=""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?q="+str+"e="+str2+"r="+str3,true);			xmlhttp.send();
		} else if(str==""&&str1!=""&&str2==""&&str3==""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?w="+str1,true);			xmlhttp.send();
		} else if(str==""&&str1!=""&&str2!=""&&str3==""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?w="+str1+"e="+str2,true);			xmlhttp.send();
		} else if(str==""&&str1!=""&&str2!=""&&str3!=""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?w="+str1+"e="+str2+"r="+str3,true);			xmlhttp.send();
		} else if(str==""&&str1==""&&str2!=""&&str3==""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?e="+str2,true);			xmlhttp.send();
		} else if(str==""&&str1==""&&str2!=""&&str3!=""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?e="+str2+"r="+str3,true);			xmlhttp.send();
		} else if(str!=""&&str1==""&&str2!=""&&str3!=""){
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?q="+str+"e="+str2+"r="+str3,true);			xmlhttp.send();
		}
		else{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){
					document.getElementById("main-product-container-FE").innerHTML = this.responseText;
				}
			}
			xmlhttp.open("GET","getProductFE1.php?q="+str+"w="+str1+"e="+str2+"r="+str3,true);
			xmlhttp.send();
		} 
		
	}
</script>