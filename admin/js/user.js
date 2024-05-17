
	function deleteUser(id){
		option = confirm('Bạn có muốn xóa tài khoản này ?')
		if(!option){
			return;
		}
		$.post('../contents/delete_user.php', {
			'id': id
		}, function(data){
			alert(data);
			location.reload();
		})
	}
    function lockUser(id){
		option = confirm('Bạn muốn mở/khóa tài khoản này ?')
		if(!option){
			return;
		}
		$.post('../contents/lock_user.php', {
			'id': id
		}, function(data){
			alert(data);
			location.reload();
		})
	}
    function paginationUser(str){
		if(str==""){
			document.getElementById("user-container").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("user-container").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","../contents/paginationUser.php?q="+str,true);
		xmlhttp.send();
	}
	function paginationUser1(str){
		if(str==""){
			document.getElementById("user-container").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("user-container").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","../contents/paginationUser1.php?q="+str,true);
		xmlhttp.send();
	}
	function paginationUser2(str){
		if(str==""){
			document.getElementById("user-container").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("user-container").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","../contents/paginationUser2.php?q="+str,true);
		xmlhttp.send();
	}
    function showUser(){
		var str = document.getElementById("usr").value;
		if(str==""){
			document.getElementById("user-container").innerHTML = "";
			return;
		}
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("user-container").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","../contents/getUser.php?q="+str,true);
		xmlhttp.send();
	}
	function sortUser(){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("user-container2").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","../contents/sortUser.php",true);
		xmlhttp.send();
	}
	function sortUser1(){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
				document.getElementById("user-container2").innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET","../contents/sortUser1.php",true);
		xmlhttp.send();
	}
