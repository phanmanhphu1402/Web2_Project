
<div class="header" id="myHeader">
	<div class="header-head"></div>
	<div class="header-main">
		<div class="header-main-contain">
			<div class="header-main-logo">
				<a href="#"><img src="https://img.freepik.com/free-vector/gradient-mobile-store-logo-design_23-2149697768.jpg?size=626&ext=jpg" alt="logo" height="100px" width="200px"></a>
			</div>
			<div class="header-main-search">
				<input type="text" placeholder="Tìm kiếm" id="search">
				<button type="button" onclick="showProductFE()"><i class="fa-solid fa-magnifying-glass"></i></button>
			</div>
			<div class="header-main-right">
				<div class="header-main-right-user-img">
					<?php
						if(isset($_SESSION['name'])){
							echo '<div><a href="trangchu.php?act=history" style="text-decoration: none; color: white;font-size: 18px;">'.$_SESSION['name'].'</a></div>';
						}else{
							echo '<a href="#"><i class="fa-regular fa-user fa-2x"></i></a>';
						}
					?>
<!--						<img class="avatar" src="../pic/avatar.png">-->
				</div>
				<div class="header-main-right-cart" style="margin-left: 10px;">
				<a href="trangchu.php?act=cart" style="text-decoration: none;color: white;font-size:16px;font-family: Arial, Helvetica, sans-serif;"> <i class="fa-solid fa-cart-shopping fa-2x"></i></a>
				<span></span>
				</div>
				<div class="header-main-right-login-logout">
					<?php
						if(isset($_SESSION['name'])){
							echo '<button class="btn-logout"><a href="login.php" style="color: white;">Logout</a></button>';
						}else{
							echo '<button class="btn-login"><a href="login.php" style="color: white;">Login</a></button>';
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function showProductFE(){
		var str = document.getElementById("search").value;
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
		xmlhttp.open("GET","getProductFE.php?name="+str,true);
		xmlhttp.send();
	}
</script>