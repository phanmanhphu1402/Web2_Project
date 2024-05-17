// function deleteProduct(id){
//     // option = confirm('Bạn có muốn xóa sản phẩm này ?')
//     // if(!option){
//     //     return;
//     // }
//     $.post('../contents/delete_product.php', {
//         'productId': id
//     }, function(data){
//         alert(data);
//         location.reload();
//     })
// }
function deleteProduct(productId) {
    if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
        $.ajax({
            url: '../contents/delete_product.php',
            type: 'POST',
            data: { productId: productId },
            success: function(response) {
                alert(response);
                // Nếu xóa thành công, cập nhật lại giao diện
                $('tr[data-product-id="' + productId + '"]').remove();
                window.location.href = "admin.php?act=productmanager";
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while deleting the product.');
            }
        });
    }
}
function lockProduct(id){
    option = confirm('Bạn muốn tồn/xả sản phẩm này ?')
    if(!option){
        return;
    }
    $.post('../contents/lock_product.php', {
        'productId': id
    }, function(data){
        alert(data);
        location.reload();
    })
}
function paginationProduct(str){
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
    xmlhttp.open("GET","../contents/paginationProduct.php?q="+str,true);
    xmlhttp.send();
}
function paginationProduct1(str){
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
    xmlhttp.open("GET","../contents/paginationProduct1.php?q="+str,true);
    xmlhttp.send();
}
function paginationProduct2(str){
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
    xmlhttp.open("GET","../contents/paginationProduct2.php?q="+str,true);
    xmlhttp.send();
}
function showProduct(){
    var str = document.getElementById("usr").value;
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
    xmlhttp.open("GET","../contents/getProduct.php?q="+str,true);
    xmlhttp.send();
}
function sortProduct(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("product-container2").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/sortProduct.php",true);
    xmlhttp.send();
}
function sortProduct1(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200){
            document.getElementById("product-container2").innerHTML = this.responseText;
        }
    }
    xmlhttp.open("GET","../contents/sortProduct1.php",true);
    xmlhttp.send();
}