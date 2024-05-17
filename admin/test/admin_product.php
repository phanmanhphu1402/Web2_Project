<?php
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <h4>Admin</h4>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="#section1">Home</a></li>
        <li><a href="#section2">User Manager</a></li>
        <li class="active"><a href="#section3">Product Manager</a></li>
        <li><a href="#section3">Bill Manager</a></li>
        <li><a href="#section3">Statis</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search ..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-10">
      <div class="container-fluid">
        <div class="panel panel-primary">
              <div class="panel-heading" style="display: flex;justify-content: space-between;">
                    <h3 class="panel-title" style="font-size: 20px;">Product Manager</h3>
                    
                    <button type="button" class="btn btn-danger" onClick="window.open('admin_product_add.php','_self')">Thêm sản phẩm</button>

                    <div class="input-group">
                        <input type="text" class="form-control" id="usr" placeholder="Search by Product name" style="width: 200px;">
                        <div class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="showProduct()">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>
              </div>
              <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="product-container" class="user-container">
                        <?php
                                $sql = 'select * from product limit 0,10';
                                $ListProduct = executeResult($sql);
                                foreach($ListProduct as $Product){
                                    echo '<tr>';
                                    echo '<td>'.$Product['ProductID'].'</td>';
                                    echo '<td>';
                                    echo '<img src=';
                                    echo '"../../pic/product/'.$Product['ProductThumbnail'].'" style ="width: 100px;">';
                                    echo '</td>';
                                    echo '<td>'.$Product['ProductName'].'</td>';
                                    echo '<td>'.$Product['ProductType'].'</td>';
                                    echo '<td style ="width: 200px;">'.$Product['ProductDescription'].'</td>';
                                    echo '<td>'.$Product['ProductPrice'].'</td>';
                                    echo '<td>'.$Product['ProductStock'].'</td>';
                                    echo '<td>'.$Product['ProductStatus'].'</td>';
                                    echo '<td>';
                                    echo '<button type="button" class="btn btn-info" onClick=\'window.open("admin_product_add.php?productId='.$Product['ProductID'].'","_self")\'>Sửa</button>';
                                    echo '<button type="button" class="btn btn-warning" onClick="lockProduct('.$Product['ProductID'].')">Khóa</button>';
                                    
                                    echo '<button type="button" class="btn btn-danger" onClick="deleteProduct('.$Product['ProductID'].');">Xóa</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                    echo '';
                                }
                            ?>
                        </tbody>
                    </table>
              </div>
              <div class="panel-footer">
                <ul class="pagination">
                    <?php
                        $sql = 'select count(ProductID) as number from product';
                        $ListProduct = executeResult($sql);
                        $number = 0;
                        if($ListProduct!=null & count($ListProduct)>0){
                            $number = $ListProduct[0]['number'];
                        }
                        $pages = ceil($number/10);
                        for($i=1;$i<=$pages;$i++){
                            echo '<li onClick="paginationProduct('.$i.')"><a>'.$i.'</a></li>';
                        }
                    ?>
                </ul>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Good luck to you <3</p>
</footer>
<script type="text/javascript">
	function deleteProduct(id){
		option = confirm('Bạn có muốn xóa sản phẩm này ?')
		if(!option){
			return;
		}
		$.post('delete_product.php', {
			'productId': id
		}, function(data){
			alert(data);
			location.reload();
		})
	}
    function lockProduct(id){
		option = confirm('Bạn muốn tồn/xả sản phẩm này ?')
		if(!option){
			return;
		}
		$.post('lock_product.php', {
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
		xmlhttp.open("GET","paginationProduct.php?q="+str,true);
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
		xmlhttp.open("GET","getProduct.php?q="+str,true);
		xmlhttp.send();
	}
</script>
</body>
</html>
