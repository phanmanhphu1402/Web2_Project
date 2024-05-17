
function lockBill(id){
    option = confirm('Bạn muốn xử lí đơn hàng này ?')
    if(!option){
        return;
    }
    $.post('../contents/lock_bill.php', {
        'OrderID': id
    }, function(data){
        alert(data);
        location.reload();
    })
}
function paginationBill(str){
    if(str==""){
        document.getElementById("product-container").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("product-container").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/paginationBill.php?q="+str,true);
    xmlhttp.send();
}
function paginationBill1(str){
    if(str==""){
        document.getElementById("bill-container").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("bill-container").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/paginationBill1.php?q="+str,true);
    xmlhttp.send();
}
function paginationBill2(str){
    if(str==""){
        document.getElementById("bill-container").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("bill-container").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/paginationBill2.php?q="+str,true);
    xmlhttp.send();
}
function showBill(){
    var str = document.getElementById("usr").value;
    if(str==""){
        document.getElementById("bill-container2").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("bill-container2").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/getBill.php?q="+str,true);
    xmlhttp.send();
}
function showBillDate(){
    var str = document.getElementById("usr2").value;
    var str1 = document.getElementById("usr3").value;
    if(str==""&&str1==""){
        document.getElementById("bill-container2").innerHTML = "";
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("bill-container2").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/getBill2.php?q="+str+"&p="+str1,true);
    xmlhttp.send();
}
function sortBill(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("bill-container2").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/sortBill.php",true);
    xmlhttp.send();
}
function sortBill1(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("bill-container2").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/sortBill1.php",true);
    xmlhttp.send();
}