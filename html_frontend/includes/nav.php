<div class="nav">
		<div class="nav-contain">
			<ul class="nav-menu" type="none">
				<li class="nav-menu-item"><a href="trangchu.php" style="text-decoration: none;color: white">Trang chủ</a></li>
				<li class="nav-menu-item"><a>Hàng mới</a></li>
				<li class="nav-menu-item"><a>Thương hiệu</a>
					<ul class="nav-menu-item-menu" type="none">
						<li class="nav-menu-item-menu-item" value="Iphone" onclick="paginationProductFE2(1,'Iphone')"><a>Iphone</a></li>
						<li class="nav-menu-item-menu-item" value="Samsung" onclick="paginationProductFE2(1,'Samsung')"><a>Samsung</a></li>
						<li class="nav-menu-item-menu-item" value="Vivo" onclick="paginationProductFE2(1,'Vivo')"><a>Vivo</a></li>
						<li class="nav-menu-item-menu-item" value="Realme" onclick="paginationProductFE2(1,'Realme')"><a>Realme </a></li>
						<li class="nav-menu-item-menu-item" value="Oppo" onclick="paginationProductFE2(1,'Oppo')"><a>Oppo</a></li>
					</ul>
				</li>
				<li class="nav-menu-item"><a>Ưu đãi</a></li>
				<li class="nav-menu-item"><a>Thông tin</a></li>
			</ul>
		</div>
		
	
</div>
<script>
	function paginationProductFE2(str,str2){
		
		if(str==""){
			document.getElementById("main-container").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("main-container").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","paginationProductFE2.php?q="+str+"&type="+str2,true);
		xmlhttp.send();
	}
</script>